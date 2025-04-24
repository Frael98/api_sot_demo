<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\SOTController;
use Illuminate\Support\Facades\DB;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('v1')->group(
    function () {
        Route::prefix('sot')->group( function(){
            Route::get('/obtener_agrupaciones', [SOTController::class, 'obtenerAgrupaciones']);
        });
    }
);


Route::get('/test-db', function () {
    try {
        DB::connection()->getPdo();
        return '✅ Conexión exitosa a la base de datos';
    } catch (\Exception $e) {
        return '❌ Error de conexión: ' . $e->getMessage();
    }
});