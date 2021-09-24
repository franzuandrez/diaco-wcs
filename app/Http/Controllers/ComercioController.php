<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ComercioController extends Controller
{
    //


    public function index(Request $request)
    {

        return view('comercios.index');
    }
}
