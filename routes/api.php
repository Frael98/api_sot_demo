<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SOTController;
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\DB;


Route::prefix('v1')->group(
    function () {
        Route::prefix('sot')->group(function () {
            /**
             * Rutas de autenticación
             */
            Route::post('/login', [AuthController::class, 'login']);
            Route::post('/signup', [AuthController::class, 'signUp']);
            Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
            
            /**
             * Rutas GET
             */
            Route::get('/obtener_agrupaciones', [SOTController::class, 'obtenerAgrupaciones'])->middleware('auth:sanctum');
            Route::get('/obtener_equipos', [SOTController::class, 'obtenerEquipos'])->middleware('auth:sanctum');
            Route::get('/obtener_solicitudes', [SOTController::class, 'obtenerSolicitudes'])->middleware('auth:sanctum');


            /**
             * Rutas POST
             */
            
        });
    }
);

/**
 * Endpoint de prueba
 */
Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        return '✅ Conexión exitosa a la base de datos';
    } catch (\Exception $e) {
        return '❌ Error de conexión: ' . $e->getMessage();
    }
});

/* Route::fallback(function () {
    return response()->json([
        'message' => 'Ruta no encontrada.',
    ], 404);
}); */