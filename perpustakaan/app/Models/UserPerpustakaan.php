<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class UserPerpustakaan extends Model
{
    use HasApiTokens;
    protected $table = 'user_perpustakaan';

    protected $primaryKey = 'id_user';

    protected $fillable = [
        'nim',
        'nama'
    ];

    // relasi ke peminjaman
    public function peminjaman()
    {
        return $this->hasMany(Peminjaman::class, 'id_user_pinjam');
    }
}