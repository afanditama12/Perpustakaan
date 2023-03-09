<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Detail_PerpusModel;
use App\Models\ProfilModel;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $perpustakaan = ProfilModel::count();
        $total_rekap_bulanan = Detail_PerpusModel::count();
        $users = User::count();
        $filter = [];
        if ($request->has('filter') && trim($request->filter)) {
            $filter = ProfilModel::select('id', 'nmlembaga')->find($request->filter);
            $data = ProfilModel::select('id_perpus')->find($request->filter);

            $pengunjung = Detail_PerpusModel::select('pengunjung')->where('id_perpus', $data->id_perpus)
            ->pluck('pengunjung')->toArray();
    
            $member = Detail_PerpusModel::select('member')->where('id_perpus', $data->id_perpus)
            ->pluck('member')->toArray();
    
            $peminjam = Detail_PerpusModel::select('peminjaman')->where('id_perpus', $data->id_perpus)
            ->pluck('peminjaman')->toArray();

            $judul = Detail_PerpusModel::select('judul')->where('id_perpus', $data->id_perpus)
            ->pluck('judul')->toArray();

            $eksemplar = Detail_PerpusModel::select('eksemplar')->where('id_perpus', $data->id_perpus)
            ->pluck('eksemplar')->toArray();

            $jumlah = [array_sum($pengunjung), array_sum($member), array_sum($peminjam), array_sum($judul), array_sum($eksemplar)];
        } else {
            $pengunjung = Detail_PerpusModel::select('pengunjung')->pluck('pengunjung')->toArray();
    
            $member = Detail_PerpusModel::select('member')->pluck('member')->toArray();
    
            $peminjam = Detail_PerpusModel::select('peminjaman')->pluck('peminjaman')->toArray();

            $judul = Detail_PerpusModel::select('judul')->pluck('judul')->toArray();

            $eksemplar = Detail_PerpusModel::select('eksemplar')->pluck('eksemplar')->toArray();

            $jumlah = [array_sum($pengunjung), array_sum($member), array_sum($peminjam), array_sum($judul), array_sum($eksemplar)];

            // $perpus = [];
            // $dataperpus = [];
            // $query1 = Detail_PerpusModel::all();
            // $query2 = Detail_PerpusModel::where('id_perpus',$perpus)->get();
            // foreach($query1 as $qr1){
            //     $perpus[] = $qr1 ->id_perpus;
            // } 
            // foreach ($query2 as $qr2) {
            //     $dataperpus[] = 
            //     [
            //         $qr2->id_perpus =>[
            //             'datapengunjung' => $qr2->pengunjung,
            //             'datamember' => $qr2->member,
            //             'datapeminjaman' => $qr2->peminjaman
            //         ]
            //     ];
            // }
            // // $dataperpus [] = [$datapengunjung,$datamember,$datapeminjaman];
            // dd($dataperpus);
        }


        return view('dashboard.index',[
            'perpustakaan' => $perpustakaan,
            'total_rekap_bulanan' => $total_rekap_bulanan,
            'users' => $users,
            'jumlah' => $jumlah,
            'filter' => $filter
        ]);
    }

    public function select(Request $request)
    {
        $perpustakaan = [];
        if ($request->has('q')) {
            $search = $request->q;
            $perpustakaan = ProfilModel::select('id', 'nmlembaga')
            ->where('nmlembaga', 'LIKE', "%$search%")->limit(6)->get();
        } else {
            $perpustakaan = ProfilModel::select('id', 'nmlembaga')->limit(6)->get();
        }
        return response()->json($perpustakaan);
    }
}
