<?php

namespace App\Http\Controllers;

use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataMember = Member::latest()->paginate(10);
        return view('member.index',compact('dataMember'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('member.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         //validate form
         $request->validate([
            'nama_member'      => 'required|min:2|unique:pegawai,nama_pegawai',
            'no_identitas'      => 'required',
            'alamat'      => 'required',
            'no_hp'      => 'required',
            'keterangan'      => 'required',
            'tgl_join'      => 'required',
        ]);

        Member::create([
            'nama_member'        => $request->nama_member,
            'no_identitas'        => $request->no_identitas,
            'alamat'        => $request->alamat,
            'no_hp'        => $request->no_hp,  
            'keterangan'        => $request->keterangan,  
            'tgl_join'        => $request->tgl_join,  
        ]);
        //redirect to index
        return redirect()->route('member.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $member = Member::findOrFail($id);

        return view('member.show', compact('member'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $member = Member::findOrFail($id);

        return view('member.edit', compact('member'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_member'      => 'required|min:2|unique:pegawai,nama_pegawai',
            'no_identitas'      => 'required',
            'alamat'      => 'required',
            'no_hp'      => 'required',
            'keterangan'      => 'required',
            'tgl_join'      => 'required',
        ]);
        $member=Member::findOrFail($id);
        $member->update([
            'nama_member'        => $request->nama_member,
            'no_identitas'        => $request->no_identitas,
            'alamat'        => $request->alamat,
            'no_hp'        => $request->no_hp,  
            'keterangan'        => $request->keterangan,  
            'tgl_join'        => $request->tgl_join,  
        ]);
        //redirect to index
        return redirect()->route('member.index')->with(['success' => 'Data Berhasil Diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $member = Member::findOrFail($id);
        $member->delete();
        return redirect()->route('member.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
