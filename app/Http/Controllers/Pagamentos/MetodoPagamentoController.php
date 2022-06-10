<?php

namespace App\Http\Controllers\Pagamentos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Pagamentos\MetodoPagamento;

use Carbon\Carbon;

class MetodoPagamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $metodos_pagamento = MetodoPagamento::orderBy('metodo_pagamento', 'ASC')->get();

        return view('app.pagamentos.metodo_pagamento.metodo_pagamento_index',compact('metodos_pagamento'));
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
            'metodo_pagamento' => 'required'
        ], [
            'metodo_pagamento.required' => 'Insira um método de pagamento.'
        ]);

        MetodoPagamento::insert([
            'metodo_pagamento' => $request->metodo_pagamento,
            'created_at' => Carbon::now()
        ]);

        $noti = [
            'message' => 'Método de pagamento inserido com sucesso!',
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
        MetodoPagamento::findOrFail($id)->delete();

        $noti = [
            'message' => 'Método de Pagamento removido com sucesso!',
            'alert-type' => 'error'
        ];

        return redirect()->back()->with($noti);
    }
}
