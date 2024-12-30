<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLoginForm()
    {

        return view('auth.login');
    }


    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only('email', 'password'))) {
            $request->session()->regenerate();

            // Ambil user yang sedang login
            $user = Auth::user();

            // Cek role pengguna
            if ($user->role === 'admin') {
                return redirect()->intended('/dashboard'); // Redirect ke dashboard admin
            } elseif ($user->role === 'karyawan') {
                return redirect()->intended('/'); // Redirect ke dashboard karyawan
            }

            // Redirect default jika role tidak sesuai
            return redirect()->intended('/');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }


    public function logout(Request $request)
    {
        Auth::logout(); // Menghapus autentikasi pengguna
        $request->session()->invalidate(); // Menghapus semua data sesi
        $request->session()->regenerateToken(); // Mencegah serangan CSRF
        return redirect('/login'); // Mengarahkan pengguna ke halaman login
    }
}
