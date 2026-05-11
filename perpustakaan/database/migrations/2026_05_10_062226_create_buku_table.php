<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('buku', function (Blueprint $table) {

            $table->id('id_buku');

            $table->string('judul');

            $table->string('pengarang');

            $table->string('penerbit')->nullable();

            $table->year('tahun_terbit')->nullable();

            $table->string('isbn')->unique()->nullable();

            $table->string('kategori')->nullable();

            $table->integer('jumlah_halaman')->nullable();

            $table->text('deskripsi')->nullable();

            $table->integer('stok')->default(0);

            $table->boolean('tersedia')->default(true);

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('buku');
    }
};
