<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SOTController extends Controller
{
    //
    public function index()
    {
        $productos = DB::select('EXEC get_productos()');
        return response()->json($productos);
    }

    /**
     * Obtener las agrupaciones del arbol
     */
    public function obtenerAgrupaciones(Request $request)
    {

        $codEmpresa = 1;
        $codPerfil = 1;
        $filtros = $request->query("LST_FILTROS");
        $formato = $request->query("FORMATO", "");

        $agrupaciones = DB::select('EXEC PSM_LISTA_AGRUPACIONES ?,?,?,?', [$codEmpresa, $codPerfil, $filtros, $formato]);


        return response()->json($agrupaciones);
    }
}
