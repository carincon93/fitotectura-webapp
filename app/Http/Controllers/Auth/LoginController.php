<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    /**
    * Where to redirect users after login.
    *
    * @var string
    */
    // protected $redirectTo = '/home';
    protected function authenticated(Request $request)
    {
        if ( Auth::check() && Auth::user()->rol == 'administrador' )
        {
            // Do your margic here
            return redirect('/admin/dashboard');
        }
        return redirect('/buscar_plantas');
    }
}
