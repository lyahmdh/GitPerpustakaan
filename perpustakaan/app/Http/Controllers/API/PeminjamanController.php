<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Peminjaman;
use App\Models\DetailPeminjaman;
use App\Models\Buku;

use Illuminate\Support\Facades\DB;

class PeminjamanController extends Controller
{
    // semua transaksi
    public function index()
    {
        $data = Peminjaman::with([
            'user',
            'admin',
            'detailPeminjamans.buku'
        ])->get();

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    // detail transaksi
    public function show($id)
    {
        $data = Peminjaman::with([
            'user',
            'admin',
            'detailPeminjamans.buku'
        ])->find($id);

        if (!$data) {
            return response()->json([
                'success' => false,
                'message' => 'Transaksi tidak ditemukan'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => $data
        ]);
    }

    // simpan peminjaman
    public function store(Request $request)
    {
        DB::beginTransaction();

        try {

            $request->validate([
                'id_akun' => 'required',
                'id_user_pinjam' => 'required',
                'lama_pinjam' => 'required|integer',
                'bukus' => 'required|array'
            ]);

            $peminjaman = Peminjaman::create([
                'id_akun' => $request->id_akun,
                'id_user_pinjam' => $request->id_user_pinjam,
                'tanggal_pinjam' => now(),
                'lama_pinjam' => $request->lama_pinjam,
                'status' => 'dipinjam'
            ]);

            foreach ($request->bukus as $item) {

                $buku = Buku::find($item['id_buku']);

                if (!$buku) {
                    throw new \Exception('Buku tidak ditemukan');
                }

                if ($buku->stok < $item['jumlah']) {
                    throw new \Exception('Stok buku tidak cukup');
                }

                DetailPeminjaman::create([
                    'id_pinjam' => $peminjaman->id_pinjam,
                    'id_buku' => $item['id_buku'],
                    'jumlah' => $item['jumlah']
                ]);

                // kurangi stok
                $buku->stok -= $item['jumlah'];

                if ($buku->stok <= 0) {
                    $buku->tersedia = false;
                }

                $buku->save();
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Peminjaman berhasil',
                'data' => $peminjaman
            ], 201);

        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}