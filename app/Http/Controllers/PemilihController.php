<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Pemilih;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Auth\Events\Validated;
use App\Http\Requests\StorePemilihRequest;
use App\Http\Requests\UpdatePemilihRequest;

class PemilihController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.pemilih.index', [
            'jabatan' => Jabatan::withCount('pemilih')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nama_pemilih' => 'required',
            'no_kta'=> 'required',
            'jk' => 'required',
            'section' => 'required',
            'jabatan_id' => 'required'
        ]);

        Pemilih::create($validatedData);

        return redirect()->back()->with('success', 'Data Pemilih berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pemilih $pemilih)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pemilih $pemilih)
    {
        return view('admin.pemilih.edit', [
            'pemilih' => $pemilih,
            'jabatan' => Jabatan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pemilih $pemilih)
    {
        $validatedData = $request->validate([
            'nama_pemilih' => 'required',
            'no_kta'=> 'required|unique:pemilihs',
            'jk' => 'required',
            'section' => 'required',
            'jabatan_id' => 'required'
        ]);

        $pemilih->update($validatedData);

        return redirect()->route('jabatan.show', $pemilih->jabatan_id)->with('success', 'Data pemilih berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pemilih $pemilih)
    {
        $pemilih->delete();

        return redirect()->back()->with('warning', 'Data Pemilih berhasil dihapus!');
    }
}
