<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UserController extends Controller
{
    public function getAllJemaat()
    {
        $users = User::where('role', 'jemaat')->get();
        return view('ketua_stasi.data_jemaat', ["users" => $users]);
    }

    public function storeDataJemaat(Request $request)
    {
        // Validasi input
        $validatedData = $request->validate([
            'username' => 'required|unique:users',
            'password' => 'required',
            'full_name' => 'required',
            'email' => 'required|email|unique:users',
            'phone_number' => 'required|unique:users',
            'role' => 'required|in:jemaat,ketua_stasi',
        ]);

        try {
            // Simpan data menggunakan Eloquent
            $user = new User();
            $user->username = $request->username;
            $user->password = Hash::make($request->password);
            $user->full_name = $request->full_name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->role = $request->role;
            $user->save();

            // Mengembalikan respons JSON untuk keperluan AJAX
            return response()->json(['message' => 'Data jemaat berhasil disimpan'], 200);
        } catch (\Exception $e) {
            // Mengembalikan respons JSON untuk error
            return response()->json(['error' => 'Terjadi kesalahan: ' . $e->getMessage()], 500);
        }
    }

    public function getDataJemaat($id)
    {
        $user = User::findOrFail($id); // Sesuaikan dengan model dan kondisi Anda
        return response()->json($user);
    }

    public function updateDataJemaat(Request $request, $id)
    {
        $request->validate([
            'username' => 'required',
            'full_name' => 'required',
            'email' => 'required|email',
            'phone_number' => 'required',
            'role' => 'required',
        ]);

        try {
            $user = User::findOrFail($id); // Sesuaikan dengan model dan kondisi Anda
            $user->username = $request->username;
            $user->full_name = $request->full_name;
            $user->email = $request->email;
            $user->phone_number = $request->phone_number;
            $user->role = $request->role;
            $user->save();

            return response()->json(['success' => true, 'message' => 'Data jemaat berhasil diupdate']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Gagal memperbarui data jemaat. ' . $e->getMessage()], 500);
        }
    }

    public function destroy($id)
    {
        try {
            // Cari jemaat berdasarkan ID
            $jemaat = User::findOrFail($id);

            // Hapus jemaat
            $jemaat->delete();

            // Berikan respon sukses
            return response()->json(['success' => 'Data jemaat berhasil dihapus.'], 200);
        } catch (\Exception $e) {
            // Berikan respon error jika terjadi kesalahan
            return response()->json(['error' => 'Terjadi kesalahan saat menghapus data.'], 500);
        }
    }
}
