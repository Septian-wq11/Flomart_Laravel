<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\mulaijualanController;
use App\Http\Controllers\TentangKamiController;
use App\Http\Controllers\KeranjangController;
use App\Http\Controllers\PesananController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\TokoController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\Admin\DashboardController;


Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/mulaijualan', [mulaijualanController::class, 'mulaijualan'])
    ->name('mulaijualan');

Route::get('/login', [AuthController::class, 'login'])
    ->name('login');

Route::post('/login', [AuthController::class, 'loginPost'])
    ->name('login.post');

Route::get('/register', [AuthController::class, 'register'])
    ->name('register');

Route::post('/register', [AuthController::class, 'registerPost'])
    ->name('register.post');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

Route::get('/tentangkami', [TentangKamiController::class, 'index'])
    ->name('tentangkami');

Route::get('/notifikasi', [NotifikasiController::class, 'index'])
    ->name('notifikasi');

Route::middleware('auth')->group(function () {

    // tambah ke keranjang
    Route::post('/keranjang/tambah/{id}', [KeranjangController::class, 'tambah'])
        ->name('keranjang.tambah');

    // halaman keranjang
    Route::get('/keranjang', [KeranjangController::class, 'index'])
        ->name('keranjang');

    // update qty
Route::post('/keranjang/update-qty', [KeranjangController::class, 'updateQty'])
    ->name('keranjang.updateQty');

// hapus keranjang
Route::delete('/keranjang/hapus', [KeranjangController::class, 'hapus'])
    ->name('keranjang.hapus');

Route::middleware('auth')->group(function () {

    Route::get('/pesanan/{id}', [PesananController::class, 'detail'])
        ->name('pesanan.detail');

});

});


// TEST SESSION
Route::middleware('auth')->get('/test-session', function () {

    return "MASIH LOGIN";

});

Route::middleware('auth')->group(function () {

    Route::get('/chat',
        [ChatController::class,'index'])
        ->name('chat');

    Route::get('/chat/admin',
        [ChatController::class,'room'])
        ->name('chat.room');

    Route::post('/chat/send',
        [ChatController::class,'send'])
        ->name('chat.send');

});

Route::post('/checkout', [PesananController::class, 'checkout']) ->name('checkout');

Route::get('/pesanan-saya', [PesananController::class, 'index']) ->name('pesanan.saya');

Route::get('/pembayaran/{id}', [PesananController::class, 'pembayaran']) ->name('pembayaran');

Route::post('/upload-bukti/{id}', [PesananController::class, 'uploadBukti']) ->name('upload.bukti');

Route::post('/batalkan-pesanan/{id}', [PesananController::class, 'batalkan']) ->name('batalkan.pesanan');

Route::get('/toko', [TokoController::class, 'index'])
    ->name('toko');

Route::get('/produk/{id}', [TokoController::class, 'detail'])
    ->name('produk.detail');

Route::get('/blog', [BlogController::class, 'index'])
    ->name('blog.index');

Route::get('/blog/{id}', [BlogController::class, 'detail'])
    ->name('blog.detail');

Route::prefix('admin')
    ->middleware(['auth', 'session.timeout', 'admin'])
    ->group(function () {

        Route::get('/dashboard',
            [DashboardController::class, 'index'])
            ->name('admin.dashboard');

    });