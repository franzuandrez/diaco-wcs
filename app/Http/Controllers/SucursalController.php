<?php

namespace App\Http\Controllers;

use App\Sucursal;
use Illuminate\Http\Request;

class SucursalController extends Controller
{
    //


    public function destroy($id)
    {
        $sucursal = Sucursal::findOrFail($id);

        $sucursal->delete();

        return response()->json('', 204);

    }
}
