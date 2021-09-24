<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RegionController extends Controller
{
    //


    public function index(Request $request)
    {

        return view('regiones.index');
    }
}
