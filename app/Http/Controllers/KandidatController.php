<?php

namespace App\Http\Controllers;

use App\Models\Kandidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreKandidatRequest;
use App\Http\Requests\UpdateKandidatRequest;

class KandidatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // return Kandidat::all();
        // return Kandidat::select('periode')->distinct()->get();
        if(request('periode')){
            $periode = request('periode');
        } else {
            $periode = date('Y');
        }
        // return Kandidat::where('periode', $periode)->get();
        return view('admin.kandidat.index', [
            'kandidat' => Kandidat::where('periode', $periode)->get(),
            'periode' => Kandidat::select('periode')->orderBy('periode', 'asc')->distinct()->get()
            // 'periode' => Kandidat::all(),
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
            'nama_kandidat' => 'required',
            'periode'=> 'required',
            'visi' => 'nullable',
            'misi' => 'nullable',
            'foto' => 'image'
        ]);
        $validatedData['foto'] = $request->foto->store('foto-kandidat');

        $kandidat = Kandidat::create($validatedData);

        return redirect()->route('kandidat.index',['periode' => $kandidat->periode])->with('success', 'Data Kandidat berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kandidat $kandidat)
    {
        return view('admin.kandidat.details', [
            'kandidat' => $kandidat
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Kandidat $kandidat)
    {
        return view('admin.kandidat.edit', [
            'kandidat' => $kandidat
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Kandidat $kandidat)
    {
        $validatedData = $request->validate([
            'nama_kandidat' => 'required',
            'periode'=> 'required',
            'visi' => 'nullable',
            'misi' => 'nullable'
        ]);

        if ($request->foto) {
            $this->validate($request, [
                'foto' => 'image'
            ]);
            if ($request->fotoLama) {
                Storage::delete($request->fotoLama);
            }
            $validatedData['foto'] = $request->foto->store('foto-kandidat');
        }
        $kandidat->update($validatedData);

        return redirect()->route('kandidat.show', $kandidat->id)->with('success', 'Data Kandidat berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Kandidat $kandidat)
    {
        if ($kandidat->foto) {
            Storage::delete($kandidat->foto);
        }
        $kandidat->delete();

        return redirect()->back()->with('warning', 'Data Kandidat berhasil dihapus!');
    }
}
