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
            'amount' => env('HARGA_TIKET'),
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

    public function pembayaran_sukses()
    {
        notyf()->success('Berhasil melakukan pembayaran');
        return redirect()->route('dashboard.index');
    }

    public function callback(Request $request)
    {
        $serverKey = env('MIDTRANS_SERVER_KEY');
        $hashedKey = hash('sha512', $request->order_id . $request->status_code . $request->gross_amount . $serverKey);

        if ($hashedKey !== $request->signature_key) {
            return response()->json(['message' => 'Invalid signature key'], 403);
        }

        $transactionStatus = $request->transaction_status;
        $orderId = $request->order_id;
        $order = TrxPembayaran::where('order_id', $orderId)->first();

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        switch ($transactionStatus) {
            case 'capture':
                if ($request->payment_type == 'credit_card') {
                    if ($request->fraud_status == 'challenge') {
                        $order->update(['status' => 'pending']);
                    } else {
                        $order->update(['status' => 'success']);

                        // Generate QRCode
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
                    }
                }
                break;
            case 'settlement':
                $order->update(['status' => 'success']);

                // Generate QRCode
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

                break;
            case 'pending':
                $order->update(['status' => 'pending']);
                break;
            case 'deny':
                $order->update(['status' => 'failed']);
                break;
            case 'expire':
                $order->update(['status' => 'expired']);
                break;
            case 'cancel':
                $order->update(['status' => 'canceled']);
                break;
            default:
                $order->update(['status' => 'unknown']);
                break;
        }
    }
}
