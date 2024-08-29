<?php

namespace App\Http\Controllers\ManageUser;

use App\Http\Controllers\Controller;
use App\Models\RefPeserta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PanitiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::role('Panitia')->with('ref_peserta')->get();
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'name' => 'required|string',
            'email' => 'required|unique:users,email',
            'password' => 'required|string|confirmed',
            'nomor_hp' => 'required|string',
            'instansi' => 'required|string',
            'profesi' => 'required|string'
        ]);
        $validasi['password'] = bcrypt($validasi['password']);

        try {
            DB::beginTransaction();

            $user = User::create($validasi);
            $user->assignRole('Panitia');
            $validasi['user_id'] = $user->id;
            RefPeserta::create($validasi);

            DB::commit();
            notyf()->success('Berhasil menambah panitia!');
        } catch (\Exception $e) {
            DB::rollBack();
            notyf()->error($e->getMessage());
        }
        return back();
    }
}
