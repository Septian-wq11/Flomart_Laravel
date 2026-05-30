<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('blogs', function (Blueprint $table) {

            $table->id('id_blog');

            $table->string('judul');

            $table->string('gambar');

            $table->string('kategori');

            $table->string('penulis');

            $table->date('tanggal');

            $table->longText('isi');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};