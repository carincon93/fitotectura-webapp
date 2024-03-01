<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaginaPrincipalController extends Controller
{
    public function politicas()
    {
        return view('politicas.politica');
    }
}
