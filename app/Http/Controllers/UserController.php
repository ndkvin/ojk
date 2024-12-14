<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Menampilkan daftar user
    public function index()
    {
        $users = User::where('role', "!=", 'superadmin')->get();
        return view('pages.verification', compact('users'));
    }

    // Mengupdate role user
    public function updateRole(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if (auth()->user()->role !== 'superadmin') {
            return redirect()->back()->with('error', 'Hanya superadmin yang dapat mengubah role.');
        }

        $user->role = $request->role;
        $user->save();

        return redirect()->back()->with('success', 'Role berhasil diperbarui.');
    }

    public function softDelete($id)
    {
        // Cari user berdasarkan ID
        $user = User::findOrFail($id);

        // Pastikan role superadmin yang melakukan soft delete
        if (auth()->user()->role !== 'superadmin') {
            return redirect()->back()->with('error', 'Anda tidak memiliki izin untuk menghapus pengguna.');
        }

        // Pastikan superadmin tidak menghapus dirinya sendiri
        if ($user->id === auth()->id()) {
            return redirect()->back()->with('error', 'Anda tidak dapat menghapus akun Anda sendiri.');
        }

        $user->delete();

        return redirect()->back()->with('success', 'Pengguna berhasil dihapus.');
    }
}
