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
        $despesas = Despesa::where('check_data_despesa', date('Y'))->get();
        $soma_despesas = Despesa::where('tipo_gasto', 'Despesa')->orWhere('tipo_gasto', 'Despesa/Meta')->where('check_data_despesa', $data)->sum('valor_despesa');
        $soma_metas = DespesaInfo::where('tipo_gasto', 'Meta')->orWhere('tipo_gasto', 'Despesa/Meta')->where('check_data_despesa', $data+1)->sum('valor_despesa');

        $despesa_deps = DB::table('despesa_infos')
            ->select(DB::raw('departamento as departamento'), DB::raw('sum(valor_despesa) as valor_despesa'))
            ->groupBy(DB::raw('departamento'))
            ->get();

        $despesa_cats = DB::table('despesa_infos')
            ->select(DB::raw('categoria_despesa as categoria_despesa'), DB::raw('sum(valor_despesa) as valor_despesa'))
            ->groupBy(DB::raw('categoria_despesa'))
            ->get();

        $tipo_gasto = DB::table('despesas')
            ->select(DB::raw('tipo_gasto as tipo_gasto'), DB::raw('count(*) as number'))
            ->where('check_data_despesa', date('Y'))
            ->groupBy(DB::raw('tipo_gasto'))
            ->get();

        $array1 = [];
        $array2 = [];
        $array3 = [];

        foreach($despesa_deps as $despesa) {
            $array1['nome_departamento'][] = $despesa->departamento;
            $array1['valor_despesa'][]  = $despesa->valor_despesa;
        }

        foreach($despesa_cats as $despesa) {
            $array2['categoria_despesa'][] = $despesa->categoria_despesa;
            $array2['valor_despesa'][]  = $despesa->valor_despesa;
        }

        foreach($tipo_gasto as $despesa) {
            $array3['tipo_gasto'][] = $despesa->tipo_gasto;
            $array3['number'][]  = $despesa->number;
        }

        $array['data'] = json_encode(array($array1, $array2, $array3));
        

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
}
