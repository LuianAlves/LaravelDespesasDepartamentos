<?php

namespace App\Http\Controllers\Departamentos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Departamentos\Departamento;

use CArbon\Carbon;
use Validator;
use Response;

class DepartamentoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $departamentos = Departamento::orderBy('departamento', 'ASC')->get();

        return view('app.departamentos.departamento.departamento_index', compact('departamentos'));
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
            'departamento' => 'required'
        ], [
            'departamento.required' => 'Insira um nome para este departamento.'
        ]);

        Departamento::insert([
            'departamento' => $request->departamento,
            'created_at' => Carbon::now()
        ]);

        $noti = [
            'message' => 'Departamento inserido com sucesso!',
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
    public function edit($departamento_id)
    {
        $departamento = Departamento::findOrFail($departamento_id);

        return response()->json([
            'status' => 200,
            'departamento' => $departamento
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
            'departamento' => 'required',
            
        ], [     
            'departamento.required' => 'Insira um nome para o departamento.'
        ]);

        $id = $request->departamento_id;

        if ($validator->passes()) {

            Departamento::findOrFail($id)->update([
                'departamento' => $request->departamento,
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
        Departamento::findOrFail($id)->delete();

        $noti = [
            'message' => 'Departamento excluído com sucesso!',
            'alert-type' => 'error'
        ];

        return redirect()->back()->with($noti);
    }
}
