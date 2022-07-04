<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;

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

// Auth
Route::controller(AuthController::class)->group(function() {
    Route::get('/logout', [AuthController::class, 'logout'])->name('auth.logout');
    Route::get('/profile', [AuthController::class, 'profile'])->name('auth.profile-me');
    Route::post('/profile/update', [AuthController::class, 'updateProfile'])->name('auth.profile.update');
    Route::post('/password/update', [AuthController::class, 'updatePassword'])->name('auth.password.update');
});


// ------------------------------------------------------------------

Route::middleware(['auth:sanctum', config('jetstream.auth_session'), 'verified' ])->group(function () {

    Route::post('/departamento/update', [DepartamentoController::class, 'update'])->name('departamento.update');
    Route::resource('/departamento', DepartamentoController::class)->except('create', 'update');

    Route::resource('/despesa', DespesaController::class)->except('create');

    Route::post('/categoria-despesa/update', [CategoriaDespesaController::class, 'update'])->name('categoria-despesa.update'); 
    Route::resource('/categoria-despesa', CategoriaDespesaController::class)->except('create', 'update');

    Route::get('/sub-categoria-despesa/ajax/{categoria_despesa_id}', [SubCategoriaDespesaController::class, 'getCategoria']); // AJAX
    Route::post('/sub-categoria-despesa/update', [SubCategoriaDespesaController::class, 'update'])->name('sub-categoria-despesa.update');
    Route::resource('/sub-categoria-despesa', SubCategoriaDespesaController::class)->except('create', 'update');

    Route::post('/metodo-pagamento/update', [MetodoPagamentoController::class, 'update'])->name('metodo-pagamento.update');
    Route::resource('/metodo-pagamento', MetodoPagamentoController::class)->except('create', 'update');

});


// Exportar arquivo Excel
Route::get('/export/despesas', [DashboardController::class, 'exportDespesas'])->name('export.despesas');
