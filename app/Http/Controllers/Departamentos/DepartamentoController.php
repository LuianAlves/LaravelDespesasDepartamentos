<?php

namespace App\Http\Controllers\Departamentos;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Departamentos\Departamento;

use CArbon\Carbon;

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
            'message' => 'Departamento criado com sucesso!',
            'alert-type' => 'info'
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
        Departamento::findOrFail($id)->delete();

        $noti = [
            'message' => 'Departamento excluído com sucesso!',
            'alert-type' => 'error'
        ];

        return redirect()->back()->with($noti);
    }
}
