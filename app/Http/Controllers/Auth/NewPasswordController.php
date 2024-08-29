<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class NewPasswordController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $request->validate([
            'current_password' => 'required|string',
            'new_password' => 'required|string|confirmed'
        ]);

        try {
            $user = User::findOrFail(Auth::id());
            if (!Hash::check($request->current_password, $user->password)) {
                notyf()->error('Password yang kamu masukkan salah');
                return back();
            }
            $user->password = bcrypt($request->new_password);
            notyf()->success('Berhasil mengganti password');
        } catch (\Exception $e) {
            notyf()->error($e->getMessage());
        }

        return back();
    }
}
