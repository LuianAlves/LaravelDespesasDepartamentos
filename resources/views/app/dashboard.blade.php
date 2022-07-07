@extends('layouts.layout')

@section('content')
    <!-- Cards Despesa Total / Meta Ano -->
    <div class="row">
        <div class="col-6 mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="card-title d-flex align-items-start justify-content-between">
                        <div class="flex-shrink-0">
                            <h6 class="text-uppercase">Despesas Totais</h6>
                        </div>
                        <div class="p-0">
                            <a href="{{ route('export.despesas') }}" class="btn btn-sm btn-outline-success">Exportar</a>
                        </div>
                    </div>
                    <div class="mt-sm-auto">
                        <h3 class="mb-0"><strong>R$ </strong> <span
                                class="text-muted">{{ str_replace('.', ',', $soma_despesas) }}</span>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-6 mb-4">
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
                                class="text-muted">{{ str_replace('.', ',', $soma_metas) }}</span>
                        </h3>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Gráfico Pizza / Despesas Setores -->
    <div class="row">
        <!-- Departamentos -->
        <div class="col-6 my-2">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Departamentos</h5>
                        <small class="text-muted">Total: {{ count($despesas) }}</small>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="chartDepartamentos" width="auto" height="300px"></canvas>        
                </div>
            </div>
        </div>
        <div class="col-6 my-2">
            <div class="card">
                <div class="card-header d-flex align-items-center justify-content-between pb-0">
                    <div class="card-title mb-0">
                        <h5 class="m-0 me-2">Despesas por Categorias</h5>
                        <small class="text-muted">Total: {{ count($despesas) }}</small>
                    </div>
                </div>
                <div class="card-body">
                    <canvas id="chartCatDespesa" width="auto" height="auto"></canvas>        
                </div>
            </div>
        </div>
    </div>

    <!-- Despesas Setores -->
    <div class="row">
        @foreach ($departamentos as $departamento)
            <div class="col-6 my-2">
                <div class="card h-100">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="flex-shrink-0">
                                <h6 class="text-uppercase">{{ $departamento->departamento }}</h6>
                            </div>
                        </div>
                        <div class="mt-sm-auto">
                            <h3 class="mb-0">
                                @php
                                    $total_despesa_departamento = App\Models\Despesas\Despesa::where('departamento_id', $departamento->id)->sum('valor_despesa');
                                @endphp
                                <strong style="color: rgb(168, 240, 168);">R$ </strong> <span
                                    class="text-muted">{{ str_replace('.', ',', $total_despesa_departamento) }}</span>
                            </h3>
                        </div>
                        <div class="mt-4">
                            <ul class="p-0 m-0">
                                @php
                                    $despesas = App\Models\Despesas\Despesa::where('departamento_id', $departamento->id)
                                        ->orderBy('data_despesa', 'ASC')
                                        ->limit(5)
                                        ->get();
                                @endphp
                                @foreach ($despesas as $despesa)
                                    <li class="d-flex mb-4 pb-1">
                                        <div
                                            class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                            <div class="col-4">
                                                <small class="text-muted mb-1 d-block text-truncate"
                                                    style="max-width: 200px;">{{ $despesa->despesa }}</small>
                                                <h6 class="mb-0 text-truncate" style="max-width: 300px;">
                                                    {{ $despesa->SubCategoriaDespesa->sub_categoria_despesa }}</h6>
                                            </div>
                                            <div class="col-4">
                                                <div class="user-progress d-flex align-items-center gap-1">
                                                    <span class="text-muted">R$ </span>
                                                    <h6 class="mb-0">
                                                        {{ str_replace('.', ',', $despesa->valor_despesa) }}
                                                    </h6>
                                                </div>
                                            </div>
                                            @if ($despesa->gasto_meta == 1)
                                                <div class="col-1">
                                                    <div class="user-progress d-flex justify-content-center">
                                                        <span class="badge bg-label-danger"
                                                            style="font-size: 12px;">M</span>
                                                    </div>
                                                </div>
                                            @endif
                                            @if ($despesa->gasto_despesa == 1)
                                                <div class="col-1">
                                                    <div class="user-progress d-flex justify-content-center">
                                                        <span class="badge bg-label-info" style="font-size: 12px;">D</span>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        let cData = JSON.parse(`<?php echo $data; ?>`);

        // ------------------------------------- Departamento
        // setup
        const data = {
            labels: cData.nome_departamento,
            datasets: [{
                label: 'Gasto por Departamentos',
                data: cData.valor_despesa,
                backgroundColor: [
                    'rgba(255, 0, 0, 0.5)',
                    'rgba(0, 0, 255, 0.5)',
                    'rgba(60, 179, 113, 0.5)',
                    'rgba(238, 130, 238, 0.5)',
                    'rgba(255, 165, 0, 0.5)',
                    'rgba(106, 90, 205, 0.5)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(0, 181, 204, 0.2)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                borderColor: [
                    'rgba(255, 0, 0, 0.2)',
                    'rgba(0, 0, 255, 0.2)',
                    'rgba(60, 179, 113, 0.2)',
                    'rgba(238, 130, 238, 0.2)',
                    'rgba(255, 165, 0, 0.2)',
                    'rgba(106, 90, 205, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 022)'
                ],
                borderWidth: 1
            }]
        };
        // config departamentos
        const config1 = {
            type: 'bar',
            data,
            options: {
                plugins: {
                    subtitle: {
                        padding: {
                            top: 10,
                            bottom: 25,
                        }
                    }
                }
            }
        };    
        // render init block
        const cDepart = new Chart(
            document.getElementById('chartDepartamentos'),
            config1
        );

        // ------------------------------------- Categoria Despesas
        // setup
        const data2 = {
            labels: cData.categoria_despesa,
            datasets: [{
                label: 'Gasto por Departamentos',
                data: cData.valor_despesa,
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(255, 205, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 0, 0, 0.5)',
                    'rgba(0, 0, 255, 0.5)',
                    'rgba(60, 179, 113, 0.5)',
                    'rgba(238, 130, 238, 0.5)',
                    'rgba(255, 165, 0, 0.5)',
                    'rgba(106, 90, 205, 0.5)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)',
                    'rgba(0, 181, 204, 0.2)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                borderWidth: 1
            }]
        };
        // config despesas
        const config2 = {
            type: 'doughnut',
            data: data2,
            options: {
                plugins: {
                    subtitle: {
                        padding: {
                            top: 10,
                            bottom: 25,
                        }
                    }
                }
            }
        };
        // render init block
        const cCat = new Chart(
            document.getElementById('chartCatDespesa'),
            config2
        );

    </script>
@endsection

<style>
    #test {
        color: rgba(53, 53, 128, 0.8);
    }
</style>


