<?php

namespace App\Http\Controllers\ManageUser;

use App\Http\Controllers\Controller;
use App\Models\RefQRCode;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PesertaController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::role('Peserta')->with('ref_peserta.ref_qrcode')->get();
        return view('pages.data-peserta.index', compact('data'));
    }
}
