<?php

namespace App\Http\Controllers;

use App\Models\ProfilModel;
use App\Models\Detail_PerpusModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Arr;


class DetailPerpusController extends Controller
{

    private $perpage = 10;

    public function __construct()
    {
        $this->middleware('permission:data_show',['only' => 'index']);
        $this->middleware('permission:data_create',['only' => ['create','store']]);
        $this->middleware('permission:data_update',['only' => ['edit','update']]);
        $this->middleware('permission:data_detail',['only' => 'show']);
        $this->middleware('permission:data_delete',['only' => 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *  
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $profiles = [];
        $data = [];
        $filter = [];
        if ($request->has('filter') && trim($request->filter)) {
            $filter = ProfilModel::select('id', 'nmlembaga')->find($request->filter);
            $data = ProfilModel::select('id_perpus')->find($request->filter);
            $profiles = Detail_PerpusModel::where('id_perpus', $data->id_perpus);
        }else{
            $profiles = new Detail_PerpusModel;
        }
        return view('detailPerpustakaan.index',[
            'detail_perpus' => $profiles->paginate($this->perpage),
            'filter' => $filter
        ]);
    }

    public function select(Request $request)
    {
        $perpustakaan = [];
        if (Auth::user()->roles->first()->name == 'SuperAdmin') {
            if ($request->has('q')) {
                $search = $request->q;
                $perpustakaan = ProfilModel::select('id', 'nmlembaga')
                ->where('nmlembaga', 'LIKE', "%$search%")->limit(6)->get();
            } else {
                $perpustakaan = ProfilModel::select('id', 'nmlembaga')->limit(6)->get();
            }
        } else {
            if ($request->has('q')) {
                $search = $request->q;
                $perpustakaan = ProfilModel::select('id', 'nmlembaga')
                ->where('nmlembaga', 'LIKE', "%$search%")->where('id_user', Auth::user()->id_user)->limit(6)->get();
            } else {
                $perpustakaan = ProfilModel::select('id', 'nmlembaga')->where('id_user', Auth::user()->id_user)->limit(6)->get();
            }
        }
        
        return response()->json($perpustakaan);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = Detail_PerpusModel::latest();
        return view('detailPerpustakaan.create', compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
            $validator = Validator::make(
                $request->all(),
                [
                    'pengunjung' => 'required',
                    'member' => 'required',
                    'peminjam' => 'required',
                    'judul' => 'required',
                    'eksemplar' => 'required',
                    'id_perpus' => 'required',
                    'tahun' => 'required'
                ],[],
                $this->attributes()
            );

            if($validator->fails()){
                $request['id_perpus'] = ProfilModel::select('id', 'nmlembaga')->find($request->id_perpus);
                return redirect()->back()->withInput($request->all())->withErrors($validator);
            }
            
            try {
                $perpus = ProfilModel::select('id_perpus')->find($request->id_perpus);
                Detail_PerpusModel::create([
                    'id_user'           => Auth::user()->id_user,
                    'id_perpus'         => $perpus->id_perpus,
                    'pengunjung'        => $request->pengunjung,
                    'member'            => $request->member, 
                    'peminjaman'        => $request->peminjam, 
                    'judul'             => $request->judul, 
                    'eksemplar'         => $request->eksemplar, 
                    'tahun'             => $request->tahun, 
                ]);
                Alert::success(
                    trans('detailPerpustakaan.alert.create.title'), 
                    trans('detailPerpustakaan.alert.create.message.success'));
                return redirect()->route('detail-perpustakaan.index');
            } catch (\Throwable $th) {
                Alert::error(
                    trans('detailPerpustakaan.alert.create.title'), 
                    trans('detailPerpustakaan.alert.create.message.error', ['error' => $th->getMessage()])
                );
                return redirect()->back()->withInput($request->all());
            }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Detail_PerpusModel  $detail_PerpusModel
     * @return \Illuminate\Http\Response
     */
    public function show(Detail_PerpusModel $detail_perpustakaan)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Detail_PerpusModel  $detail_PerpusModel
     * @return \Illuminate\Http\Response
     */
    public function edit(Detail_PerpusModel $detail_perpustakaan)
    {
        if (Auth::user()->roles->first()->name != 'SuperAdmin') {
            if ($detail_perpustakaan->id_user != Auth::user()->id_user) {
                Alert::warning(
                    trans('detailPerpustakaan.alert.update.title'),
                    trans('detailPerpustakaan.alert.update.message.warning', ['name' => $detail_perpustakaan->profil->nmlembaga])
                );
            return redirect()->route('detail-perpustakaan.index');
            }
        }
        $data = ProfilModel::where('id_perpus', $detail_perpustakaan->id_perpus)->get();
        return view('detailPerpustakaan.edit', [
            'detail_perpustakaan' => $detail_perpustakaan,
            'data' => $data
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Detail_PerpusModel  $detail_PerpusModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Detail_PerpusModel $detail_perpustakaan)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'pengunjung' => 'required',
                'member' => 'required',
                'peminjam' => 'required',
                'judul' => 'required',
                'eksemplar' => 'required',
                'id_perpus' => 'required',
                'tahun' => 'required'
            ],[],
            $this->attributes()
        );

        if($validator->fails()){
            $request['id_perpus'] = ProfilModel::select('id', 'nmlembaga')->find($request->id_perpus);
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        
        try {
            $perpus = ProfilModel::select('id_perpus')->find($request->id_perpus);
            $detail_perpustakaan->update([
                'id_user'           => Auth::user()->id_user,
                'id_perpus'         => $perpus->id_perpus,
                'pengunjung'        => $request->pengunjung,
                'member'            => $request->member, 
                'peminjaman'        => $request->peminjam, 
                'judul'             => $request->judul, 
                'eksemplar'         => $request->eksemplar, 
                'tahun'             => $request->tahun, 
            ]);
            Alert::success(
                trans('detailPerpustakaan.alert.update.title'), 
                trans('detailPerpustakaan.alert.update.message.success'));
            return redirect()->route('detail-perpustakaan.index');
        } catch (\Throwable $th) {
            Alert::error(
                trans('detailPerpustakaan.alert.update.title'), 
                trans('detailPerpustakaan.alert.update.message.error', ['error' => $th->getMessage()])
            );
            return redirect()->back()->withInput($request->all());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Detail_PerpusModel  $detail_PerpusModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Detail_PerpusModel $detail_perpustakaan)
    {
        if (Auth::user()->roles->first()->name != 'SuperAdmin') {
            if ($detail_perpustakaan->id_user != Auth::user()->id_user) {
                Alert::warning(
                    trans('detailPerpustakaan.alert.delete.title'),
                    trans('detailPerpustakaan.alert.delete.message.warning', ['name' => $detail_perpustakaan->profil->nmlembaga])
                );
            return redirect()->route('detail-perpustakaan.index');
            }
        }

        try {
            $detail_perpustakaan->delete();
            Alert::success(
                trans('detailPerpustakaan.alert.delete.title'), 
                trans('detailPerpustakaan.alert.delete.message.success'));
        } catch (\Throwable $th) {
            Alert::error(
                trans('detailPerpustakaan.alert.delete.title'), 
                trans('detailPerpustakaan.alert.delete.message.error', ['error' => $th->getMessage()])
            );
        }
        return redirect()->back();
    }

    private function attributes()
    {
        return [
            'id_perpus'      => trans('detailPerpustakaan.form-input.attribute.library'),
            'pengunjung'     => trans('detailPerpustakaan.form-input.attribute.visitor'),
            'member'         => trans('detailPerpustakaan.form-input.attribute.member'),
            'peminjam'       => trans('detailPerpustakaan.form-input.attribute.borrower'),
            'judul'          => trans('detailPerpustakaan.form-input.attribute.title_book'),
            'eksemplar'      => trans('detailPerpustakaan.form-input.attribute.exemplar'),
            'tahun'          => trans('detailPerpustakaan.form-input.attribute.year'),
        ];
    }

    public function export(Request $request)
    {
        $profiles = [];
        $data = [];
        
        if ($request->has('filter') || $request->has('from_year')) {
            if ($request->has('filter') && trim($request->filter)) {
                $data = ProfilModel::select('id_perpus')->find($request->filter);
                $profiles = Detail_PerpusModel::where('id_perpus', $data->id_perpus);
            }elseif ($request->has('from_year')) {
                $profiles = Detail_PerpusModel::whereBetween('tahun', array($request->from_year, $request->to_year));
            }
            else
            {
                $data = ProfilModel::select('id_perpus')->find($request->filter);
                $profiles = Detail_PerpusModel::where('id_perpus', $data->id_perpus)->whereBetween('tahun',
                array($request->from_year, $request->to_year));
            } 
        } 
        if ($request->filter == "" && $request->from_year == "") {
            $profiles = new Detail_PerpusModel;
        }
        return view('detailPerpustakaan.export',[
            'detail_perpus' => $profiles->paginate($this->perpage),
            
        ]);
    }
}
