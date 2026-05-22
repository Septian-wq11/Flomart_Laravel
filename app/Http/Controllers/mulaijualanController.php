<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class mulaijualanController extends Controller
{
    public function mulaijualan()
    {
        $isLogin = Auth::check();

        $user = Auth::user();

        $role = $user->role ?? 'guest';

        $nama = $user->nama ?? 'Guest';

        // admin langsung dashboard
        if ($isLogin && $role === 'admin') {
            return redirect('/admin/dashboard');
        }

        return view('admin.mulaijualan', compact(
            'isLogin',
            'role',
            'nama'
        ));
    }
}