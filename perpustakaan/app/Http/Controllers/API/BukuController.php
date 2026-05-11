<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buku;

class BukuController extends Controller
{
    // tampil semua buku
    public function index()
    {
        $bukus = Buku::all();

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
                    ->get();

        return response()->json([
            'success' => true,
            'data' => $bukus
        ]);
    }

    // tambah buku
    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required',
            'pengarang' => 'required',
            'stok' => 'required|integer'
        ]);

        $buku = Buku::create($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Buku berhasil ditambahkan',
            'data' => $buku
        ], 201);
    }

    // update buku
    public function update(Request $request, $id)
    {
        $buku = Buku::find($id);

        if (!$buku) {
            return response()->json([
                'success' => false,
                'message' => 'Buku tidak ditemukan'
            ], 404);
        }

        $buku->update($request->all());

        return response()->json([
            'success' => true,
            'message' => 'Buku berhasil diupdate',
            'data' => $buku
        ]);
    }

    // hapus buku
    public function destroy($id)
    {
        $buku = Buku::find($id);

        if (!$buku) {
            return response()->json([
                'success' => false,
                'message' => 'Buku tidak ditemukan'
            ], 404);
        }

        $buku->delete();

        return response()->json([
            'success' => true,
            'message' => 'Buku berhasil dihapus'
        ]);
    }
}