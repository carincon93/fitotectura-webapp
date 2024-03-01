<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Crypt;

use App\Http\Requests\AdministradorRequest;

use App\User;

class AdministradorController extends Controller
{
    public function __construct()
    {
        $this->middleware('is_admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::where("rol", "=", "administrador")->get();
        return view('dashboard.administrador.index')->with('user', $user);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.administrador.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdministradorRequest $request)
    {
        $user = new User();
        $user->nombre_completo              = $request->nombre_completo;
        $user->email                        = $request->email;
        $user->telefono                     = $request->telefono;
        $user->profesion                    = $request->profesion;
        $user->uso                          = $request->uso;
        $user->nombre_empresa_institucion   = $request->nombre_empresa_institucion;
        $user->rol                          = 'administrador';
        $user->password                     = bcrypt( $request->input('password') );
        if($user->save()) {
            return redirect('admin/administradores/')->with('status', 'El administrador '. $user->nombre_completo. ' fue adicionado con exito!');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return redirect('admin/administradores/');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::findorFail($id);
        return view('dashboard.administrador.edit')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdministradorRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->nombre_completo    = $request->get('nombre_completo');
        $this->validate($request, [
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($user->id),
            ]
        ]);
        $user->rol                          = $request->get('rol');
        $user->email                        = $request->get('email');
        $user->telefono                     = $request->get('telefono');
        $user->profesion                    = $request->get('profesion');
        $user->uso                          = $request->get('uso');
        $user->nombre_empresa_institucion   = $request->get('nombre_empresa_institucion');
        if($user->save() && $request->rol == 'administrador') {
            return redirect('admin/administradores/')->with('status', 'El administrador '. $user->nombre_completo. ' fue modificado con exito!');
        } else {
            return redirect('admin/usuarios/')->with('status', 'El usuario '. $user->nombre_completo. ' fue modificado con exito!');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('admin/administradores/');
    }

    public function mostrarEditarPerfil()
    {
        return view('dashboard.administrador.editar_perfil');
    }
}
