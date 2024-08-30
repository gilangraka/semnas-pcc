<?php

namespace App\Http\Controllers;

use App\Models\RefQRCode;
use Illuminate\Http\Request;

class ScanQRController extends Controller
{
    public function index()
    {
        $data = RefQRCode::with(['ref_peserta.user'])
            ->where('status_id', 2)->get();
        return view('pages.scan-qrcode.index', compact('data'));
    }

    public function show($qr_id)
    {
        $ref_qr = RefQRCode::find($qr_id);
        $ref_qr->status_id = 2;
        $ref_qr->save();

        return response()->json([
            'status' => 200,
            'message' => 'Berhasil scan',
            'data' => RefQRCode::with(['ref_peserta.user'])
                ->where('status_id', 2)->get()
        ]);
    }
}
