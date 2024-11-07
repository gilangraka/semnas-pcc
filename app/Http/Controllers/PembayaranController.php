<?php

namespace App\Http\Controllers;

use App\Models\RefPeserta;
use App\Models\RefQRCode;
use App\Models\TrxPembayaran;
use GuzzleHttp\Client;
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
            'amount' => config('app.harga_tiket'),
            'status' => 'pending',
            'order_id' => 'semnas-' . Str::random(20)
        ]);

        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('app.MIDTRANS_SERVER_KEY');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
        \Midtrans\Config::$isProduction = config('app.MIDTRANS_IS_PRODUCTION');
        // Set sanitization on (default)
        \Midtrans\Config::$isSanitized = config('app.MIDTRANS_IS_SANITIZED');
        // Set 3DS transaction for credit card to true
        \Midtrans\Config::$is3ds = config('app.MIDTRANS_IS_3DS');

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

    public function pembayaran_sukses()
    {
        notyf()->success('Berhasil melakukan pembayaran');
        return redirect()->route('dashboard.index');
    }

    public function callback(Request $request)
    {
        $serverKey = config('app.MIDTRANS_SERVER_KEY');
        $hashedKey = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);
        if ($hashedKey == $request->signature_key) {
            if ($request->transaction_status == 'capture' || $request->transaction_status == 'settlement') {
                $order = TrxPembayaran::where('order_id', $request->order_id)->first();
                $order->update(['status' => 'success']);

                $ref_qrcode = new RefQRCode();
                $ref_qrcode->peserta_id = $order->peserta_id;
                $ref_qrcode->status_id = 1;
                $ref_qrcode->save();

                $ref_qrcode->file_qrcode = $ref_qrcode->id . ".svg";
                $ref_qrcode->save();

                $path_file = 'qr_code/' . $ref_qrcode->file_qrcode;
                $file_qr = QrCode::size(200)
                    ->format('svg')
                    ->generate($ref_qrcode->id);
                Storage::disk('public')->put($path_file, $file_qr);
                return 2;
            }
            return 1;
        }

        return 0;
    }
}
