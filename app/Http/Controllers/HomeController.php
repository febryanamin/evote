<?php

namespace App\Http\Controllers;

use App\Models\Suara;
use App\Models\Golput;
use App\Models\Pemilih;
use App\Models\Kandidat;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('home.index');
    }

    public function login(Request $request)
    {
        $this->validate($request, [
            'no_kta' => 'required'
        ]);

        $pemilih = Pemilih::where('no_kta', $request->no_kta)->first();
        // return $pemilih;
        if (isset($pemilih)) {
            $suara = Suara::where('pemilih_id', $pemilih->id)->where('periode', date('Y'))->get();
            $golput = Golput::where('pemilih_id', $pemilih->id)->where('periode', date('Y'))->get();
            if ($suara->count() <= 0 && $golput->count() <= 0) {
                return view('home.vote', [
                    'pemilih' => $pemilih,
                    'kandidat' => Kandidat::where('periode', date('Y'))->get()
                ]);
            } else {
                return redirect()->back()->with('error', 'Anda sudah memberikan suara!');
            }
        } else {
            return redirect()->back()->with('error', 'Anda tidak berhak memberikan suara!');
        }
    }

    public function vote(Request $request, Pemilih $pemilih)
    {
        $dataVote = [
            'pemilih_id' => $pemilih->id,
            'kandidat_id' => $request->kandidat_id,
            'jabatan_id' => $pemilih->jabatan_id,
            'periode' => date('Y')
        ];

        Suara::create($dataVote);

        return redirect()->route('home')->with('success','Terima kasih atas partisipasi anda');
    }

    public function golput(Pemilih $pemilih)
    {
        $dataVote = [
            'pemilih_id' => $pemilih->id,
            'periode' => date('Y')
        ];

        Golput::create($dataVote);

        return redirect()->route('home')->with('error','Maaf waktu anda telah habis');
    }
}
