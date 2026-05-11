<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Peminjaman extends Model
{
    protected $table = 'peminjaman';

    protected $primaryKey = 'id_pinjam';

    protected $fillable = [
        'id_akun',
        'id_user_pinjam',
        'tanggal_pinjam',
        'tanggal_kembali',
        'lama_pinjam',
        'status'
    ];

    // relasi admin
    public function admin()
    {
        return $this->belongsTo(Admin::class, 'id_akun');
    }

    // relasi user
    public function user()
    {
        return $this->belongsTo(UserPerpustakaan::class, 'id_user_pinjam');
    }

    // relasi detail peminjaman
    public function detailPeminjaman()
    {
        return $this->hasMany(DetailPeminjaman::class, 'id_pinjam');
    }
}