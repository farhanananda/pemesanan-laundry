<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\NonMember;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

class DataLaundryNonMemberController extends Controller
{
    public function index(): View
    {
        $dataNonMember = NonMember::latest()->paginate(10);
        return view('nonmember.index', compact('dataNonMember'));
    }

    public function create(): View
    {
        return view('nonmember.create');
    }

    public function store(Request $request): RedirectResponse
    {

        //validate form
        $request->validate([
            'nama_customer'      => 'required'
        ]);

        NonMember::create([
            'no_transaksi'        => $request->no_transaksi,
            'tgl_transaksi'        => $request->tgl_transaksi,
            'nama_customer'        => $request->nama_customer,
            'alamat'        => $request->alamat,
            'no_hp'        => $request->no_hp,
            'keterangan'        => $request->keterangan,

        ]);
        //redirect to index
        return redirect()->route('nonmember.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    public function edit(string $no_transaksi): View
    {
        $nonmember = NonMember::findOrFail($no_transaksi);
        return view('nonmember.edit', compact('nonmember'));
    }

    public function show(string $no_transaksi): View
    {
        $nonmember = NonMember::findOrFail($no_transaksi);

        return view('nonmember.show', compact('nonmember'));
    }

    public function update(Request $request, $no_transaksi): RedirectResponse
    {

        //validate form
        $request->validate([
            'tgl_transaksi'      => 'required',
            'nama_customer'      => 'required',
            'alamat'      => 'required',
            'no_hp'      => 'required',
            'keterangan'      => 'required',
        ]);

        $nonmember = NonMember::findOrFail($no_transaksi);
        $nonmember->update([
            'tgl_transaksi'        => $request->tgl_transaksi,
            'nama_customer'        => $request->nama_customer,
            'alamat'        => $request->alamat,
            'no_hp'        => $request->no_hp,
            'keterangan'        => $request->keterangan,
        ]);

        return redirect()->route('nonmember.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    public function destroy($no_transaksi): RedirectResponse
    {
        $matakuliah = NonMember::findOrFail($no_transaksi);
        $matakuliah->delete();
        return redirect()->route('nonmember.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
    //

    //
