<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('peminjaman', function (Blueprint $table) {

            $table->id('id_pinjam');

            // admin yang memproses
            $table->foreignId('id_akun')
                    ->constrained('admin')
                    ->cascadeOnDelete();

            // user peminjam
            $table->foreignId('id_user_pinjam')
                    ->constrained('user_perpustakaan', 'id_user')
                    ->cascadeOnDelete();

            $table->date('tanggal_pinjam');

            $table->date('tanggal_kembali')->nullable();

            $table->integer('lama_pinjam');

            $table->enum('status', [
                'dipinjam',
                'dikembalikan',
                'terlambat'
            ])->default('dipinjam');

            $table->timestamps();

        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peminjaman');
    }
};
