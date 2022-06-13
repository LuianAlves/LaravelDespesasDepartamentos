@extends('layouts.layout')

@section('content')

    <!-- CARD:Adicionar Sub Categoria de Despesa -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Sub Categoria de Despesas</h5>
                    <small class="text-muted float-end">BONGAS BRASIL</small>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('sub-categoria-despesa.store') }}">
                        @csrf

                        <div class="row mb-4">
                            <div class="col-6">
                                <label for="categoria_despesa_id" class="form-label">Categoria <span class="text-danger fw-bold"> *</span></label>
                                <select name="categoria_despesa_id" id="categoria_despesa_id" class="form-select">
                                    <option selected disabled>Selecione uma Categoria de Despesa</option>
                                    @foreach ($categorias as $despesa)
                                        <option id="categoria_despesa_{{ $despesa->id }}" value="{{ $despesa->id }}">
                                            {{ $despesa->categoria_despesa }}</option>
                                    @endforeach
                                </select>
                                @error('categoria_despesa_id')
                                    <small class="text-danger fw-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-6">
                                <label class="form-label" for="sub_categoria_despesa_input">Sub Categoria <span class="text-danger fw-bold"> *</span></label>
                                <div class="input-group input-group-merge">
                                    <span id="sub_categoria_despesa_input" class="input-group-text"><i class="bx bx-category"></i></span>
                                    <input type="text" name="sub_categoria_despesa" id="sub_categoria_despesa" class="form-control"
                                        placeholder="Despesa com combustíveis ..">
                                </div>
                                @error('sub_categoria_despesa')
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

    <!-- CARD:Listagem de Sub Categoria de Despesa -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Listagem de Categorias</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <caption class="ms-4">
                            Categorias: <b>{{count($sub_categorias)}}</b>
                        </caption>
                        <thead>
                            <tr>
                                <th>Categoria de Despesa</th>
                                <th>Sub Categoria de Despesa</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($sub_categorias as $sub)
                            <tr>
                                <td>
                                    <strong>{{$sub->Categoria->categoria_despesa}}</strong>
                                </td>
                                <td>
                                    <strong>{{$sub->sub_categoria_despesa}}</strong>
                                </td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <!-- Editar -->
                                            <button type="button" class="dropdown-item editbtn" value="{{$sub->id}}">
                                                <i class="bx bx-edit-alt me-1"></i>
                                                <small>Editar Sub Categoria</small>
                                            </button>

                                            <form id="removeSubCategoria_{{$sub->id}}" action="{{route('sub-categoria-despesa.destroy', $sub->id)}}" method="post">
                                                @csrf    
                                                @method('DELETE')
                                                
                                                <a type="button" id="removeSubCategoria_{{$sub->id}}" class="dropdown-item"
                                                    onclick="document.getElementById('removeSubCategoria_{{$sub->id}}').submit()">
                                                    <i class="bx bx-trash me-1"></i>
                                                    <small>Apagar Sub Categoria</small>
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

    <!-- Include Scripts -->
    @include('app.despesas.sub_categoria_despesa.sub_categoria_despesa_scripts')
    
    <!-- Include Editar-->
    @include('app.despesas.sub_categoria_despesa.sub_categoria_despesa_edit')
@endsection