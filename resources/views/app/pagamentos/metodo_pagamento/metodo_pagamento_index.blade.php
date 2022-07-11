@extends('layouts.layout')

@section('content')
    {{-- Breadcrumb --}}
    @include('layouts.breadcrumb')
    
    <!-- CARD:Adicionar Métodos de Pagamento -->
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Métodos de Pagamento</h5>
                    <small class="text-muted float-end">BONGAS BRASIL</small>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ url('https://bgorcamento.herokuapp.com/metodo-pagamento/store') }}">
                        @csrf

                        <div class="row mb-4">
                            <div class="col-12">
                                <label class="form-label" for="metodo_pagamento_input">Método de Pagamento <span
                                    class="text-danger fw-bold"> *</span></label>
                                <div class="input-group input-group-merge">
                                    <span id="metodo_pagamento_input" class="input-group-text"><i
                                            class="bx bx-money"></i></span>
                                    <input type="text" name="metodo_pagamento" id="metodo_pagamento" class="form-control"
                                        placeholder="Cartão Bradesco .." autofocus />
                                </div>
                                @error('metodo_pagamento')
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

    <!-- CARD:Listagem de Métodos de Pagamento -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <h5 class="card-header">Listagem de Métodos</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <caption class="ms-4">
                            Métodos de Pagamentos: <b>{{count($metodos_pagamento)}}</b>
                        </caption>
                        <thead>
                            <tr>
                                <th>Método de Pagamento</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($metodos_pagamento as $metodo)
                            <tr>
                                <td>
                                    <strong>{{$metodo->metodo_pagamento}}</strong>
                                </td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <!-- Editar -->
                                            <button type="button" class="dropdown-item editbtn" value="{{$metodo->id}}">
                                                <i class="bx bx-edit-alt me-1"></i>
                                                <small>Editar Método de Pagamento</small>
                                            </button>

                                            <a type="button" href="{{url('https://bgorcamento.herokuapp.com/metodo-pagamento/remover/'.$metodo->id)}}" class="dropdown-item">
                                                <i class="bx bx-trash me-1"></i>
                                                <small>Apagar Método de Pagamento</small>
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
    @include('app.pagamentos.metodo_pagamento.metodo_pagamento_scripts')
    
    <!-- Include Edit -->
    @include('app.pagamentos.metodo_pagamento.metodo_pagamento_edit')
@endsection