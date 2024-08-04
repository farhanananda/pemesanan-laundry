<?php

namespace App\Http\Controllers;

use App\Models\LaundryMember;
use App\Models\Member;
use Illuminate\Http\Request;

class LaundryMemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataMember = LaundryMember::latest()->paginate(10);
        return view('laundrymember.index', compact('dataMember'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dataMember = Member::all();
        return view('laundrymember.create', compact('dataMember'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // $request->validate([
        //     'nama_customer'      => 'required'
        // ]);

        LaundryMember::create([
            'tgl_transaksi'        => $request->tgl_transaksi,
            'member_id'        => $request->member_id,
            'keterangan'        => $request->keterangan,
            'status_laundry'        => $request->status_laundry,
            'status_pembayaran'        => $request->status_pembayaran,
            'lokasi_kirim'        => $request->lokasi_kirim,

        ]);
        //redirect to index
        return redirect()->route('laundrymember.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $laundryMember = LaundryMember::findOrFail($id);

        return view('laundrymember.show', compact('laundryMember'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $laundryMember = LaundryMember::findOrFail($id);
        return view('laundrymember.edit', compact('laundryMember'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $laundryMember =  LaundryMember::findOrFail($id);
        $laundryMember->update([
            'tgl_transaksi'        => $request->tgl_transaksi,
            'member_id'        => $request->member_id,
            'keterangan'        => $request->keterangan,
            'status_laundry'        => $request->status_laundry,
            'status_pembayaran'        => $request->status_pembayaran,
            'lokasi_kirim'        => $request->lokasi_kirim,

        ]);
        //redirect to index
        return redirect()->route('laundrymember.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $laundryMember = LaundryMember::findOrFail($id);
       $laundryMember->delete();
        return redirect()->route('laundrymember.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
