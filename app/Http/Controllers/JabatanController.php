<?php

namespace App\Http\Controllers;

use App\Models\Jabatan;
use App\Models\Pemilih;
use Illuminate\Http\Request;
use App\Http\Requests\StoreJabatanRequest;
use App\Http\Requests\UpdateJabatanRequest;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.jabatan.index', [
            'jabatan' => Jabatan::all()
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
            'nama_jabatan' => 'required',
            'persentase'=> 'required'
        ]);

        Jabatan::create($validatedData);

        return redirect()->back()->with('success', 'Data jabatan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Jabatan $jabatan)
    {
        return view('admin.jabatan.show', [
            'pemilih' => Pemilih::where('jabatan_id',$jabatan->id)->get(),
            'jabatan' => $jabatan
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Jabatan $jabatan)
    {
        return view('admin.jabatan.edit', [
            'jabatan' => $jabatan
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Jabatan $jabatan)
    {
        $validatedData = $request->validate([
            'nama_jabatan' => 'required',
            'persentase'=> 'required'
        ]);

        $jabatan->update($validatedData);

        return redirect()->route('jabatan.index')->with('success', 'Data jabatan berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Jabatan $jabatan)
    {
        $jabatan->delete();

        return redirect()->back()->with('warning', 'Data jabatan berhasil dihapus!');
    }
}
