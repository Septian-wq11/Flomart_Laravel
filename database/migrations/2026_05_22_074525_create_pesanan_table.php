<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesanan', function (Blueprint $table) {

            $table->id('id_pesanan');

            $table->foreignId('id_user')
                ->constrained('users', 'id_user')
                ->onDelete('cascade');

            $table->dateTime('tanggal_pesanan');

            $table->decimal('total_harga', 12, 2);

            $table->enum('status_pesanan', [
                'diproses',
                'dikirim',
                'selesai',
                'dibatalkan'
            ]);

            $table->text('alamat_kirim');

            $table->string('metode_pembayaran');

            $table->text('catatan')->nullable();

            $table->string('bukti_pembayaran')->nullable();

            $table->string('nama_penerima');

            $table->string('no_hp');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesanan');
    }
};