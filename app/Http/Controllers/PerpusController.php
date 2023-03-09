<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfilModel;

class PerpusController extends Controller
{
    private $perpage = 10;
    
    public function home()
    {
        return view('perpus.home', [
            'perpus' => ProfilModel::latest()->paginate($this->perpage)
        ]);
    }
    
    public function show(ProfilModel $profil_perpustakaan)
    {
        return view('perpus.profil', [
            'profil_perpustakaan' => $profil_perpustakaan
        ]);
    }

    public function searchPerpus(Request $request)
    {
        if (!$request->get('keyword')) {
            return redirect()->route('perpus.home');
        }
        return view('perpus.search_perpus', [
            'perpus' => ProfilModel::search($request->keyword)
                ->paginate($this->perpage)
                ->appends(['keyword'=>$request->keyword])
        ]);
    }
}
