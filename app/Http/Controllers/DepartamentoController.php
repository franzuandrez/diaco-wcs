<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DepartamentoController extends Controller
{
    //

    public function index(Request $request)
    {

        return view('departamentos.index');
    }
}
