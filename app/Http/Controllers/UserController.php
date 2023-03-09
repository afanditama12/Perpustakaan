<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('permission:user_show',['only' => 'index']);
        $this->middleware('permission:user_create',['only' => ['create','store']]);
        $this->middleware('permission:user_update',['only' => ['edit','update']]);
        $this->middleware('permission:user_detail',['only' => 'show']);
        $this->middleware('permission:user_delete',['only' => 'destroy']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = [];
        if ($request->get('keyword')) {
            $users = User::search($request->keyword)->get();
        }else{
            $users = User::all();
        }
        return view('users.index',[
            'users' => $users,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $no = User::latest()->paginate(1);
        return view('users.create', compact('no'));
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
            $request->all(),[
                "name" => "required|string|max:30",
                "role" => "required",
                "email" => "required|email|unique:users,email",
                "password" => "required|min:6|confirmed",
            ],[],
            $this->attributes()
        );

        if ($validator->fails()) {
            $request['role'] = Role::select('id', 'name')->find($request->role);
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        DB::beginTransaction();
        try {
            $user = User::create([
                'id_user' => $request->id_user,
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);
            $user->assignRole($request->role);
            Alert::success(
                trans('user.alert.create.title'),
                trans('user.alert.create.message.success')
            );
            return redirect()->route('users.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error(
                trans('user.alert.create.title'),
                trans('user.alert.create.message.error', ['error' => $th->getMessage()])
            );
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }finally{
            DB::commit();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', [
            'user' => $user,
            'roleSelected' => $user->roles->first()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $validator = Validator::make(
            $request->all(),[
                "role" => "required",
            ],[],
            $this->attributes()
        );

        if ($validator->fails()) {
            $request['role'] = Role::select('id', 'name')->find($request->role);
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }

        DB::beginTransaction();
        try {
            $user->syncRoles($request->role);
            Alert::success(
                trans('user.alert.update.title'),
                trans('user.alert.update.message.success')
            );
            return redirect()->route('users.index');
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error(
                trans('user.alert.update.title'),
                trans('user.alert.update.message.error', ['error' => $th->getMessage()])
            );
            return redirect()->back()->withInput($request->all())->withErrors($validator);
        }finally{
            DB::commit();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        DB::beginTransaction();
        try {
            $user->removeRole($user->roles()->first());
            $user->delete();
            Alert::success(
                trans('user.alert.delete.title'),
                trans('user.alert.delete.message.success')
            );
        } catch (\Throwable $th) {
            DB::rollBack();
            Alert::error(
                trans('user.alert.delete.title'),
                trans('user.alert.delete.message.error', ['error' => $th->getMessage()])
            );
        }finally{
            DB::commit();
            return redirect()->back();
        }
    }

    private function attributes()
    {
        return [
            "name" => trans('user.form_control.input.name.attribute'),
            "role" => trans('user.form_control.select.role.attribute'),
            "email" => trans('user.form_control.input.email.attribute'),
            "password" => trans('user.form_control.input.password.attribute'),
        ];
    }
}
