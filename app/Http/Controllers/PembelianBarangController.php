<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PembelianBarang;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PembelianBarangController extends Controller
{
    public function index(): View
    {
       $dataPembelianBarang = PembelianBarang::latest()->paginate(10);
       return view('pembelianbarang.index',compact('dataPembelianBarang'));
    }

    public function create(): View
    {
        return view('pembelianbarang.create');
    }

    public function store(Request $request): RedirectResponse
    {
       
        //validate form
        $request->validate([
            'nama_matakuliah'      => 'required|min:2|unique:matakuliah,nama_matakuliah'
        ]);

        PembelianBarang::create([
            'nama_matakuliah'        => $request->nama_matakuliah,
        ]);
        //redirect to index
        return redirect()->route('pembelianbarang.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id): View
    {
        $dataMatakuliah = PembelianBarang::findOrFail($id);
        return view('pembelianbarang.edit', compact('dataMatakuliah'));
    }

    public function show(string $id): View
    {
        $matakuliah = pembelianbarang::findOrFail($id);

        return view('pembelianbarang.show', compact('matakuliah'));
    }

    public function update(Request $request, $id): RedirectResponse
    {
        //validate form
        $request->validate([
            'nama_matakuliah'      => 'required|min:2'
        ]);

        $dataMatakuliah = PembelianBarang::findOrFail($id);
        $dataMatakuliah->update([
             'nama_matakuliah'  => $request->nama_matakuliah
            ]);

        return redirect()->route('pembelianbarang.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id): RedirectResponse
    {
        $matakuliah = PembelianBarang::findOrFail($id);
        $matakuliah->delete();
        return redirect()->route('pembelianbarang.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
    //

