<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SOTController extends Controller
{

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

    /**
     * Obtener los equipos
     */
    public function obtenerEquipos(Request $request)
    {

        $codEmpresa = 1;
        $codEmpresaDuenio = $request->query("COD_EMPRESA_DUENIO");

        $usa_medidor = $request->query("USA_MEDIDOR");
        $codUsuario = $_SESSION["COD_USUARIO"] ?? null;
        $codPerfil = 1;

        $buscar = $request->query("TXTBUSCAR");
        $criterio = $request->query("CRITERIO");
        $nivel = $_SESSION["MNIVEL"] ?? 0;
        $codAreaSelecc = $request->query("COD_AREA", 0);
        $codGrupo = $request->query("COD_GRUPO");
        $codSubgrupo = $request->query("COD_SUBGRUPO");
        $codEquipo = $request->query("COD_EQUIPO", 0);

        $controlCombustible = $request->query("CONTROL_COMBUSTIBLE","%");
        $conCotizacion = $request->query("CON_COTIZACION", "N");
        $filaDesde = $request->query("FILA_DESDE");
        $filaHasta = $request->query("FILA_HASTA");
        $codCtaContable = $request->query("COD_CTA_CONTABLE", 0);
        $codSubctaContable = $request->query("COD_SUBCTA_CONTABLE", 0);


        $equipos = DB::select(
            'EXEC PSO_EQUIPO_LISTADO ?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?',
            [
                $codEmpresa,
                $codEmpresaDuenio,
                $usa_medidor,
                $codUsuario,
                $codPerfil,
                $buscar,
                $criterio,
                $nivel,
                $codAreaSelecc,
                $codGrupo,
                $codSubgrupo,
                $codEquipo,
                $controlCombustible,
                $conCotizacion,
                $filaDesde,
                $filaHasta,
                $codCtaContable,
                $codSubctaContable
            ]
        );


        return response()->json($equipos);
    }


    /**
     * Obtener las Solicitudes
     */
    public function obtenerSolicitudes(Request $request)
    {
        $codEmpresa = 1;
        $codArea = $request->query("COD_AREA", 0);
        $codGrupo = $request->query("COD_GRUPO", 0);
        $codSubgrupo = $request->query("COD_SUBGRUPO", 0);

        $codEquipo = $request->query("COD_EQUIPO", 0);

        $estado = $request->query("ESTADO");
        $solicitante = $request->query("COD_SOLICITANTE");
        $desde = $request->query("DESDE");
        $hasta = $request->query("HASTA");

        $ordenarPor = $request->query("ORDENAR_POR");
        $codUsuario = $request->query("COD_USUARIO");

        if ($desde == "") {
            $desde = null;
        } else {
            $desde = trim($desde) . " 00:00:00"; //$oMdl->fpRetornaFechaFormateada($desde, " 00:00:00");
        }

        if ($hasta == "") {
            $hasta = null;
        } else {
            $hasta = trim($hasta) . " 23:59:59"; // $oMdl->fpRetornaFechaFormateada($hasta, " 23:59:59");
        }

        $op = $request->query("OP");
        $usuario = $_SESSION["USUARIO"];

        $equipos = DB::select(
            'EXEC PSO_SOT_LISTADO ?,?,?,?,?,?,?,?,?,?,?,?,?',
            [
                $codEmpresa,
                $codArea,
                $codGrupo,
                $codSubgrupo,
                $codEquipo,
                $estado,
                $solicitante,
                $desde,
                $hasta,
                $ordenarPor,
                $codUsuario,
                $op,
                $usuario,
            ]
        );


        return response()->json($equipos);
    }
}
