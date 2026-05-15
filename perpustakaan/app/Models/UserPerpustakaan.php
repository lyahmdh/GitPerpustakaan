<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Sanctum\HasApiTokens;

class UserPerpustakaan extends Authenticatable
{
    use HasApiTokens;

    protected $table = 'user_perpustakaan';

    protected $primaryKey = 'id_user';

    protected $fillable = [
        'nim',
        'nama',
        'role'
    ];

    public function peminjaman()
    {
        return $this->hasMany(
            Peminjaman::class,
            'id_user_pinjam'
        );
    }
}