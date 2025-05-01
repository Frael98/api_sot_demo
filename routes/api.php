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
            Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
            
            Route::get('/obtener_agrupaciones', [SOTController::class, 'obtenerAgrupaciones'])->middleware('auth:sanctum');
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
