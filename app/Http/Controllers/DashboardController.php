<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Despesas\Despesa;
use App\Models\Despesas\DespesaInfo;
use App\Models\Departamentos\Departamento;
use App\Models\Despesas\CategoriaDespesa;

use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DespesaExport;

use DB;

class DashboardController extends Controller
{
    public function index() {
        $data = date('Y');

        $departamentos = Departamento::get();     
        $despesas = Despesa::get();
        $soma_despesas = Despesa::where('tipo_gasto', 'Despesa')->orWhere('tipo_gasto', 'Despesa/Meta')->where('check_data_despesa', $data)->sum('valor_despesa');
        $soma_metas = DespesaInfo::where('tipo_gasto', 'Meta')->orWhere('tipo_gasto', 'Despesa/Meta')->sum('valor_despesa');

        // Despesas
        $data = DB::table('despesa_infos')
        ->select(
            DB::raw('categoria_despesa as categoria_despesa_id'),
            DB::raw('count(*) as number'),
        )
        ->groupBy('categoria_despesa')
        ->get();

        $array[] = ['Despesas', 'Number'];

        foreach($data as $key => $value) {
            $array[++$key] = [$value->categoria_despesa_id, $value->number];
        }
        
        return view('app.dashboard', compact(
            'departamentos',
            'despesas',
            'soma_despesas',
            'soma_metas'
        ))->with('categoria_despesa_id', json_encode($array));
    }

    public function exportDespesas() {
        $data_atual = date('d_m_Y');

        // echo($data_atual);
        return Excel::download(new DespesaExport, 'planilha_orçamento_'.$data_atual.'.xlsx');
    }
}
