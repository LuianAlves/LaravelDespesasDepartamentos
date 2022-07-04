@extends('layouts.layout')

@section('content')

<div class="row">
    <div class="col-6 mb-4">
        <div class="card">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="flex-shrink-0">
                        <h6 class="text-uppercase">Despesas Totais</h6>
                    </div>
                    <div class="p-0">
                        <a href="{{route('export.despesas')}}" class="btn btn-sm btn-outline-success">Exportar Excel</a>
                    </div>
                </div>
                <div class="mt-sm-auto">
                    <h3 class="mb-0"><strong>R$ </strong> <span class="text-muted">{{ str_replace('.', ',',
                            $soma_despesas) }}</span></h3>
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
                    <h3 class="mb-0"><strong>R$ </strong> <span class="text-muted">{{ str_replace('.', ',', $soma_metas)
                            }}</span></h3>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-6 my-2">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between pb-0">
                <div class="card-title mb-0">
                    <h5 class="m-0 me-2">Order Statistics</h5>
                    <small class="text-muted">42.82k Total Sales</small>
                </div>
                {{-- <div class="dropdown">
                    <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics" style="">
                        <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                        <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                        <a class="dropdown-item" href="javascript:void(0);">Share</a>
                    </div>
                </div> --}}
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3" style="position: relative;">
                    <div class="d-flex flex-column align-items-center gap-1">
                        <h2 class="mb-2">8,258</h2>
                        <span>Total Orders</span>
                    </div>
                    <div class="fw-bold" id="pie_chart">
                    </div>
                    <div class="resize-triggers">
                        <div class="expand-trigger">
                            <div style="width: 280px; height: 139px;"></div>
                        </div>
                        <div class="contract-trigger"></div>
                    </div>
                </div>
                <ul class="p-0 m-0">
                    <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-primary"><i
                                    class="bx bx-mobile-alt"></i></span>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">Electronic</h6>
                                <small class="text-muted">Mobile, Earbuds, TV</small>
                            </div>
                            <div class="user-progress">
                                <small class="fw-semibold">82.5k</small>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    @foreach($departamentos as $departamento)
    <div class="col-6 my-2">
        <div class="card h-100">
            <div class="card-body">
                <div class="card-title d-flex align-items-start justify-content-between">
                    <div class="flex-shrink-0">
                        <h6 class="text-uppercase">{{$departamento->departamento}}</h6>
                    </div>
                </div>
                <div class="mt-sm-auto">
                    <h3 class="mb-0">
                        @php
                        $total_despesa_departamento = App\Models\Despesas\Despesa::where('departamento_id',
                        $departamento->id)->sum('valor_despesa');
                        @endphp
                        <strong style="color: rgb(168, 240, 168);">R$ </strong> <span
                            class="text-muted">{{str_replace('.', ',', $total_despesa_departamento)}}</span>
                    </h3>
                </div>
                <div class="mt-4">
                    <ul class="p-0 m-0">
                        @php
                        $despesas = App\Models\Despesas\Despesa::where('departamento_id',
                        $departamento->id)->orderBy('data_despesa', 'ASC')->limit(5)->get();
                        @endphp
                        @foreach($despesas as $despesa)
                        <li class="d-flex mb-4 pb-1">
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="col-4">
                                    <small class="text-muted mb-1 d-block text-truncate"
                                        style="max-width: 200px;">{{$despesa->despesa}}</small>
                                    <h6 class="mb-0 text-truncate" style="max-width: 300px;">
                                        {{$despesa->descricao_despesa}}</h6>
                                </div>
                                <div class="col-4">
                                    <div class="user-progress d-flex align-items-center gap-1">
                                        <span class="text-muted">R$ </span>
                                        <h6 class="mb-0">{{str_replace('.', ',', $despesa->valor_despesa)}}</h6>
                                    </div>
                                </div>
                                @if($despesa->gasto_meta == 1)
                                <div class="col-1">
                                    <div class="user-progress d-flex justify-content-center">
                                        <span class="badge bg-label-danger" style="font-size: 12px;">M</span>
                                    </div>
                                </div>
                                @endif
                                @if($despesa->gasto_despesa == 1)
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
@endsection

{{-- Grafico Dashboard --}}
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

<script type="text/javascript">
    var analytics = <?php echo $tipo_gasto; ?>

    google.charts.load('current', {'packages':['corechart']});

    google.charts.setOnLoadCallback(drawChart);

    function drawChart()
    {
        var data = google.visualization.arrayToDataTable(analytics);
        var options = {};
        var chart = new google.visualization.PieChart(document.getElementById('pie_chart'));
        chart.draw(data, {
            colors: ['#2c7700', '#1e4988', '#a53602'],
            is3D: false
        });
    };
</script>
