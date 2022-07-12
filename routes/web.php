<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\Departamentos\DepartamentoController;

use App\Http\Controllers\Despesas\DespesaController;
use App\Http\Controllers\Despesas\CategoriaDespesaController;
use App\Http\Controllers\Despesas\SubCategoriaDespesaController;
use App\Http\Controllers\Despesas\CheckDespesaController;


use App\Http\Controllers\Pagamentos\MetodoPagamentoController;

// ------------------------------------------------------------------

Route::get('/', function () {
    return view('auth.login');
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

    Route::get('/departamento', [DepartamentoController::class, 'index'])->name('departamento.index');
    Route::post('/departamento/store', [DepartamentoController::class, 'store'])->name('departamento.store');
    Route::get('/departamento/editar/{id}', [DepartamentoController::class, 'edit'])->name('departamento.edit');
    Route::post('/departamento/atualizar', [DepartamentoController::class, 'update'])->name('departamento.update');
    Route::get('/departamento/remover/{id}', [DepartamentoController::class, 'destroy'])->name('departamento.destroy');
    // Route::resource('/departamento', DepartamentoController::class)->except('create', 'update');

    Route::get('/despesa', [DespesaController::class, 'index'])->name('despesa.index');
    Route::post('/despesa/store', [DespesaController::class, 'store'])->name('despesa.store');
    Route::get('/despesa/editar/{id}', [DespesaController::class, 'edit'])->name('despesa.edit');
    Route::post('/despesa/atualizar', [DespesaController::class, 'update'])->name('despesa.update');
    Route::get('/despesa/remover/{id}', [DespesaController::class, 'destroy'])->name('despesa.destroy');
    // Route::resource('/despesa', DespesaController::class)->except('create');

    Route::get('/categoria-despesa', [CategoriaDespesaController::class, 'index'])->name('categoria-despesa.index');
    Route::post('/categoria-despesa/store', [CategoriaDespesaController::class, 'store'])->name('categoria-despesa.store');
    Route::get('/categoria-despesa/editar/{id}', [CategoriaDespesaController::class, 'edit'])->name('categoria-despesa.edit');
    Route::post('/categoria-despesa/atualizar', [CategoriaDespesaController::class, 'update'])->name('categoria-despesa.update'); 
    Route::get('/categoria-despesa/remover/{id}', [CategoriaDespesaController::class, 'destroy'])->name('categoria-despesa.destroy');
    // Route::resource('/categoria-despesa', CategoriaDespesaController::class)->except('create', 'update');
 
    Route::get('/sub-categoria-despesa', [SubCategoriaDespesaController::class, 'index'])->name('sub-categoria-despesa.index');
    Route::post('/sub-categoria-despesa/store', [SubCategoriaDespesaController::class, 'store'])->name('sub-categoria-despesa.store');
    Route::get('/sub-categoria-despesa/editar/{id}', [SubCategoriaDespesaController::class, 'edit'])->name('sub-categoria-despesa.edit');
    Route::post('/sub-categoria-despesa/atualizar', [SubCategoriaDespesaController::class, 'update'])->name('sub-categoria-despesa.update');
    Route::get('/sub-categoria-despesa/remover/{id}', [SubCategoriaDespesaController::class, 'destroy'])->name('sub-categoria-despesa.destroy');
    // Route::resource('/sub-categoria-despesa', SubCategoriaDespesaController::class)->except('create', 'update');


    Route::get('/metodo-pagamento', [MetodoPagamentoController::class, 'index'])->name('metodo-pagamento.index');
    Route::post('/metodo-pagamento/store', [MetodoPagamentoController::class, 'store'])->name('metodo-pagamento.store');
    Route::get('/metodo-pagamento/editar/{id}', [MetodoPagamentoController::class, 'edit'])->name('metodo-pagamento.edit');
    Route::post('/metodo-pagamento/atualizar', [MetodoPagamentoController::class, 'update'])->name('metodo-pagamento.update');
    Route::get('/metodo-pagamento/remover/{id}', [MetodoPagamentoController::class, 'destroy'])->name('metodo-pagamento.destroy');
    // Route::resource('/metodo-pagamento', MetodoPagamentoController::class)->except('create', 'update');

});


// Exportar arquivo Excel
Route::get('/export/despesas', [DashboardController::class, 'exportDespesas'])->name('export.despesas');

// Notificações Navbar
Route::get('/check/despesas/{id}', [CheckDespesaController::class, 'check'])->name('check.despesa');
Route::get('/remove/despesas/{id}', [CheckDespesaController::class, 'remove'])->name('remove.despesa');

// Preencher select subcategorias
Route::get('/sub-categoria-despesa/ajax/{categoria_despesa_id}', [SubCategoriaDespesaController::class, 'getCategoria'])->name('sub-cat.ajax'); // AJAX

