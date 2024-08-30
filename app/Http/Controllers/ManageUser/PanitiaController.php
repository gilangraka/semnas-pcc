<?php

namespace App\Http\Controllers\ManageUser;

use App\Http\Controllers\Controller;
use App\Models\RefPeserta;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PanitiaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = User::role('Panitia')->with('ref_peserta')->get();
        return view('pages.data-panitia.index', compact('data'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (Auth::user()->can('Tambah Panitia')) {
            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'email' => 'required|unique:users,email',
                'password' => 'required|string',
                'nomor_hp' => 'required|string',
                'instansi' => 'required|string',
                'profesi' => 'required|string'
            ]);
            if ($validator->fails()) {
                $errors = $validator->errors()->all();
                foreach ($errors as $error) {
                    notyf()->error($error);
                }
                return back();
            }
            $validatedData = $validator->validated();
            $validatedData['password'] = bcrypt($validatedData['password']);

            try {
                DB::beginTransaction();

                $user = User::create($validatedData);
                $user->assignRole('Panitia');
                $validatedData['user_id'] = $user->id;
                RefPeserta::create($validatedData);

                DB::commit();
                notyf()->success('Berhasil menambah panitia!');
            } catch (\Exception $e) {
                DB::rollBack();
                notyf()->error($e->getMessage());
            }
            return back();
        } else {
            notyf()->error('Tidak diizinkan');
            return back();
        }
    }
}
