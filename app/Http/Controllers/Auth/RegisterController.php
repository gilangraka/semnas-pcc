<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\RefPeserta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    public function index()
    {
        return view('pages.auth.register');
    }

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
            $user->assignRole('Peserta');
            $validasi['user_id'] = $user->id;
            RefPeserta::create($validasi);

            DB::commit();
            notyf()->success('Berhasil registrasi!');
        } catch (\Exception $e) {
            DB::rollBack();
            notyf()->error($e->getMessage());
        }
        return back();
    }
}
