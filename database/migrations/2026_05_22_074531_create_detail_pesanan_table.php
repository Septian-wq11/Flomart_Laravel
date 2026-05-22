<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_pesanan', function (Blueprint $table) {

            $table->id('id_detail');

            $table->foreignId('id_pesanan')
                ->constrained('pesanan', 'id_pesanan')
                ->onDelete('cascade');

            $table->foreignId('id_produk')
                ->constrained('produk', 'id_produk')
                ->onDelete('cascade');

            $table->integer('qty');

            $table->decimal('harga', 12, 2);

            $table->decimal('subtotal', 12, 2);

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_pesanan');
    }
};