<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Peminjaman;

class RiwayatController extends Controller
{
    public function index($id_user)
    {
        $riwayat = Peminjaman::with([
            'detailPeminjamans.buku'
        ])
        ->where('id_user_pinjam', $id_user)
        ->get();

        return response()->json([
            'success' => true,
            'data' => $riwayat
        ]);
    }
}