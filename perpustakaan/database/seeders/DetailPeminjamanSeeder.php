<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\DetailPeminjaman;

class DetailPeminjamanSeeder extends Seeder
{
    public function run(): void
    {
        DetailPeminjaman::create([
            'id_pinjam' => 1,
            'id_buku' => 1,
            'jumlah' => 1
        ]);

        DetailPeminjaman::create([
            'id_pinjam' => 1,
            'id_buku' => 2,
            'jumlah' => 1
        ]);

        DetailPeminjaman::create([
            'id_pinjam' => 2,
            'id_buku' => 3,
            'jumlah' => 1
        ]);
    }
}