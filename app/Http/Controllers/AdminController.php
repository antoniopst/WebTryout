<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request; // Import Request
use Illuminate\Support\Facades\Hash; // Import Hash
use Illuminate\Support\Facades\Auth; // Import Auth

class AdminController extends Controller
{
    // Menampilkan dashboard admin
    public function index()
    {
        return view('admin.dashboard'); // Gantilah dengan view yang sesuai
    }

    // Menampilkan daftar pengguna
    public function users()
    {
        $users = User::all(); // Ambil semua pengguna dari database
        return view('admin.users.index', compact('users')); // Kirim data ke view
    }

    // Menampilkan formulir untuk mengedit pengguna
    public function editUser($id)
    {
        $user = User::findOrFail($id); // Ambil pengguna berdasarkan ID
        return view('admin.users.edit', compact('user')); // Kirim pengguna ke view edit
    }

    // Memperbarui pengguna
    public function updateUser(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $id, // Validasi email
            // Tambahkan validasi lain sesuai kebutuhan
        ]);

        $user = User::findOrFail($id); // Ambil pengguna berdasarkan ID
        $user->name = $request->name; // Perbarui nama
        $user->email = $request->email; // Perbarui email

        // Hanya perbarui password jika diisi
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password); // Hash password baru
        }

        $user->save(); // Simpan perubahan ke database

        return redirect()->route('admin.users')->with('success', 'Pengguna berhasil diperbarui!'); // Redirect kembali ke daftar pengguna
    }

    // Menghapus pengguna
    public function destroyUser($id)
    {
        $user = User::findOrFail($id); // Ambil pengguna berdasarkan ID
        $user->delete(); // Hapus pengguna

        return redirect()->route('admin.users')->with('success', 'Pengguna berhasil dihapus!'); // Redirect kembali ke daftar pengguna
    }
}
