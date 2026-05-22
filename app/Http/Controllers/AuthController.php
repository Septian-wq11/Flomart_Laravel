<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

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
            'password' => Hash::make($request->password),
            'role' => 'pembeli',
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp
        ]);

        return redirect()->route('login')
            ->with('success', 'Registrasi berhasil');
    }

    // ================= PROSES LOGIN =================
    public function loginPost(Request $request)
    {
        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        if (Auth::attempt($credentials, $request->remember)) {

            $request->session()->regenerate();

            $user = Auth::user();

            // redirect role
            if ($user->role == 'admin') {
                return redirect('/admin/dashboard');
            }

            if ($user->role == 'owner') {
                return redirect('/owner/dashboard');
            }

            return redirect('/');
        }

        return back()->with('error', 'Email atau password salah');
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