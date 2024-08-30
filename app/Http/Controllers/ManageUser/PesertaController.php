<?php

namespace App\Http\Controllers\ManageUser;

use App\Http\Controllers\Controller;
use App\Models\RefQRCode;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::role('Panitia')->with('ref_peserta')->get();
        return view('pages.data-peserta.index', compact('data'));
    }
}
