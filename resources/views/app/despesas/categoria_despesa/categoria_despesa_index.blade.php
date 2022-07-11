@extends('layouts.layout')

@section('content')
    {{-- Breadcrumb --}}
    @include('layouts.breadcrumb')

    <!-- CARD:Adicionar Categoria de Despesa -->
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Categoria de Despesas</h5>
                    <small class="text-muted float-end">BONGAS BRASIL</small>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ url('https://bgorcamento.herokuapp.com/categoria-despesa/store') }}">
                        @csrf

                        <div class="row mb-4">
                            <div class="col-12">
                                <label class="form-label" for="categoria_input">Categoria de Despesas <span
                                    class="text-danger fw-bold"> *</span></label>
                                <div class="input-group input-group-merge">
                                    <span id="categoria_input" class="input-group-text"><i class="bx bx-categoria"></i></span>
                                    <input type="text" name="categoria_despesa" id="categoria_despesa" class="form-control"
                                        placeholder="Veículos" autofocus>
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
    <div class="row">
        <div class="col-12">
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
                                            <!-- Editar -->
                                            <button type="button" class="dropdown-item editbtn" value="{{$categoria->id}}">
                                                <i class="bx bx-edit-alt me-1"></i>
                                                <small>Editar Categoria</small>
                                            </button>

                                            <a href="{{url('https://bgorcamento.herokuapp.com/categoria-despesa/remover/'.$categoria->id)}}" class="dropdown-item">
                                                <i class="bx bx-trash me-1"></i>
                                                <small>Apagar categoria</small>
                                            </a>
                                            
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
    @include('app.despesas.categoria_despesa.categoria_despesa_scripts')

    <!-- Include Editar -->
    @include('app.despesas.categoria_despesa.categoria_despesa_edit')
@endsection
