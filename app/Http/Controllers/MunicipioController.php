<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MunicipioController extends Controller
{
    //

    public function index(Request $request)
    {

        return view('municipios.index');
    }
}
