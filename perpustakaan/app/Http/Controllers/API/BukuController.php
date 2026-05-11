<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    // tampil semua buku + filter kategori
    public function index(Request $request)
    {
        $query = Buku::query();

        // filter kategori
        if ($request->kategori) {

            $query->whereRaw('LOWER(kategori) = ?', [
                strtolower($request->kategori)
            ]);

        }

        $bukus = $query->latest()->get();

        return response()->json([
            'success' => true,
            'data' => $bukus
        ]);
    }

    // detail buku
    public function show($id)
    {
        $buku = Buku::find($id);

        if (!$buku) {

            return response()->json([
                'success' => false,
                'message' => 'Buku tidak ditemukan'
            ], 404);

        }

        return response()->json([
            'success' => true,
            'data' => $buku
        ]);
    }

    // search buku
    public function search(Request $request)
    {
        $query = $request->query;

        $bukus = Buku::where('judul', 'like', "%$query%")
                    ->orWhere('pengarang', 'like', "%$query%")
                    ->orWhere('kategori', 'like', "%$query%")
                    ->latest()
                    ->get();

        return response()->json([
            'success' => true,
            'data' => $bukus
        ]);
    }
}