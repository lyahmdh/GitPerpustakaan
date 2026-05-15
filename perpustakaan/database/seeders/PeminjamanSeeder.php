<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Peminjaman;

class PeminjamanSeeder extends Seeder
{
    public function run(): void
    {
        Peminjaman::create([
            'id_user_pinjam' => 1,
            'id_akun' => 1,
            'tanggal_pinjam' => now(),
            'lama_pinjam' => 7,
            'status' => 'dipinjam'
        ]);

        Peminjaman::create([
            'id_user_pinjam' => 2,
            'id_akun' => 1,
            'tanggal_pinjam' => now(),
            'lama_pinjam' => 5,
            'status' => 'dikembalikan',
            'tanggal_kembali' => now()
        ]);
    }
}