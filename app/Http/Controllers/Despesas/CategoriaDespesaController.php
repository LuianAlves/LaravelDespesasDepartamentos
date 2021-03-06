<?php

namespace App\Http\Controllers\Despesas;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Despesas\CategoriaDespesa;

use Carbon\Carbon;
use Response;
use Validator;

class CategoriaDespesaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = CategoriaDespesa::orderBy('categoria_despesa', 'ASC')->get();

        return view('app.despesas.categoria_despesa.categoria_despesa_index', compact('categorias'));
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
            'categoria_despesa' => 'required'
        ], [
            'categoria_despesa.required' => 'Insira um nome para essa categoria.'
        ]);

        CategoriaDespesa::insert([
            'categoria_despesa' => $request->categoria_despesa,
            'created_at' => Carbon::now()
        ]);
        
        $noti = [
            'message' => 'Categoria de Despesas inserida com sucesso.',
            'alert-type' => 'success'
        ];

        return redirect()->back()->with($noti);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoria = CategoriaDespesa::findOrFail($id);

        return response()->json([
            'status' => 200,
            'categoria' => $categoria
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'categoria_despesa' => 'required',
            
        ], [     
            'categoria_despesa.required' => 'Insira um nome para a categoria.'
        ]);

        $id = $request->categoria_despesa_id;

        if ($validator->passes()) {

            CategoriaDespesa::findOrFail($id)->update([
                'categoria_despesa' => $request->categoria_despesa,
                'updated_at' => Carbon::now()
            ]);
            
            return Response::json(['success' => '1']);
        }
            
        return Response::json(['errors' => $validator->errors()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        CategoriaDespesa::findOrFail($id)->delete();

        $noti = [
            'message' => 'Categoria de despesa removida com sucesso!',
            'alert-type' => 'error'
        ];

        return redirect()->back()->with($noti);
    }
}
