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
use App\Http\Controllers\Admin\KategoriController;
use App\Http\Controllers\Admin\ProdukController as AdminProdukController;
use App\Http\Controllers\Admin\PesananController as AdminPesananController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Owner\OwnerDashboardController;
use App\Http\Controllers\Owner\OwnerProdukController;
use App\Http\Controllers\Owner\OwnerPesananController;
use App\Http\Controllers\Owner\OwnerReportController;
use App\Http\Controllers\Owner\OwnerKategoriController;

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

        Route::resource('kategori', KategoriController::class);

        Route::resource('produk', AdminProdukController::class);

        Route::resource('pesanan', AdminPesananController::class);

        Route::put(
            'pesanan/{id}/verifikasi',
            [AdminPesananController::class, 'verifikasi']
        )->name('pesanan.verifikasi');

        Route::put(
            'pesanan/{id}/selesai',
            [AdminPesananController::class, 'selesai']
        )->name('pesanan.selesai');

        Route::get(
    '/report',
    [ReportController::class, 'index']
)->name('report.index');

Route::get(
    '/report/pdf',
    [ReportController::class, 'pdf']
)->name('report.pdf');

Route::get(
    '/report/excel',
    [ReportController::class, 'excel']
)->name('report.excel');

Route::get(
    '/report',
    [ReportController::class,'index']
)->name('report.index');

Route::get(
    '/report/pdf-all',
    [ReportController::class,'pdfAll']
)->name('report.pdf.all');

Route::get(
    '/report/pdf-pesanan',
    [ReportController::class,'pdfPesanan']
)->name('report.pdf.pesanan');

Route::get(
    '/report/pdf-produk',
    [ReportController::class,'pdfProduk']
)->name('report.pdf.produk');

Route::get(
    '/report/pdf-pendapatan',
    [ReportController::class,'pdfPendapatan']
)->name('report.pdf.pendapatan');

Route::get(
    '/report/excel-all',
    [ReportController::class,'excelAll']
)->name('report.excel.all');

Route::get(
    '/report/excel-pesanan',
    [ReportController::class,'excelPesanan']
)->name('report.excel.pesanan');

Route::get(
    '/report/excel-produk',
    [ReportController::class,'excelProduk']
)->name('report.excel.produk');

Route::get(
    '/report/excel-pendapatan',
    [ReportController::class,'excelPendapatan']
)->name('report.excel.pendapatan');

Route::get(
    '/report/excel-all',
    [ReportController::class,'excelAll']
)->name('report.excel.all');

Route::get(
    '/report/excel-pesanan',
    [ReportController::class,'excelPesanan']
)->name('report.excel.pesanan');

Route::get(
    '/report/excel-produk',
    [ReportController::class,'excelProduk']
)->name('report.excel.produk');

Route::get(
    '/report/excel-pendapatan',
    [ReportController::class,'excelPendapatan']
)->name('report.excel.pendapatan');


    });

   Route::prefix('owner')
    ->middleware(['auth', 'owner'])
    ->group(function () {

        Route::get(
            '/dashboard',
            [OwnerDashboardController::class, 'index']
        )->name('owner.dashboard');

        Route::get(
            '/produk',
            [OwnerProdukController::class, 'index']
        )->name('owner.produk');

        Route::get(
    '/kategori',
    [OwnerKategoriController::class, 'index']
)->name('owner.kategori');

        Route::get(
            '/pesanan',
            [OwnerPesananController::class, 'index']
        )->name('owner.pesanan');

        Route::get('/pesanan/{id}',
            [OwnerPesananController::class, 'show'])
            ->name('owner.pesanan.show');

        Route::get(
            '/report',
            [OwnerReportController::class, 'index']
        )->name('owner.report');

        Route::get('/report/pdf',
            [OwnerReportController::class, 'pdf']
        )->name('owner.report.pdf');

        Route::get('/report/excel',
            [OwnerReportController::class, 'excel']
        )->name('owner.report.excel');

        Route::get(
    '/report/pdf-all',
    [OwnerReportController::class,'pdfAll']
)->name('owner.report.pdf.all');

Route::get(
    '/report/excel-all',
    [OwnerReportController::class,'excelAll']
)->name('owner.report.excel.all');
    });