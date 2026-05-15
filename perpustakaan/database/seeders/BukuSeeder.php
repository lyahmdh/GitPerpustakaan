<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Buku;

class BukuSeeder extends Seeder
{
    public function run(): void
    {
        Buku::create([
            'judul' => 'Clean Code',
            'pengarang' => 'Robert C. Martin',
            'kategori' => 'Pemrograman',
            'stok' => 5,
            'tersedia' => true
        ]);

        Buku::create([
            'judul' => 'Laravel Dasar',
            'pengarang' => 'Alya Hamidah',
            'kategori' => 'Web Development',
            'stok' => 3,
            'tersedia' => true
        ]);

        Buku::create([
            'judul' => 'Basis Data',
            'pengarang' => 'Abdul Kadir',
            'kategori' => 'Database',
            'stok' => 2,
            'tersedia' => true
        ]);

        Buku::create([
            'judul' => 'Machine Learning Basics',
            'pengarang' => 'Andrew Ng',
            'kategori' => 'AI',
            'stok' => 4,
            'tersedia' => true
        ]);

        Buku::create([
            'judul' => 'Jaringan Komputer',
            'pengarang' => 'Tanenbaum',
            'kategori' => 'Networking',
            'stok' => 6,
            'tersedia' => true
        ]);
    }
}