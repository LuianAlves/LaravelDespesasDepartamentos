@extends('layouts.layout')

@section('content')
    {{-- Breadcrumb --}}
    @include('layouts.breadcrumb')

    <!-- CARD:Adicionar Despesas -->
    <div class="row">
        <div class="col-12">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0 text-uppercase">{{ $despesa->despesa }}</h5>
                    <a class="btn btn-sm btn-outline-secondary" href="{{url('https://bgorcamento.herokuapp.com/despesa')}}">Voltar</a>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ url('https://bgorcamento.herokuapp.com/despesa/atualizar') }}">
                        @csrf

                        <input type="hidden" id="despesa_id" name="despesa_id" value="{{ $despesa->id }}">

                        <!-- Departamento/CategoriaDespesa -->
                        <div class="row">
                            <div class="col-12 col-sm-6 col-lg-4 mb-3">
                                <label for="departamento_id" class="form-label">Departamento <span
                                        class="text-danger fw-bold"> *</span></label>
                                <select name="departamento_id" id="departamento_id" class="form-select">
                                    <option selected disabled>Selecione um Departamento</option>
                                    @foreach ($departamentos as $departamento)
                                        <option id="departamento_{{ $departamento->id }}"
                                            value="{{ $departamento->id }}"
                                            {{ $departamento->id == $despesa->departamento_id ? 'selected' : '' }}>
                                            {{ $departamento->departamento }}
                                        </option>
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
                                    @foreach ($categorias as $categoria)
                                        <option id="categoria_despesa_{{ $categoria->id }}" value="{{ $categoria->id }}"
                                            {{ $categoria->id == $despesa->categoria_despesa_id ? 'selected' : '' }}>
                                            {{ $categoria->categoria_despesa }}</option>
                                    @endforeach
                                </select>
                                @error('categoria_despesa_id')
                                    <small class="text-danger fw-bold">{{ $message }}</small>
                                @enderror
                            </div>
                            <div class="col-12 col-sm-6 col-lg-4 mb-3">
                                <label for="sub_categoria_despesa_id" class="form-label">Sub Categoria <span
                                        class="text-danger fw-bold"> *</span></label>
                                <select name="sub_categoria_despesa_id" id="sub_categoria_despesa_id" class="form-select">
                                    <option selected disabled>Selecione uma Sub Categoria</option>
                                    @foreach ($sub_categorias as $sub)
                                        <option id="sub_cat_{{ $sub->id }}" value="{{ $sub->id }}"
                                            {{ $sub->id == $despesa->sub_categoria_despesa_id ? 'selected' : '' }}>
                                            {{ $sub->sub_categoria_despesa }}
                                        </option>
                                    @endforeach
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
                                        <option id="metodo_{{ $metodo->id }}" value="{{ $metodo->id }}"
                                            {{ $metodo->id == $despesa->metodo_pagamento_id ? 'selected' : '' }}>
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
                                    <input class="form-check-input" type="radio" name="tipo_gasto" id="despesa"
                                        value="Despesa" {{ $despesa->tipo_gasto == 'Despesa' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="despesa">Despesa</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tipo_gasto" id="meta"
                                        value="Meta" {{ $despesa->tipo_gasto == 'Meta' ? 'checked' : '' }}>
                                    <label class="form-check-label" for="meta">Meta</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="tipo_gasto" id="despesa_meta"
                                        value="Despesa/Meta" {{ $despesa->tipo_gasto == 'Despesa/Meta' ? 'checked' : '' }}>
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
                                        value="{{ $despesa->despesa }}" autofocus>
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
                                        value="{{ $despesa->valor_despesa }}">
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
                                    <span id="basic-icon-default-descricao_despesa_input" class="input-group-text"><i class="bx bx-comment"></i></span>
                                    <textarea name="descricao_despesa" id="descricao_despesa" class="form-control" rows="4">{{ $despesa->descricao_despesa }}</textarea>
                                </div>
                                <div class="form-text">Campo Opcional</div>
                            </div>
                            <div class="col-12 col-sm-6 mb-3">
                                <label class="form-label" for="data_despesa">Data</label>
                                <div class="input-group input-group-merge">
                                    <input type="date" name="data_despesa" id="data_despesa" class="form-control"
                                        value="{{ $despesa->data_despesa }}">
                                </div>
                                <div class="form-text">Campo Opcional</div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="d-flex justify-content-end">
                                <button type="submit" class="btn btn-secondary">Atualizar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
