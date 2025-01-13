<?php

<<<<<<< HEAD
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
=======
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminUserController extends Controller
{
    // Fungsi untuk menampilkan halaman daftar user
    public function index()
    {
        // Ambil semua data pengguna
        $users = User::orderBy('id')->get();

        // Kirim data ke view
        return view('admin.users.index', compact('users'));
    }

    // Fungsi untuk menampilkan form edit user
    public function edit($id)
    {
        // Cari user berdasarkan ID
        $user = User::findOrFail($id);
        
        // Kirim data user ke view
        return view('admin.users.edit', compact('user'));
    }

    // Fungsi untuk memperbarui data user
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
            'school' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'city' => 'required|string|max:255',
        ]);

        // Cari user berdasarkan ID
        $user = User::findOrFail($id);
        
        // Perbarui data user
        $user->name = $request->name;
        $user->email = $request->email;
        $user->school = $request->school;
        $user->province = $request->province;
        $user->city = $request->city;
        $user->save();

        // Redirect ke halaman daftar user dengan pesan sukses
        return redirect()->route('admin.users.index')->with('success', 'User updated successfully.');
    }

    // Fungsi untuk menghapus user
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.users.index')->with('success', 'User berhasil dihapus');
    }
}
>>>>>>> 7e6e4db50ee003f5ce36e121374272154efdc1e9
