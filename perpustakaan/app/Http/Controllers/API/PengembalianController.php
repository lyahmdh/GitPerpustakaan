<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;

use App\Models\Peminjaman;
use Illuminate\Support\Facades\DB;

class PengembalianController extends Controller
{
    public function kembalikan($id)
    {
        DB::beginTransaction();

        try {

            $peminjaman = Peminjaman::with('detailPeminjamans.buku')
                            ->find($id);

            if (!$peminjaman) {

                return response()->json([
                    'success' => false,
                    'message' => 'Data tidak ditemukan'
                ], 404);
            }

            // update status
            $peminjaman->status = 'dikembalikan';

            $peminjaman->tanggal_kembali = now();

            $peminjaman->save();

            // kembalikan stok buku
            foreach ($peminjaman->detailPeminjamans as $detail) {

                $buku = $detail->buku;

                $buku->stok += $detail->jumlah;

                if ($buku->stok > 0) {
                    $buku->tersedia = true;
                }

                $buku->save();
            }

            DB::commit();

            return response()->json([
                'success' => true,
                'message' => 'Buku berhasil dikembalikan'
            ]);

        } catch (\Exception $e) {

            DB::rollBack();

            return response()->json([
                'success' => false,
                'message' => $e->getMessage()
            ], 500);
        }
    }
}