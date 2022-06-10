<?php

namespace App\Http\Controllers\Despesas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Despesas\Despesa;
use App\Models\Despesas\CategoriaDespesa;
use App\Models\Despesas\SubCategoriaDespesa;
use App\Models\Pagamentos\MetodoPagamento;
use App\Models\Departamentos\Departamento;

use Carbon\Carbon;

class DespesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentos = Departamento::orderBy('departamento', 'ASC')->get();
        $categorias = CategoriaDespesa::orderBy('categoria_despesa', 'ASC')->get();
        $sub_categorias = SubCategoriaDespesa::orderBy('sub_categoria_despesa', 'ASC')->get();
        $metodos_pagamento = MetodoPagamento::orderBy('metodo_pagamento')->get();
        $despesas = Despesa::orderBy('data_despesa', 'DESC')->get();
        $soma_despesas = Despesa::sum('valor_despesa');

        return view('app.despesas.despesa.despesa_index', compact('departamentos', 'categorias', 'metodos_pagamento', 'despesas', 'sub_categorias', 'soma_despesas'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'departamento_id' => 'required',
            'categoria_despesa_id' => 'required',
            'sub_categoria_despesa_id' => 'required',
            'metodo_pagamento_id' => 'required',
            'forma_pagamento' => 'required',
            'despesa' => 'required',
            'valor_despesa' => 'required',
        ], [
            'departamento_id.required' => 'Selecione um Departamento para essa despesa.',
            'categoria_despesa_id.required' => 'Selecione uma categoria para essa despesa.',
            'sub_categoria_despesa_id.required' => 'Selecione uma sub categoria para essa despesa.',
            'metodo_pagamento_id.required' => 'Selecione um método de pagamento para essa despesa.',
            'forma_pagamento.required' => 'Selecione uma forma de pagamento para essa despesa.',
            'despesa.required' => 'Insira um nome para essa despesa.',
            'valor_despesa.required' => 'Insira um valor para essa despesa.',
        ]);

        $valor_despesa = str_replace(',', '.', $request->valor_despesa);

        Despesa::insert([
            'departamento_id' => $request->departamento_id,
            'categoria_despesa_id' => $request->categoria_despesa_id,
            'sub_categoria_despesa_id' => $request->sub_categoria_despesa_id,
            'metodo_pagamento_id' => $request->metodo_pagamento_id,
            'forma_pagamento' => $request->forma_pagamento,
            'despesa' => $request->despesa,
            'valor_despesa' => $valor_despesa,
            'descricao_despesa' => $request->descricao_despesa,
            'data_despesa' => $request->data_despesa,
            'dia_despesa' => Carbon::parse($request->data_despesa)->format('d'),
            'mes_despesa'=> Carbon::parse($request->data_despesa)->format('m'),
            'ano_despesa' => Carbon::parse($request->data_despesa)->format('Y'),
            'created_at' => Carbon::now()
        ]);

        $noti = [
            'message' => 'Despesa inserida com sucesso!',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($noti);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Despesa::findOrFail($id)->delete();

        $noti = [
            'message' => 'Despesa removida com sucesso!',
            'alert-type' => 'error'
        ];

        return redirect()->back()->with($noti);
    }
}