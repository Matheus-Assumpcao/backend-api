<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/', function () {
    return ['Chegamos até aqui' => 'SIM'];
});

// Route::resource('usuario', 'App\Http\Controllers\UsuarioController');
Route::apiResource('usuario', 'App\Http\Controllers\UsuarioController'); // Não tem o create e o edit
Route::apiResource('usuarioAdmin', 'App\Http\Controllers\UsuarioAdminController');
Route::apiResource('usuarioSuperAdmin', 'App\Http\Controllers\UsuarioSuperAdminController');