<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Despesas\Despesa;
use App\Models\Departamentos\Departamento;
use App\Models\Despesas\CategoriaDespesa;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DespesaExport;

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

    public function exportDespesas() {
        $data_atual = date('d_m_Y');

        // echo($data_atual);
        return (new DespesaExport())->download('planilha_orçamento_'.$data_atual.'.xlsx');
    }
}
