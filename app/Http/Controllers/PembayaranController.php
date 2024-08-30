<?php

namespace App\Http\Controllers;

use App\Models\RefPeserta;
use App\Models\RefQRCode;
use App\Models\TrxPembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Storage;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Str;

class PembayaranController extends Controller
{
    public function proccess(Request $request)
    {
        $ref_peserta = RefPeserta::where('user_id', Auth::id())->first();
        $pembayaran = TrxPembayaran::create([
            'peserta_id' => $ref_peserta->id,
            'amount' => 35000,
            'status' => 'pending',
            'order_id' => 'semnas-' . Str::random(20)
        ]);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = false;
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = true;
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = true;

        $params = array(
            'transaction_details' => array(
                'order_id' => $pembayaran->order_id,
                'gross_amount' => $pembayaran->amount,
            )
        );
        $snapToken = \Midtrans\Snap::getSnapToken($params);
        $pembayaran->snap_token = $snapToken;
        $pembayaran->save();

        return redirect()->route('pembayaran.index', $pembayaran->id);
    }

    public function pembayaran($id_pembayaran)
    {
        $trx = TrxPembayaran::find($id_pembayaran);
        Gate::authorize('trx-peserta', $trx);

        $data = TrxPembayaran::findOrFail($id_pembayaran);
        return view('pages.pembayaran.index', compact('data'));
    }

    public function pembayaran_sukses($id_transaksi)
    {
        $transaksi = TrxPembayaran::find($id_transaksi);
        $transaksi->status = 'success';
        $transaksi->save();

        // Generate QRCode
        $ref_qrcode = new RefQRCode();
        $ref_qrcode->peserta_id = $transaksi->peserta_id;
        $ref_qrcode->status_id = 1;
        $ref_qrcode->save();

        $ref_qrcode->file_qrcode = $ref_qrcode->id . ".svg";
        $ref_qrcode->save();

        $path_file = 'qr_code/' . $ref_qrcode->file_qrcode;
        $file_qr = QrCode::size(200)
            ->format('svg')
            ->generate($ref_qrcode->id);
        Storage::disk('public')->put($path_file, $file_qr);

        notyf()->success('Berhasil melakukan pembayaran');
        return redirect()->route('dashboard.index');
    }

    public function cek_pembayaran($order_id)
    {
        $key = env('MIDTRANS_SERVER_KEY') . ':';
        $base64 = base64_encode($key);

        $response = Http::withHeaders([
            'Accept' => 'application/json',
            'Content-Type' => 'application/json',
            'Authorization' => $base64
        ])->get("https://api.sandbox.midtrans.com/v2/$order_id/status");

        return $response->json();
    }
}
