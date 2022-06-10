<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Despesas\Despesa;
use App\Models\Departamentos\Departamento;
use App\Models\Despesas\CategoriaDespesa;

class DashboardController extends Controller
{
    public function index() {
        $departamentos = Departamento::get();     
        $soma_despesas = Despesa::sum('valor_despesa');

        return view('app.dashboard', compact(
            'departamentos',
            'soma_despesas'
        ));
    }
}
