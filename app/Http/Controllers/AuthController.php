<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // ================= LOGIN VIEW =================
    public function login()
    {
        return view('auth.login');
    }

    // ================= REGISTER VIEW =================
    public function register()
    {
        return view('auth.register');
    }

    // ================= PROSES REGISTER =================
    public function registerPost(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:3',
            'alamat' => 'required',
            'no_hp' => 'required'
        ]);

        User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => $request->password,
            'role' => 'pembeli',
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp
        ]);

        return redirect()->route('login')
            ->with('success', 'Registrasi berhasil');
    }

    public function loginPost(Request $request)
{
    $request->validate([
        'email' => 'required',
        'password' => 'required',
    ]);

    $user = User::where('email', $request->email)->first();

    // cek user dan password plaintext
    if ($user && $request->password == $user->password) {

        Auth::login($user);

        $request->session()->regenerate();

        // redirect berdasarkan role
        if ($user->role == 'admin') {

            return redirect('/admin/dashboard');

        } elseif ($user->role == 'owner') {

            return redirect('/owner/dashboard');

        } else {

            return redirect('/');

        }

    }

    return back()->withErrors([
        'email' => 'Email atau password salah',
    ]);
}
    // ================= LOGOUT =================
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}