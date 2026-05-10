<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DetailPeminjaman extends Model
{
    protected $table = 'detail_peminjaman';

    protected $primaryKey = 'id_detail';

    protected $fillable = [
        'id_pinjam',
        'id_buku',
        'jumlah'
    ];

    // relasi ke peminjaman
    public function peminjaman()
    {
        return $this->belongsTo(Peminjaman::class, 'id_pinjam');
    }

    // relasi ke buku
    public function buku()
    {
        return $this->belongsTo(Buku::class, 'id_buku');
    }
}