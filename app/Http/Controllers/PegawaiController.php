<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class PegawaiController extends Controller
{
    public function index(): View
    {
       $dataPegawai = Pegawai::latest()->paginate(10);
       return view('pegawai.index',compact('dataPegawai'));
    }

    public function create(): View
    {
        return view('pegawai.create');
    }

    public function store(Request $request): RedirectResponse
    {
       
        //validate form
        $request->validate([
            'nama_pegawai'      => 'required|min:2|unique:pegawai,nama_pegawai'
        ]);

        Pegawai::create([
            'nama_pegawai'        => $request->nama_pegawai,
            'alamat'        => $request->alamat,
            'no_hp'        => $request->no_hp,
            'jabatan'        => $request->jabatan,  
        ]);
        //redirect to index
        return redirect()->route('pegawai.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $id_pegawai): View
    {
        $dataPegawai = Pegawai::findOrFail($id_pegawai);
        return view('pegawai.edit', compact('dataPegawai'));
    }

    public function show(string $id_pegawai): View
    {
        $pegawai = Pegawai::findOrFail($id_pegawai);

        return view('pegawai.show', compact('pegawai'));
    }

    public function update(Request $request, $id_pegawai): RedirectResponse
    {
        //validate form
        $request->validate([
            'nama_pegawai'      => 'required|min:2'
        ]);

        $dataPegawai = Pegawai::findOrFail($id_pegawai);
        $dataPegawai->update([
             'nama_pegawai'  => $request->nama_pegawai,
             'alamat'        => $request->alamat,
            'no_hp'        => $request->no_hp,
            'jabatan'        => $request->jabatan,
            ]);

        return redirect()->route('pegawai.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($id_pegawai): RedirectResponse
    {
        $pegawai = Pegawai::findOrFail($id_pegawai);
        $pegawai->delete();
        return redirect()->route('pegawai.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
    //

