@extends('layouts.layout')

@section('content')
    <!-- CARD:Adicionar Departamento -->
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Departamento</h5>
                    <small class="text-muted float-end">BONGAS BRASIL</small>
                </div>
                <div class="card-body">
                    <form method="post" action="{{ route('departamento.store') }}">
                        @csrf

                        <div class="row mb-4">
                            <div class="col-12">
                                <label class="form-label" for="departamento_input">Departamento</label>
                                <div class="input-group input-group-merge">
                                    <span id="departamento_input" class="input-group-text"><i
                                            class="bx bx-buildings"></i></span>
                                    <input type="text" name="departamento" id="departamento" class="form-control"
                                        placeholder="Marketing">
                                </div>
                                @error('departamento')
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

    <!-- CARD:Listagem de Departamentos -->
    <div class="row justify-content-center">
        <div class="col-8">
            <div class="card">
                <h5 class="card-header">Listagem de Departamentos</h5>
                <div class="table-responsive text-nowrap">
                    <table class="table">
                        <caption class="ms-4">
                            Departamentos: <b>{{count($departamentos)}}</b>
                        </caption>
                        <thead>
                            <tr>
                                <th>Departamento</th>
                                <th class="text-center">Ações</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($departamentos as $departamento)
                            <tr>
                                <td>
                                    <strong>{{$departamento->departamento}}</strong>
                                </td>
                                <td class="text-center">
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="bx bx-dots-vertical-rounded"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <form id="removeDepartamento_{{$departamento->id}}" action="{{route('departamento.destroy', $departamento->id)}}" method="post">
                                                @csrf    
                                                @method('DELETE')
                                                
                                                <a type="button" id="removeDepartamento_{{$departamento->id}}" class="dropdown-item"
                                                    onclick="document.getElementById('removeDepartamento_{{$departamento->id}}').submit()">
                                                    <i class="bx bx-trash text-danger me-1"></i>
                                                    Apagar Departamento
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