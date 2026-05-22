<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class mulaijualanController extends Controller
{
    public function mulaijualan()
    {
        // cek login
        $isLogin = Session::has('id_user');

        // ambil data session
        $role = Session::get('role', 'guest');
        $nama = Session::get('nama', 'Guest');

        // jika admin langsung dashboard
        if ($isLogin && $role === 'admin') {
            return redirect('/admin/dashboard');
        }

        // url login admin
        $redirect = urlencode('/admin/dashboard');
        $loginUrl = "/login?admin=1&redirect=" . $redirect;

        // kirim ke blade
        return view('admin.mulaijualan', compact(
            'isLogin',
            'role',
            'nama',
            'loginUrl'
        ));
    }
}