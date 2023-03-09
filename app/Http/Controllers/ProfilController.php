<?php

namespace App\Http\Controllers;

use App\Models\Detail_PerpusModel;
use App\Models\ProfilModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;


class ProfilController extends Controller
{
    private $perpage = 10;
    public function __construct()
    {
        $this->middleware('permission:library_show',['only' => 'index']);
        $this->middleware('permission:library_create',['only' => ['create','store']]);
        $this->middleware('permission:library_update',['only' => ['edit','update']]);
        $this->middleware('permission:library_detail',['only' => 'show']);
        $this->middleware('permission:library_delete',['only' => 'destroy']);
    }
    /**
     * Display a listing of the resource.
     * @param  \App\Models\ProfilModel  $profilModel
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->has('keyword') && trim($request->keyword)) {
            $profiles = ProfilModel::where('nmlembaga', 'like', "%{$request->keyword}%");
        }else{
            $profiles = new ProfilModel;
        }

        
        return view('kelolaPerpustakaan.index', [
            'profiles' => $profiles->paginate($this->perpage)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ProfilModel::latest()->paginate(1);
        return view('kelolaPerpustakaan.create', ['data'=>$data]);
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
                'nmlembaga'     => 'required|unique:profil,nmlembaga',
                'pj'            => 'required',
                'nmpengelola'   => 'required',
                'skp'           => 'required',
                'jambuka'       => 'required',
                'alamat'        => 'required',
                'telepon'       => 'required',
                'deskripsi'     => 'required',
            ],
            [],
            $this->attributes()
        );

        if($validator->fails()){
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        try {
            ProfilModel::create([
                'id_user'           => Auth::user()-> id_user,
                'id_perpus'         => $request->id_perpus,
                'nmlembaga'         => $request-> nmlembaga,
                'nmpenanggungJawab' => $request->pj, 
                'nmpengelola'       => $request->nmpengelola, 
                'alamat'            => $request->alamat, 
                'skpendirian'       => parse_url($request->skp)['path'], 
                'logo'              => parse_url($request->logoinstansi)['path'], 
                'jambuka'           => $request->jambuka,
                'facebook'          => $request->facebook,
                'instagram'         => $request->instagram,
                'telepon'           => $request->telepon,
                'deskripsi'         => $request->deskripsi,
            ]);
            Alert::success(
                trans('kelolaPerpustakaan.alert.create.title'), 
                trans('kelolaPerpustakaan.alert.create.message.success'));
            return redirect()->route('listperpustakaan.index');
        } catch (\Throwable $th) {
            Alert::error(
                trans('kelolaPerpustakaan.alert.create.title'), 
                trans('kelolaPerpustakaan.alert.create.message.error', ['error' => $th->getMessage()])
            );
            return redirect()->back()->withInput($request->all());
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\ProfilModel  $profilModel
     * @return \Illuminate\Http\Response
     */
    public function show(ProfilModel $profilModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ProfilModel  $profilModel
     * @return \Illuminate\Http\Response
     */
    public function edit(ProfilModel $listperpustakaan)
    {
        if (Auth::user()->roles->first()->name != 'SuperAdmin') {
            if ($listperpustakaan->id_user != Auth::user()->id_user) {
                Alert::warning(
                    trans('kelolaPerpustakaan.alert.update.title'),
                    trans('kelolaPerpustakaan.alert.update.message.warning', ['name' => $listperpustakaan->nmlembaga])
                );
            return redirect()->route('listperpustakaan.index');
            }
        }
        // $data = ProfilModel::where('id', $profile)->get();
        return view('kelolaPerpustakaan.edit', compact('listperpustakaan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ProfilModel  $profilModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProfilModel $listperpustakaan)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'nmlembaga'     => 'required|unique:profil,nmlembaga,' . $listperpustakaan->id,
                'pj'            => 'required',
                'nmpengelola'   => 'required',
                'skp'           => 'required',
                'jambuka'       => 'required',
                'alamat'        => 'required',
                'telepon'       => 'required',
                'deskripsi'     => 'required',
            ],
            [],
            $this->attributes()
        );

        if($validator->fails()){
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }
        try {
            $listperpustakaan->update([
                'nmlembaga'         => $request-> nmlembaga,
                'nmpenanggungJawab' => $request->pj, 
                'nmpengelola'       => $request->nmpengelola, 
                'alamat'            => $request->alamat, 
                'skpendirian'       => parse_url($request->skp)['path'], 
                'logo'              => parse_url($request->logoinstansi)['path'], 
                'jambuka'           => $request->jambuka,
                'facebook'          => $request->facebook,
                'instagram'         => $request->instagram,
                'telepon'           => $request->telepon,
                'deskripsi'         => $request->deskripsi
            ]);
            Alert::success(
                trans('kelolaPerpustakaan.alert.update.title'), 
                trans('kelolaPerpustakaan.alert.update.message.success'));
            return redirect()->route('listperpustakaan.index');
        } catch (\Throwable $th) {
            Alert::error(
                trans('kelolaPerpustakaan.alert.update.title'), 
                trans('kelolaPerpustakaan.alert.update.message.error', ['error' => $th->getMessage()])
            );
            return redirect()->back()->withInput($request->all());
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ProfilModel  $profilModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProfilModel $listperpustakaan)
    {
        if (Auth::user()->roles->first()->name != 'SuperAdmin') {
            if ($listperpustakaan->id_user != Auth::user()->id_user) {
                Alert::warning(
                    trans('kelolaPerpustakaan.alert.delete.title'),
                    trans('kelolaPerpustakaan.alert.delete.message.warning', ['name' => $listperpustakaan->nmlembaga])
                );
            return redirect()->route('listperpustakaan.index');
            }
        }
        $detailperpus = new Detail_PerpusModel;
        try {
            $listperpustakaan->delete();
            $detailperpus->where('id_perpus', $listperpustakaan->id_perpus)->delete();
            Alert::success(
                trans('kelolaPerpustakaan.alert.delete.title'), 
                trans('kelolaPerpustakaan.alert.delete.message.success'));
        } catch (\Throwable $th) {
            Alert::error(
                trans('kelolaPerpustakaan.alert.delete.title'), 
                trans('kelolaPerpustakaan.alert.delete.message.error', ['error' => $th->getMessage()])
            );
        }
        return redirect()->back();
    }

    private function attributes()
    {
        return [
            'nmlembaga'     => trans('kelolaPerpustakaan.form_control.input.nmlembaga.attribute'),
            'pj'            => trans('kelolaPerpustakaan.form_control.input.pj.attribute'),
            'nmpengelola'   => trans('kelolaPerpustakaan.form_control.input.pengelola.attribute'),
            'skp'           => trans('kelolaPerpustakaan.form_control.input.skp.attribute'),
            'jambuka'       => trans('kelolaPerpustakaan.form_control.input.jambuka.attribute'),
            'alamat'        => trans('kelolaPerpustakaan.form_control.input.alamat.attribute'),
            'telepon'       => trans('kelolaPerpustakaan.form_control.input.telepon.attribute'),
            'deskripsi'     => trans('kelolaPerpustakaan.form_control.input.deskripsi.attribute'),
        ];
    }
}
