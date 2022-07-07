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

        $despesas = DB::table('despesa_infos')
            ->select(DB::raw('departamento as departamento'), DB::raw('categoria_despesa as categoria_despesa'), DB::raw('sum(valor_despesa) as valor_despesa'))
            ->groupBy(DB::raw('departamento'))
            ->groupBy(DB::raw('categoria_despesa'))
            ->get();

        $array = [];

        foreach($despesas as $despesa) {
            $array['nome_departamento'][] = $despesa->departamento;
            $array['categoria_despesa'][] = $despesa->categoria_despesa;
            $array['valor_despesa'][]  = $despesa->valor_despesa;
        }

        $array['data'] = json_encode($array);
        
        return view('app.dashboard', compact(
            'departamentos',
            'despesas',
            'soma_despesas',
            'soma_metas',
        ))->with($array);
    }

    public function exportDespesas() {
        $data_atual = date('d_m_Y');

        // echo($data_atual);
        return Excel::download(new DespesaExport, 'planilha_orçamento_'.$data_atual.'.xlsx');
    }

    public function chart() {
        // $despesas = DespesaInfo::select('departamento', 'valor_despesa')->groupBy('departamento', 'valor_despesa')->get();
        $despesas = DB::table('despesa_infos')
            ->select(DB::raw('departamento as departamento'), DB::raw('sum(valor_despesa) as valor_despesa'))
            ->groupBy(DB::raw('departamento') )
            ->get();

        $array = [];

        foreach($despesas as $despesa) {
            $array['nome_departamento'][] = $despesa->departamento;
            $array['valor_despesa'][]  = $despesa->valor_despesa;
        }

        $array['data'] = json_encode($array);

        return view('app.chart.index', $array);
        // return view('app.chart.index');
    }
}
