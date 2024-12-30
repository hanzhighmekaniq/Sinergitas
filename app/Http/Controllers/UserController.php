<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all(); // Mengambil semua data user
        return view('admin.users', compact('users')); // Tampilkan ke view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create'); // Tampilkan form create user
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
            'role' => 'nullable|string|in:admin,karyawan', // Role opsional
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hash password
            'role' => $request->role ?? 'karyawan', // Default 'karyawan' jika tidak dipilih
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $user = User::findOrFail($id); // Cari user berdasarkan ID
        return view('admin.edit', compact('user')); // Tampilkan form edit
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $user = User::findOrFail($id); // Cari user berdasarkan ID

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $user->id, // Email unik kecuali user ini
            'password' => 'nullable|string|min:8', // Tidak wajib jika tidak diubah
            'role' => 'nullable|string|in:admin,karyawan', // Role opsional
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password, // Password hanya diupdate jika diisi
            'role' => $request->role ?? $user->role, // Role diupdate hanya jika diisi
        ]);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id); // Cari user berdasarkan ID

        // Periksa apakah yang tersisa hanya satu admin
        $adminCount = User::where('role', 'admin')->count();

        if ($adminCount <= 1 && $user->role == 'admin') {
            return redirect()->route('users.index')
                ->with('error', 'Tidak dapat menghapus user karena hanya tersisa satu admin.');
        }

        $user->delete(); // Hapus user

        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}
