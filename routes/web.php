<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Departamentos\DepartamentoController;
use App\Http\Controllers\Despesas\CategoriaDespesaController;
use App\Http\Controllers\Despesas\DespesaController;


// ------------------------------------------------------------------

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('app.dashboard');
    })->name('dashboard');
});


// ------------------------------------------------------------------


Route::resource('/departamento', DepartamentoController::class)->except('create');
Route::resource('/categoria-despesa', CategoriaDespesaController::class)->except('create');
Route::resource('/despesa', DespesaController::class)->except('create');