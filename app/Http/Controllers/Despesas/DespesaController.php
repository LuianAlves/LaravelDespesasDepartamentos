<?php

namespace App\Http\Controllers\Despesas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Despesas\Despesa;
use App\Models\Despesas\CategoriaDespesa;
use App\Models\Despesas\SubCategoriaDespesa;
use App\Models\Despesas\DespesaInfo;
use App\Models\Pagamentos\MetodoPagamento;
use App\Models\Departamentos\Departamento;

use Carbon\Carbon;

class DespesaController extends Controller
{
    public function index()
    {
        $departamentos = Departamento::orderBy('departamento', 'ASC')->get();
        $categorias = CategoriaDespesa::orderBy('categoria_despesa', 'ASC')->get();
        $sub_categorias = SubCategoriaDespesa::orderBy('sub_categoria_despesa', 'ASC')->get();
        $metodos_pagamento = MetodoPagamento::orderBy('metodo_pagamento')->get();
        $despesas = Despesa::orderBy('categoria_despesa_id', 'ASC')->get();

        $soma_despesas = Despesa::where('tipo_gasto', 'Despesa')->orWhere('tipo_gasto', 'Despesa/Meta')->sum('valor_despesa');
        $soma_metas = Despesa::where('tipo_gasto', 'Meta')->orWhere('tipo_gasto', 'Despesa/Meta')->sum('valor_despesa');

        return view('app.despesas.despesa.despesa_index', compact('departamentos', 'categorias', 'metodos_pagamento', 'despesas', 'sub_categorias', 'soma_despesas', 'soma_metas'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'departamento_id' => 'required',
            'categoria_despesa_id' => 'required',
            'sub_categoria_despesa_id' => 'required',
            'metodo_pagamento_id' => 'required',
            'tipo_gasto' => 'required',
            'despesa' => 'required',
            'valor_despesa' => 'required',
        ], [
            'departamento_id.required' => 'Selecione um Departamento para essa despesa.',
            'categoria_despesa_id.required' => 'Selecione uma categoria para essa despesa.',
            'sub_categoria_despesa_id.required' => 'Selecione uma sub categoria para essa despesa.',
            'metodo_pagamento_id.required' => 'Selecione um método de pagamento para essa despesa.',
            'tipo_gasto.required' => 'Selecione um tipo de gasto.',
            'despesa.required' => 'Insira um nome para essa despesa.',
            'valor_despesa.required' => 'Insira um valor para essa despesa.',
        ]);

        $valor_despesa = str_replace(',', '.', $request->valor_despesa);

        switch ($request->tipo_gasto) {
            case 1:
                $gasto = 'Despesa';
                break;

            case 2:
                $gasto = 'Meta';
                break;

            case 3:
                $gasto = 'Despesa/Meta';
                break;
        }

        $despesa = Despesa::create([
            'departamento_id' => $request->departamento_id,
            'categoria_despesa_id' => $request->categoria_despesa_id,
            'sub_categoria_despesa_id' => $request->sub_categoria_despesa_id,
            'metodo_pagamento_id' => $request->metodo_pagamento_id,

            'tipo_gasto' => $gasto,

            'despesa' => $request->despesa,
            'valor_despesa' => $valor_despesa,
            'descricao_despesa' => $request->descricao_despesa,
            'data_despesa' => $request->data_despesa,
            'dia_despesa' => Carbon::parse($request->data_despesa)->format('d'),
            'mes_despesa' => Carbon::parse($request->data_despesa)->format('m'),
            'ano_despesa' => Carbon::parse($request->data_despesa)->format('Y'),

            'check_data_despesa' =>  Carbon::now()->format('Y'),

            'created_at' => Carbon::now()
        ]);

        $depart = Departamento::findOrFail($request->departamento_id);
        $cat = CategoriaDespesa::findOrFail($request->categoria_despesa_id);

        DespesaInfo::create([
            'despesa_id' => $despesa->id,
            'categoria_despesa_id' => $request->categoria_despesa_id,
            'categoria_despesa' => $cat->categoria_despesa,
            'departamento_id' => $request->departamento_id,
            'departamento' => $depart->departamento,
            'tipo_gasto' => $gasto,
            'valor_despesa' => $valor_despesa,
            'check_data_despesa' => Carbon::now()->format('Y'),
            'created_at' => Carbon::now()
        ]);


        $noti = [
            'message' => 'Despesa inserida com sucesso!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($noti);
    }

    public function show() {
        //
    }

    public function edit($id)
    {
        $despesa = Despesa::findOrFail($id);

        $departamentos = Departamento::get();
        $categorias = CategoriaDespesa::get();
        $sub_categorias = SubCategoriaDespesa::get();
        $metodos_pagamento = MetodoPagamento::orderBy('metodo_pagamento')->get();


        return view('app.despesas.despesa.despesa_edit', compact(
            'despesa', 
            'departamentos',
            'categorias',
            'sub_categorias',
            'metodos_pagamento'
        ));
    }

    public function update(Request $request)
    {
        $request->validate([
            'departamento_id' => 'required',
            'categoria_despesa_id' => 'required',
            'sub_categoria_despesa_id' => 'required',
            'metodo_pagamento_id' => 'required',
            'tipo_gasto' => 'required',
            'despesa' => 'required',
            'valor_despesa' => 'required',
        ], [
            'departamento_id.required' => 'Selecione um Departamento para essa despesa.',
            'categoria_despesa_id.required' => 'Selecione uma categoria para essa despesa.',
            'sub_categoria_despesa_id.required' => 'Selecione uma sub categoria para essa despesa.',
            'metodo_pagamento_id.required' => 'Selecione um método de pagamento para essa despesa.',
            'tipo_gasto.required' => 'Selecione um tipo de gasto.',
            'despesa.required' => 'Insira um nome para essa despesa.',
            'valor_despesa.required' => 'Insira um valor para essa despesa.',
        ]);

        $valor_despesa = str_replace(',', '.', $request->valor_despesa);

        $despesa = Despesa::findOrFail($request->despesa_id)->update([
            'departamento_id' => $request->departamento_id,
            'categoria_despesa_id' => $request->categoria_despesa_id,
            'sub_categoria_despesa_id' => $request->sub_categoria_despesa_id,
            'metodo_pagamento_id' => $request->metodo_pagamento_id,

            'tipo_gasto' => $request->tipo_gasto,

            'despesa' => $request->despesa,
            'valor_despesa' => $valor_despesa,
            'descricao_despesa' => $request->descricao_despesa,
            'data_despesa' => $request->data_despesa,
            'dia_despesa' => Carbon::parse($request->data_despesa)->format('d'),
            'mes_despesa' => Carbon::parse($request->data_despesa)->format('m'),
            'ano_despesa' => Carbon::parse($request->data_despesa)->format('Y'),

            'updated_at' => Carbon::now()
        ]);

        $depart = Departamento::findOrFail($request->departamento_id);
        $cat = CategoriaDespesa::findOrFail($request->categoria_despesa_id);

        DespesaInfo::where('despesa_id', $request->despesa_id)->update([
            'despesa_id' => $request->despesa_id,
            'categoria_despesa_id' => $request->categoria_despesa_id,
            'categoria_despesa' => $cat->categoria_despesa,
            'departamento_id' => $request->departamento_id,
            'departamento' => $depart->departamento,
            'tipo_gasto' => $request->tipo_gasto,
            'valor_despesa' => $valor_despesa,

            'updated_at' => Carbon::now()
        ]);

        $noti = [
            'message' => 'Despesa atualizada com sucesso!',
            'alert-type' => 'info'
        ];

        return redirect()->route('despesa.index')->with($noti);
    }

    public function destroy($id)
    {
        $despesa = Despesa::findOrFail($id);

        DespesaInfo::where('despesa_id', $despesa->id)->delete();

        $despesa->delete();

        $noti = [
            'message' => 'Despesa removida com sucesso!',
            'alert-type' => 'error'
        ];

        return redirect()->back()->with($noti);
    }
}
