<?php

namespace App\Http\Controllers;

use App\Models\Suara;
use App\Models\Golput;
use App\Models\Jabatan;
use App\Models\Pemilih;
use App\Models\Kandidat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.dashboard',[
            'jum_pemilih' => Pemilih::Where('status','Y')->count(),
            'jum_suara' => Suara::where('periode',date('Y'))->count(),
            'jum_kandidat' => Kandidat::where('periode',date('Y'))->count(),
            'jum_jabatan' => Jabatan::count(),
            'dataSection' => Pemilih::select('section AS name', DB::raw('COUNT(*) AS y'))->groupBy('section')->get(),
            'dataPemilih' => Jabatan::select('nama_jabatan AS name')->withCount('pemilih AS y')->get(),
            'dataPersentase' => Jabatan::select('nama_jabatan AS name','persentase AS y')->get()
        ]);
    }

    public function perolehan()
    {
        if(request('periode')){
            $periode = request('periode');
        } else {
            $periode = date('Y');
        }

        $semuaSuara = Jabatan::select('id','persentase')->withCount('suara AS total')->get();

        $kandidat = kandidat::where('periode', $periode)->get();
        $dataSuara = $kandidat->map(function ($item) use ($semuaSuara, $periode) {
            $total_suara = 0;
            $suaraKandidat = Suara::where('kandidat_id', $item['id'])->where('periode', $periode)->select('jabatan_id', DB::raw('COUNT(*) AS jumlah'))->groupBy('jabatan_id')->get();

            foreach ($suaraKandidat as $value) {
                foreach ($semuaSuara as $data) {
                    if ($value->jabatan_id == $data->id) {
                        $hasil = ($value->jumlah/$data->total) * $data->persentase;
                        $total_suara += $hasil;
                    }
                }
            }
            return [
              'name' => $item['nama_kandidat'],
              'y' => $total_suara
            ];
          })->toArray();

        return view('admin.perolehan', [
            'periode' => Kandidat::select('periode')->orderBy('periode', 'asc')->distinct()->get(),
            'dataSuara' => $dataSuara
        ]);
    }

    public function hapus(Request $request)
    {
        Suara::where('periode', $request->periode)->delete();
        Golput::where('periode', $request->periode)->delete();

        return redirect()->route('perolehan',['periode' => $request->periode])->with('warning', 'Data Suara berhasil dihapus!');
    }
}
