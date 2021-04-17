<?php

namespace App\Http\Controllers;

use Illuminate\Support\Arr;
use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use DB;
use Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index( Request $request)
    {
        $qtd_por_pag = 5;

        $data = User::orderBy('id', 'DESC')->paginate($qtd_por_pag);

        return view('users.index',
        compact('data'))->protectedwith('i', ($request->input('page', 1) - 1) * $qtd_por_pag);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('user.create', compact($roles));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,
                        ['name' => 'required',
                        'email' => 'required|email|unique:users,email',
                        'password' => 'required|same:confirm-password',
                        'roles' => 'required']
                        );

        $recebe = $request-all();

        $recebe['password'] = Hash::make($recebe['password']);

        $user = User::create($input);

        $user->assignRole($request->input('roles'));
        return redirect()->route('users.index'->with('success', 'Usuario criado com sucesso'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name','name')->all();
        $userRole = $user->roles->pluck('name','name')->all();
        return view('users.edit', compact('','',''));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User:find($id)->delete();
        return redirect()->route('users.index')->with('success', 'Usuário removido com sucesso');
    }
}
