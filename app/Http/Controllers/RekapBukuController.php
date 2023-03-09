<?php

namespace App\Http\Controllers;

use App\Models\Rekap_BukuModel;
use App\Models\ProfilModel;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use Laravel\Ui\Presets\React;

class RekapBukuController extends Controller
{
    private $perpage = 10;
    public function __construct()
    {
        $this->middleware('permission:book_show',['only' => 'index']);
        $this->middleware('permission:book_create',['only' => ['create','store']]);
        $this->middleware('permission:book_update',['only' => ['edit','update']]);
        $this->middleware('permission:book_detail',['only' => 'show']);
        $this->middleware('permission:book_delete',['only' => 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $rekapBuku = [];
        $data = [];
        $filter = [];
        if ($request->has('filter') && trim($request->filter)) {
            $filter = ProfilModel::select('id', 'nmlembaga')->find($request->filter);
            $data = ProfilModel::select('id_perpus')->find($request->filter);
            $rekapBuku = Rekap_BukuModel::where('id_perpus', $data->id_perpus);
        }else{
            $rekapBuku = new Rekap_BukuModel;
        }

        return view('rekapBuku.index', [
            'rekapBuku' => $rekapBuku->paginate($this->perpage),
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('rekapBuku.create');
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
                'judul' => 'required',
                'eksemplar' => 'required',
                'tahun' => 'required',
                'id_perpus' => 'required'
            ],[],
            $this->attributes()
        );

        if($validator->fails()){
            $request['id_perpus'] = ProfilModel::select('id', 'nmlembaga')->find($request->id_perpus);
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        
        try {
            $perpus = ProfilModel::select('id_perpus')->find($request->id_perpus);
            Rekap_BukuModel::create([
                'id_perpus'    => $perpus->id_perpus,
                'judul'        => $request->judul,
                'eksemplar'    => $request->eksemplar, 
                'tahun'        => $request->tahun, 
            ]);
            Alert::success(
                trans('rekapBuku.alert.create.title'), 
                trans('rekapBuku.alert.create.message.success'));
            return redirect()->route('rekap-buku.index');
        } catch (\Throwable $th) {
            Alert::error(
                trans('rekapBuku.alert.create.title'), 
                trans('rekapBuku.alert.create.message.error', ['error' => $th->getMessage()])
            );
            return redirect()->back()->withInput($request->all());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Rekap_BukuModel  $rekap_BukuModel
     * @return \Illuminate\Http\Response
     */
    public function show(Rekap_BukuModel $rekap_BukuModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Rekap_BukuModel  $rekap_BukuModel
     * @return \Illuminate\Http\Response
     */
    public function edit(Rekap_BukuModel $rekap_buku)
    {
        return view('rekapBuku.edit', compact('rekap_buku'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Rekap_BukuModel  $rekap_BukuModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Rekap_BukuModel $rekap_buku)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'judul' => 'required',
                'eksemplar' => 'required',
                'tahun' => 'required',
                'id_perpus' => 'required'
            ],[],
            $this->attributes()
        );

        if($validator->fails()){
            $request['id_perpus'] = ProfilModel::select('id', 'nmlembaga')->find($request->id_perpus);
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        
        try {
            $perpus = ProfilModel::select('id_perpus')->find($request->id_perpus);
            $rekap_buku->update([
                'id_perpus'    => $perpus->id_perpus,
                'judul'        => $request->judul,
                'eksemplar'    => $request->eksemplar, 
                'tahun'        => $request->tahun, 
            ]);
            Alert::success(
                trans('rekapBuku.alert.update.title'), 
                trans('rekapBuku.alert.update.message.success'));
            return redirect()->route('rekap-buku.index');
        } catch (\Throwable $th) {
            Alert::error(
                trans('rekapBuku.alert.update.title'), 
                trans('rekapBuku.alert.update.message.error', ['error' => $th->getMessage()])
            );
            return redirect()->back()->withInput($request->all());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Rekap_BukuModel  $rekap_BukuModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Rekap_BukuModel $rekap_buku)
    {
        try {
            $rekap_buku->delete();
            Alert::success(
                trans('rekapBuku.alert.delete.title'), 
                trans('rekapBuku.alert.delete.message.success'));
        } catch (\Throwable $th) {
            Alert::error(
                trans('rekapBuku.alert.delete.title'), 
                trans('rekapBuku.alert.delete.message.error', ['error' => $th->getMessage()])
            );
        }
        return redirect()->back();
    }

    private function attributes()
    {
        return [
            'id_perpus'      => trans('rekapBuku.form-input.attribute.library'),
            'judul'          => trans('rekapBuku.form-input.attribute.title'),
            'eksemplar'      => trans('rekapBuku.form-input.attribute.exemplar'),
            'tahun'          => trans('rekapBuku.form-input.attribute.year')
        ];
    }
}
