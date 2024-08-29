<?php

namespace App\Http\Controllers;

use App\Models\RefPeserta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class DashboardController extends Controller
{
    private function generate_nama_file()
    {
        $nama_file = Str::random(20);
        $exists = RefPeserta::where('foto_profil', 'like', $nama_file . '%')->exists();
        if ($exists) {
            return $this->generate_nama_file();
        }
        return $nama_file;
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::with('ref_peserta')->find(Auth::id());
        $role = User::find(Auth::id())->getRoleNames();

        return redirect('dashboard', compact('data', 'role'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|email',
            'nomor_hp' => 'string|max:20',
            'instansi' => 'required|string|max:100',
            'profesi' => 'required|string|max:100',
            'link_facebook' => 'string|max:100',
            'link_instagram' => 'string|max:100',
            'link_twitter' => 'string|max:100',
            'link_tiktok' => 'string|max:100'
        ]);

        try {
            DB::beginTransaction();
            $user = Auth::user();
            $user->update($validasi);
            $user->ref_peserta->update($validasi);
            DB::commit();
            notyf()->success('Berhasil menyimpan data!');
        } catch (\Exception $e) {
            DB::rollBack();
            notyf()->error($e->getMessage());
        }
        return back();
    }

    public function update_profile(Request $request)
    {
        $request->validate([
            'foto_profil' => 'required|file|mimes:jpeg,png,jpg'
        ]);
        $user = Auth::user();

        try {
            DB::beginTransaction();
            $file = $request->file('foto_profil');
            $nama_file = $this->generate_nama_file() . '.' . $file->getClientOriginalExtension();
            $path_file = 'foto_profil/' . $nama_file;
            $user->foto_profil = $nama_file;
            $user->save();
            Storage::disk('public')->put($path_file, file_get_contents($file));
            DB::commit();
            notyf()->success('Berhasil mengupload foto profil');
        } catch (\Exception $e) {
            DB::rollBack();
            notyf()->error($e->getMessage());
        }
        return back();
    }

    public function delete_profile()
    {
        $user = Auth::user();
        $nama_file = RefPeserta::where('user_id', $user->id)->pluck('foto_profil')[0];
        $path_file = 'foto_profil/' . $nama_file;

        Storage::disk('public')->delete($path_file);
        $user->foto_profil = null;
        $user->save();
    }
}
