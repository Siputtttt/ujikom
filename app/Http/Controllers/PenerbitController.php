<?php

namespace App\Http\Controllers;
use App\Models\penerbit;
use Illuminate\Http\Request;

class PenerbitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penerbit = Penerbit::all();
        $title = "penerbit";
        return view('KelolaPenerbit.index', compact('penerbit', 'title'));
    }
    public function store(Request $request)
    {
        Penerbit::create($request->all());
        return redirect()->route('penerbits.index')->with('success', 'Penerbit berhasil ditambahkan.');
    }

    public function edit($id)
    {
        // $penerbit = Penerbit::findOrFail($id);
        $penerbit = Penerbit::where('idpenerbit', $id)->first();
        // dd($penerbit);
        $title = "penerbit";
        return view('KelolaPenerbit.edit', compact('penerbit', 'title'));
    }

    public function update(Request $request, $id)
    {
        // $penerbit = Penerbit::findOrFail($id);
        // $penerbit->update($request->all());
        $input = [
            'namapenerbit' => $request->namapenerbit,
            'alamat' => $request->alamat,
            'kota' => $request->kota,
            'telepon' => $request->telepon,
        ];


        Penerbit::where('idpenerbit', $id)->update($input);
        return redirect()->route('penerbit.index')->with('success', 'Penerbit berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $penerbit = Penerbit::where('idpenerbit', $id)->delete();
        // dd($penerbit);
        // $penerbit->delete();
        return redirect()->route('penerbit.index')->with('success', 'Penerbit berhasil dihapus.');
    }
}
