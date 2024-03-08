<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        $petugas = User::all();
        $title = "register";
        return view('KelolaPetugas.index', compact('petugas', 'title'));
    }

    public function store(Request $request)
    {
        // Validasi data yang diterima dari formulir registrasi
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'password' => 'required',
            'status' => 'required',
        ]);

        // Cek apakah username atau email sudah ada sebelumnya
        if (User::where('idpetugas', $request->idpetugas)->exists()) {
            return redirect('/register')->with('error', 'ID PETUGAS SUDAH TERDAFTAR');
        }

        // dd($request->all());
        // Membuat pengguna baru dalam database
        $user = User::create([
            'idpetugas' => $request->idpetugas,
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => $request->status
        ]);
        // Auth::login($user);

        // Mengarahkan pengguna ke lokasi yang dituju setelah registrasi
        return redirect('/register')->with('success', 'Registrasi berhasil!');
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $title = "register";
        return view('KelolaPetugas.edit', compact('user', 'title'));
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        // Validasi data yang diterima dari formulir edit jika diperlukan
        $request->validate([
            'name' => 'required',
            'username' => 'required',
            'email' => 'required',
            'status' => 'required',
        ]);

        // Perbarui data pengguna
        $user->update([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'status' => $request->status,
        ]);

        // Redirect kembali ke halaman yang sesuai setelah berhasil mengedit
        return redirect()->route('register.index')->with('success', 'Data pengguna berhasil diperbarui.');
    }
    public function destroy($id)
    {
        $user = User::find($id);
        if ($user) {
            $user->delete();
            return redirect()->route('register.index')->with('success', 'Pengguna berhasil dihapus.');
        } else {
            return redirect()->route('register.index')->with('error', 'Pengguna tidak ditemukan.');
        }
    }
}
