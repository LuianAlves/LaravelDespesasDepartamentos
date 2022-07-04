<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Despesas\Despesa;
use App\Models\Departamentos\Departamento;
use App\Models\Despesas\CategoriaDespesa;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DespesaExport;

use DB;

class DashboardController extends Controller
{
    public function index() {
        $departamentos = Departamento::get();     
        
        $soma_despesas = Despesa::where('tipo_gasto', 1)->orWhere('tipo_gasto', 3)->sum('valor_despesa');
        $soma_metas = Despesa::where('tipo_gasto', 2)->orWhere('tipo_gasto', 3)->sum('valor_despesa');

        $data = DB::table('despesas')
        ->select(
            DB::raw('tipo_gasto as tipo_gasto'),
            DB::raw('count(*) as number')
        )
        ->groupBy('tipo_gasto')
        ->get();

        $array[] = ['Gasto', 'Number'];

        foreach($data as $key => $value) {
            $array[++$key] = [$value->tipo_gasto, $value->number];
        }
        
        return view('app.dashboard', compact(
            'departamentos',
            'soma_despesas',
            'soma_metas'
        ))->with('tipo_gasto', json_encode($array));
    }

    public function exportDespesas() {
        $data_atual = date('d_m_Y');

        // echo($data_atual);
        return Excel::download(new DespesaExport, 'planilha_orçamento_'.$data_atual.'.xlsx');
    }
}
