<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role as SpatieRole;
use App\Models\User;

class CrudController extends Controller
{
    // Fungsi untuk memeriksa akses admin
    private function checkAdminAccess()
    {

        return null; // Akses diperbolehkan
    }

    // Menampilkan halaman CRUD dengan daftar menu
    public function index()
    {
        $menus = Menu::whereNull('deleted_at')->get(); // Menampilkan data yang belum dihapus (soft delete)
        return view('roti.crud', compact('menus'));
    }

    // Menampilkan form untuk mengedit menu
    public function edit($id)
    {
        // Memeriksa akses admin
        $accessCheck = $this->checkAdminAccess();
        if ($accessCheck) return $accessCheck;

        $menu = Menu::findOrFail($id);
        return view('roti.edit', compact('menu'));
    }

    // Menyimpan menu baru
    public function store(Request $request)
    {
        // Memeriksa akses admin
        $accessCheck = $this->checkAdminAccess();
        if ($accessCheck) return $accessCheck;
    
        // Validasi inputan
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric',
            'image' => 'required|string|max:1000' // Pastikan ini tidak null
        ]);
    
        // Menyimpan menu
        $imagePath = $request->image ?? 'No Image'; // Menetapkan nilai default jika tidak ada input
    
        // Simpan data menu dengan path gambar
        Menu::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $imagePath, // Simpan string (atau default "No Image")
        ]);
    
        return redirect()->route('crud.index')->with('success', 'Menu berhasil ditambahkan!');
    }

    // Memperbarui menu yang ada
    public function update(Request $request, $id)
    {
        // Memeriksa akses admin
        $accessCheck = $this->checkAdminAccess();
        if ($accessCheck) return $accessCheck;

        // Validasi inputan
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:1000',
            'price' => 'required|numeric',
            'image' => 'required|string|max:1000' // Pastikan ini tidak null
    ]);

        $menu = Menu::findOrFail($id);
        
        // Memperbarui menu, image tetap ada dan tidak null
        $menu->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'image' => $request->image ?? 'No Image', // Menetapkan nilai default jika tidak ada input
        ]);

        return redirect()->route('crud.index')->with('success', 'Menu berhasil diupdate!');
    }


    // Menghapus menu (soft delete)
    public function destroy($id)
    {
        // Memeriksa akses admin
        $accessCheck = $this->checkAdminAccess();
        if ($accessCheck) return $accessCheck;

        $menu = Menu::withTrashed()->findOrFail($id);
        $menu->delete(); // Soft delete

        return redirect()->route('crud.index')->with('success', 'Menu berhasil dihapus (soft delete)!');
    }

    // Restore menu yang dihapus
    public function restore($id)
    {
        $menu = Menu::withTrashed()->findOrFail($id);
        $menu->restore(); // Mengembalikan data yang sudah dihapus (soft delete)

        return redirect()->route('crud.index')->with('success', 'Menu berhasil direstore!');
    }

    // Force delete (hapus permanen)
    public function forceDelete($id)
    {
        $menu = Menu::withTrashed()->findOrFail($id);
        $menu->forceDelete(); // Hapus permanen

        return redirect()->route('crud.index')->with('success', 'Menu berhasil dihapus permanen!');
    }

    // Memberikan peran admin kepada pengguna (opsional)
    public function makeAdmin($userId)
    {
        $user = User::findOrFail($userId);
        $role = SpatieRole::firstOrCreate(['name' => 'admin']);
        $user->assignRole($role);

        return "User dengan ID {$userId} telah menjadi admin.";
    }
}
