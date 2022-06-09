@extends('layouts.layout')

@section('content')
    <div class="row">
        <div class="col-12 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="flex-shrink-0">
                            <h6 class="text-uppercase">Despesas</h6>
                        </div>
                        <div class="p-0">
                            <span class="badge bg-label-warning rounded-pill d-flex justify-content-end">
                                @php $ano_atual = date('Y'); @endphp
                                Ano {{$ano_atual}}
                            </span>
                        </div>
                    </div>
                    {{-- <div class="mt-sm-auto">
                        <h3 class="mb-0"><strong>R$ </strong> <span
                                class="text-muted">{{ str_replace('.', ',', $soma_salarios_anual) }}</span></h3>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
    
@endsection