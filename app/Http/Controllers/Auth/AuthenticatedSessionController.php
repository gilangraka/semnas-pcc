<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    public function index()
    {
        return view('pages.auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required|string|email|max:50',
            'password' => 'required|string'
        ]);

        try {
            $credential = $request->only('email', 'password');
            if (Auth::attempt($credential)) {
                return redirect('dashboard');
            }
            notyf()->error('ID atau Password salah!');
        } catch (\Exception $e) {
            notyf()->error($e->getMessage());
        }
        return back();
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
