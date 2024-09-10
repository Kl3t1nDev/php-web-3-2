<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\OrcamentoController;

Route::resource('clientes', ClienteController::class);
Route::resource('orcamentos', OrcamentoController::class);

Route::get('/', function () {
    return view('welcome');
});
