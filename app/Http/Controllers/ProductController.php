<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    // Constructor kosong, karena tidak ada middleware
    public function __construct()
    {
        // Tidak ada middleware di sini
    }

    // Menampilkan daftar produk dengan filter, sorting, dan pagination
    public function index(Request $request)
    {
        $query = Product::query();

        // Filter berdasarkan kategori jika ada
        if ($request->has('category')) {
            $query->where('category', $request->category);
        }

        // Sorting berdasarkan parameter yang diberikan
        if ($request->has('sort_by')) {
            $query->orderBy($request->sort_by, $request->get('sort_order', 'asc'));
        }

        // Pagination: 10 produk per halaman
        $products = $query->paginate(10);

        return response()->json($products);
    }

    // Menyimpan produk baru
    public function store(Request $request)
    {
        // Validasi data input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'price' => 'required|numeric',
        ]);

        // Membuat produk baru
        $product = Product::create($validated);

        return response()->json($product, 201); // Kembalikan produk dengan status 201
    }

    // Mengupdate produk yang sudah ada
    public function update(Request $request, $id)
    {
        // Validasi data input
        $validated = $request->validate([
            'name' => 'string|max:255',
            'category' => 'string',
            'price' => 'numeric',
        ]);

        // Cari produk berdasarkan ID atau gagal (404)
        $product = Product::findOrFail($id);
        $product->update($validated);

        return response()->json($product, 200); // Kembalikan produk yang sudah diupdate
    }

    // Menghapus produk berdasarkan ID
    public function destroy($id)
    {
        // Cari produk berdasarkan ID atau gagal (404)
        $product = Product::findOrFail($id);
        $product->delete();

        return response()->json(['message' => 'Product deleted'], 200); // Kembalikan pesan sukses
    }
}
