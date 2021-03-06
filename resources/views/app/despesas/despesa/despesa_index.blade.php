@extends('layouts.layout')

@section('content')
    {{-- Breadcrumb --}}
    @include('layouts.breadcrumb')

    <!-- Card Count Despesas -->
    <div class="row">
        <div class="col-12 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="flex-shrink-0">
                            <h6 class="text-uppercase">Despesas Totais</h6>
                        </div>
                        <div class="p-0">
                            <span class="badge bg-label-warning rounded-pill d-flex justify-content-end">
                                @php $ano_atual = date('Y'); @endphp
                                Ano {{ $ano_atual }}
                            </span>
                        </div>
                    </div>
                    <div class="mt-sm-auto">
                        <h3 class="mb-0"><strong>R$ </strong> <span
                                class="text-muted">{{ str_replace('.', ',', $soma_despesas) }}</span></h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="flex-shrink-0">
                            <h6 class="text-uppercase">Meta próximo Ano</h6>
                        </div>
                        <div class="p-0">
                            <span class="badge bg-label-danger rounded-pill d-flex justify-content-end">
                                @php $ano_atual = date('Y'); @endphp
                                Ano {{ $ano_atual + 1 }}
                            </span>
                        </div>
                    </div>
                    <div class="mt-sm-auto">
                        <h3 class="mb-0"><strong>R$ </strong> <span
                                class="text-muted">{{ str_replace('.', ',', $soma_metas) }}</span></h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CARD:Adicionar Despesas -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Despesas</h5>
                    <small class="text-muted float-end">BONGAS BRASIL</small>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ url('https://bgorcamento.herokuapp.com/despesa/store') }}">
                        @csrf

                        <!-- Departamento/CategoriaDespesa -->
                        <div class="row">
                            <div class="col-12 col-sm-6 col-lg-4 mb-3">
                                <label for="departamento_id" class="form-label">Departamento <span
                                        class="text-danger fw-bold"> *</span></label>
                                <select name="departamento_id" id="departamento_id" class="form-select">
                                    <option selected disabled>Selecione um Departamento</option>
                                    @foreach ($departamentos as $departamento)
                                        <option id="departamento_{{ $departamento->id }}"
                                            value="{{ $departamento->id }}">
                                            {{ $departamento->departamento }}</option>
                                    @endforeach
                                </select>
                                @error('departamento_id')
                                    <small class="text-danger fw-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-12 col-sm-6 col-lg-4 mb-3">
                                <label for="categoria_despesa_id" class="form-label">Categoria <span
                                        class="text-danger fw-bold"> *</span></label>
                                <select name="categoria_despesa_id" id="categoria_despesa_id" class="form-select">
                                    <option selected disabled>Selecione uma Categoria</option>
                                    @foreach ($categorias as $despesa)
                                        <option id="categoria_despesa_{{ $despesa->id }}" value="{{ $despesa->id }}">
                                            {{ $despesa->categoria_despesa }}</option>
                                    @endforeach
                                </select>
                                @error('categoria_despesa_id')
                                    <small class="text-danger fw-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-12 col-sm-6 col-lg-4 mb-3">
                                <label for="sub_categoria_despesa_id" class="form-label">Sub Categoria <span
                                        class="text-danger fw-bold"> *</span></label>
                                <select name="sub_categoria_despesa_id" id="sub_categoria_despesa_id"
                                    class="form-select">
                                    <option selected disabled>Selecione uma Sub Categoria</option>
                                </select>
                                @error('sub_categoria_despesa_id')
                                    <small class="text-danger fw-bold">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Metodo Pagamento/Forma de Pagamento -->
                        <div class="row">
                            <div class="col-12 col-sm-6 mb-3">
                                <label for="metodo_pagamento_id" class="form-label">Método de Pagamento <span
                                        class="text-danger fw-bold"> *</span></label>
                                <select name="metodo_pagamento_id" id="metodo_pagamento_id" class="form-select">
                                    @foreach ($metodos_pagamento as $metodo)
                                        <option id="metodo_{{ $metodo->id }}" value="{{ $metodo->id }}">
                                            {{ $metodo->metodo_pagamento }}</option>
                                    @endforeach
                                </select>
                                @error('metodo_pagamento_id')
                                    <small class="text-danger fw-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-12 col-sm-6 mb-3">
                                <label for="forma_pagamento" class="form-label d-block">Gasto<span
                                        class="text-danger fw-bold"> *</span></label>
                                <div class="form-check form-check-inline mt-3">
                                    <input class="form-check-input" type="radio" name="tipo_gasto" id="despesa" value="1" checked>
                                    <label class="form-check-label" for="despesa">Despesa</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tipo_gasto" id="meta" value="2">
                                    <label class="form-check-label" for="meta">Meta</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tipo_gasto" id="despesa_meta" value="3">
                                    <label class="form-check-label" for="despesa_meta">Despesa/Meta</label>
                                </div>
                            </div>
                        </div>

                        <!-- Despesa/Valor -->
                        <div class="row">
                            <div class="col-12 col-sm-6 mb-3">
                                <label class="form-label" for="despesa_input">Despesa <span class="text-danger fw-bold">
                                        *</span></label>
                                <div class="input-group input-group-merge">
                                    <span id="despesa_input" class="input-group-text"><i class="bx bx-cart-alt"></i></span>
                                    <input type="text" name="despesa" id="despesa" class="form-control"
                                        placeholder="Notebook para o colaborador .." autofocus>
                                </div>
                                @error('despesa')
                                    <small class="text-danger fw-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-12 col-sm-6 mb-3">
                                <label class="form-label" for="valor_despesa_input">Valor <span
                                        class="text-danger fw-bold"> *</span></label>
                                <div class="input-group input-group-merge">
                                    <span id="valor_despesa_input" class="input-group-text"><b>R$ </b></span>
                                    <input type="text" name="valor_despesa" id="valor_despesa" class="form-control"
                                        placeholder="1490,99">
                                </div>
                                @error('valor_despesa')
                                    <small class="text-danger fw-bold">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <!-- Descrição Despesa/Data Despesa -->
                        <div class="row">
                            <div class="col-12 col-sm-6 mb-3">
                                <label class="form-label" for="descricao_despesa_input">Descrição</label>
                                <div class="input-group input-group-merge">
                                    <span id="basic-icon-default-descricao_despesa_input" class="input-group-text"><i
                                            class="bx bx-comment"></i></span>
                                    <textarea name="descricao_despesa" id="descricao_despesa" class="form-control"
                                        placeholder="Descrição da despesa (Opcional) .." rows="4"></textarea>
                                </div>
                                <div class="form-text">Campo Opcional</div>
                            </div>
                            <div class="col-12 col-sm-6 mb-3">
                                <label class="form-label" for="data_despesa">Data</label>
                                <div class="input-group input-group-merge">
                                    <input type="date" name="data_despesa" id="data_despesa" class="form-control">
                                </div>
                                <div class="form-text">Campo Opcional</div>
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

    <!-- CARD:Listagem de Despesas -->
    <div class="row">
        <div class="col-12" style="max-height: 500px; overflow-y: auto;">
            <div class="card">
                <h5 class="card-header">Listagem de Despesas</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <caption class="ms-4">
                            Despesas: <b>{{count($despesas)}}</b>
                        </caption>
                        <thead>
                            <tr>
                                <th>Setor</th>
                                <th>Despesa</th>
                                <th>Serviço</th>
                                <th>Valor</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($despesas as $despesa)
                                <tr>
                                    <td>
                                        <strong>{{$despesa->Departamento->departamento}}</strong>
                                    </td>
                                    <td>
                                        <strong>{{$despesa->despesa}}</strong>
                                    </td>
                                    <td>
                                        <strong>{{$despesa->SubCategoriaDespesa->sub_categoria_despesa}}</strong>
                                    </td>
                                    <td>
                                        <strong><span class="text-success">R$ </span>{{$despesa->valor_despesa}}</strong>
                                    </td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                <i class="bx bx-dots-vertical-rounded"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a href="{{url('https://bgorcamento.herokuapp.com/despesa/editar/'.$despesa->id)}}" class="dropdown-item">
                                                    <i class="bx bx-edit text-secondary me-1"></i>
                                                    Editar Despesa
                                                </a>
                                                <a href="{{url('https://bgorcamento.herokuapp.com/despesa/remover/'.$despesa->id)}}" class="dropdown-item">
                                                    <i class="bx bx-trash text-secondary me-1"></i>
                                                    Apagar Despesa
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
@endsection

@include('app.despesas.despesa.despesa_scripts')

<style>
    @media (max-width: 450px) {
        .form-check {
            font-size: 13px;
        }
    }
</style>