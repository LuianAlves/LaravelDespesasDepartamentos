<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Departamentos\DepartamentoController;

use App\Http\Controllers\Despesas\DespesaController;
use App\Http\Controllers\Despesas\CategoriaDespesaController;
use App\Http\Controllers\Despesas\SubCategoriaDespesaController;

use App\Http\Controllers\Pagamentos\MetodoPagamentoController;

// ------------------------------------------------------------------

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});


// ------------------------------------------------------------------


Route::resource('/departamento', DepartamentoController::class)->except('create');

Route::resource('/despesa', DespesaController::class)->except('create');
Route::resource('/categoria-despesa', CategoriaDespesaController::class)->except('create');

Route::resource('/sub-categoria-despesa', SubCategoriaDespesaController::class)->except('create');
Route::get('/sub-categoria-despesa/ajax/{categoria_despesa_id}', [SubCategoriaDespesaController::class, 'getCategoria']);

Route::resource('/metodo-pagamento', MetodoPagamentoController::class)->except('create');

