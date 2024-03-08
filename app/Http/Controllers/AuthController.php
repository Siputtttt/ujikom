<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{


    public function index()
    {
        return view('login.index');
    }
    public function login(Request $request)
    {
        // Validasi data yang diterima dari formulir login
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string',
        ]);

        $user = User::where('username', $request->username)->first(); // Cari pengguna berdasarkan username

        // Jika tidak ada pengguna dengan username yang diberikan
        if (!$user) {
            return redirect()->back()->withInput($request->only('username'))->with('username', 'Username tidak ditemukan');
        }

        // Jika ada pengguna, tetapi password yang diberikan salah
        if ($user && !Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->back()->withInput($request->only('username'))->with('warning', 'Password yang anda masukan salah,PERIKSA KEMBALI!!</b>');
        }

        // Jika otentikasi berhasil, arahkan pengguna ke lokasi yang dituju
        return redirect()->intended('/dashboard')->with('success', 'Login berhasil!');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login')->with('success', 'Anda telah berhasil logout.');
    }
}
