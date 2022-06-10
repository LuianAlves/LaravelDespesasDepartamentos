@extends('layouts.layout')

@section('content')
    <!-- CARD:Adicionar Categoria de Despesa -->
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Categoria de Despesas</h5>
                    <small class="text-muted float-end">BONGAS BRASIL</small>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('categoria-despesa.store') }}">
                        @csrf

                        <div class="row mb-4">
                            <div class="col-12">
                                <label class="form-label" for="categoria_input">Categoria</label>
                                <div class="input-group input-group-merge">
                                    <span id="categoria_input" class="input-group-text"><i class="bx bx-categoria"></i></span>
                                    <input type="text" name="categoria_despesa" id="categoria_despesa" class="form-control"
                                        placeholder="Veículos">
                                </div>
                                @error('categoria_despesa')
                                    <small class="text-danger fw-bold">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-secondary">Cadastrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- CARD:Listagem de Categoria de Despesa -->
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <h5 class="card-header">Listagem de Categorias</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <caption class="ms-4">
                            Categorias: <b>{{count($categorias)}}</b>
                        </caption>
                        <thead>
                            <tr>
                                <th>Categoria de Despesa</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categorias as $categoria)
                            <tr>
                                <td>
                                    <strong>{{$categoria->categoria_despesa}}</strong>
                                </td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <form id="removeCategoria_{{$categoria->id}}" action="{{route('categoria-despesa.destroy', $categoria->id)}}" method="post">
                                                @csrf    
                                                @method('DELETE')
                                                
                                                <a type="button" id="removeCategoria_{{$categoria->id}}" class="dropdown-item"
                                                    onclick="document.getElementById('removeCategoria_{{$categoria->id}}').submit()">
                                                    <i class="bx bx-trash text-danger me-1"></i>
                                                    Apagar categoria
                                                </a>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>    
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>  
    </div>
@endsection