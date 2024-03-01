<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

use App\Http\Requests\UserRequest;
use App\Http\Requests\PasswordRequest;

use App\User;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $user = User::where('rol', '=', 'cliente')->get();
        return view('dashboard.usuarios.index')->with('user', $user);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        return view('dashboard.usuarios.create');
    }

    /**
    * Store a newly created resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @return \Illuminate\Http\Response
    */
    public function store(UserRequest $request)
    {
        $user = new User();
        $user->nombre_completo              = $request->nombre_completo;
        $user->email                        = $request->email;
        $user->telefono                     = $request->telefono;
        $user->profesion                    = $request->profesion;
        $user->uso                          = $request->uso;
        $user->nombre_empresa_institucion   = $request->nombre_empresa_institucion;
        $user->rol                          = 'cliente';
        $user->password              = bcrypt( $request->input('password') );
        if($user->save()) {
            return redirect('admin/usuarios/')->with('status', 'El usuario '. $user->nombre_completo. ' fue adicionado con éxito!');
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
        return redirect('admin/usuarios/');
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
        return view('dashboard.usuarios.edit')->with('user', $user);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param  \Illuminate\Http\Request  $request
    * @param  int  $id
    * @return \Illuminate\Http\Response
    */
    public function update(UserRequest $request, $id)
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

        $user->email  = $request->get('email');
        $user->rol  = $request->get('rol');
        $user->telefono                     = $request->get('telefono');
        $user->profesion                    = $request->get('profesion');
        $user->uso                          = $request->get('uso');
        $user->nombre_empresa_institucion   = $request->get('nombre_empresa_institucion');
        if($request->get('password')) {
            $user->password           = bcrypt( $request->input('password') );
        }

        if($user->save() && $request->rol == 'administrador') {
            return redirect('admin/administradores/')->with('status', 'El administrador '. $user->nombre_completo. ' fue modificado con éxito!');
        } else {
            return redirect('admin/usuarios/')->with('status', 'El usuario '. $user->nombre_completo. ' fue modificado con éxito!');
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
        return redirect('admin/usuarios/')->with('status', 'El usuario fue eliminador con éxito!');
    }


    public function modificar_perfil(UserRequest $request, $id)
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

        $user->email                        = $request->get('email');
        $user->telefono                     = $request->get('telefono');
        $user->profesion                    = $request->get('profesion');
        $user->uso                          = $request->get('uso');
        $user->nombre_empresa_institucion   = $request->get('nombre_empresa_institucion');
        if($request->get('password')) {
            $user->password           = bcrypt( $request->input('password') );
        }
        if($user->save()) {
            return back()->with('status', ' '. $user->nombre_completo. ' sus datos fueron actualizados con éxito!');
        }
    }

    // public function cambiar_contrasena(PasswordRequest $request){
        // $user_auth = Auth::user();
        // if (Hash::check($request->mypassword, $user_auth->password)){
        //     $user = new User();
        //     $user->where('email', '=', $user_auth->email)
        //          ->update(['password' => bcrypt($request->password)]);
        //     return redirect('admin/dashboard')->with('status', 'Contraseña cambiada con éxito!');
        // } else {
        //     return 'las codasdsa';
        // }
    // }

    public function cambiar_contrasena(PasswordRequest $request)
    {
        // $this->validate($request, [
        //     'old' => 'required',
        //     'password' => 'required|min:6|confirmed',
        // ]);

        $user = User::findOrFail(Auth::id());
        $hashedPassword = $user->password;

        if (Hash::check($request->old, $hashedPassword)) {
            //Change the password
            $user->fill([
                'password' => Hash::make($request->password)
            ])->save();

            $request->session()->flash('success', 'Tu contraseña ha sido cambiada.');

            return back();
        }

        $request->session()->flash('failure', 'Tu contraseña no ha sido cambiada.');

        return back();
    }

}
