<?php

namespace App\Http\Controllers\Despesas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Despesas\CategoriaDespesa;
use App\Models\Despesas\SubCategoriaDespesa;

use Carbon\Carbon;

class SubCategoriaDespesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = CategoriaDespesa::orderBy('categoria_despesa', 'ASC')->get();
        $sub_categorias = SubCategoriaDespesa::orderBy('sub_categoria_despesa', 'ASC')->get();

        return view('app.despesas.sub_categoria_despesa.sub_categoria_despesa_index', compact('categorias', 'sub_categorias'));
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
            'categoria_despesa_id' => 'required',
            'sub_categoria_despesa' => 'required'
        ], [
            'categoria_despesa_id.required' => 'Selecione uma categoria.',
            'sub_categoria_despesa.required' => 'Insira um nome para essa sub categoria.'
        ]);

        SubCategoriaDespesa::insert([
            'categoria_despesa_id' => $request->categoria_despesa_id,
            'sub_categoria_despesa' => $request->sub_categoria_despesa,
            'created_at' => Carbon::now()
        ]);
        
       

        $noti = [
            'message' => 'Sub Categoria de Despesas inserida com sucesso.',
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
        SubCategoriaDespesa::findOrFail($id)->delete();

        $noti = [
            'message' => 'Sub Categoria removida com sucesso!',
            'alert-type' => 'error'
        ];

        return redirect()->back()->with($noti);
    }

    public function getCategoria($categoria_despesa_id) {
        $sub_categoria = SubCategoriaDespesa::where('categoria_despesa_id', $categoria_despesa_id)->orderBy('sub_categoria_despesa', 'ASC')->get();

        return json_encode($sub_categoria);
    }
}
