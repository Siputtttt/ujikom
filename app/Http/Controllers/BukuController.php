<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Penerbit; // Import model Penerbit

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::with('penerbit')->get();
        $penerbit = Penerbit::all();
        // dd($buku);
        $title = "buku";
        return view('KelolaBuku.index', compact('buku', 'title', 'penerbit'));
    }
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'IDBuku' => 'required',
            'Kategori' => 'required',
            'NamaBuku' => 'required',
            'Harga' => 'required|numeric',
            'Stok' => 'required|numeric',
            'IDPenerbit' => 'required|exists:penerbit,idpenerbit' // Pastikan idpenerbit ada di tabel penerbit
        ]);
        Buku::create($request->all());
        // Penerbit::create($request->all());

        return redirect()->route('buku.index')->with('success', 'Buku berhasil ditambahkan.');
    }

    public function edit($buku)
    {
        $buku = Buku::where('idbuku', $buku)->first();
        $penerbit = Penerbit::all(); // Ambil semua penerbit
        $title = "buku";
        return view('KelolaBuku.edit', compact('buku', 'penerbit', 'title'));
    }

    public function update(Request $request, $buku)
    {
        $request->validate([
            'kategori' => 'required',
            'namabuku' => 'required',
            'harga' => 'required|numeric',
            'stok' => 'required|numeric',
            'idpenerbit' => 'required|exists:penerbit,idpenerbit' // Pastikan idpenerbit ada di tabel penerbit
        ]);

        $input = [
            'namabuku' => $request->input('namabuku'),
            'kategori' => $request->input('kategori'),
            'harga' => $request->input('harga'),
            'stok' => $request->input('stok'),
            'idpenerbit' => $request->input('idpenerbit')
        ];
        // dd($request->all());
        Buku::where('idbuku', $buku)->update($input);

        return redirect()->route('buku.index')->with('success', 'Buku berhasil diperbarui.');
    }

    public function destroy($buku)
    {
        Buku::where('idbuku', $buku)->delete();

        return redirect()->route('buku.index')->with('success', 'Buku berhasil dihapus.');
    }
}
