@extends('layouts.layout')

@section('content')

{{-- Breadcrumb --}}
@include('layouts.breadcrumb')

<div class="row">
    <div class="col-12 col-lg-8 col-md-7 order-0">
        <!-- Count Despesas Ano -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="flex-shrink-0">
                                <h6 class="text-uppercase">Despesas Totais {{date('Y')}}</h6>
                            </div>
                            <div class="p-0">
                                <a href="{{ route('export.despesas') }}"
                                    class="btn btn-sm btn-outline-success">Exportar</a>
                            </div>
                        </div>
                        <div class="mt-sm-auto">
                            <h3 class="mb-0"><strong>R$ </strong> <span class="text-muted">{{ str_replace('.', ',',
                                    $soma_despesas) }}</span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Gráfico Gasto por Departamentos -->
        <div class="row my-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                        <div class="flex-shrink-0">
                            <h6 class="text-uppercase">Despesa por departamentos</h6>
                        </div>
                        <div class="p-0">
                            <span class="badge bg-label-warning d-flex justify-content-end">
                                Ano {{ date('Y') }}
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="chartDepartamentos"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <!-- Gráfico Gasto por Categorias -->
        <div class="row my-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                        <div class="flex-shrink-0">
                            <h6 class="text-uppercase">Despesa por categorias</h6>
                        </div>
                        <div class="p-0">
                            <span class="badge bg-label-warning d-flex justify-content-end align-items-center">
                                Ano {{ date('Y') }}
                            </span>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="chartCatDespesa" width="auto" height="auto"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-12 col-lg-4 col-md-5 order-1">
        <!-- Count Despesas próximo Ano -->
        <div class="row mb-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between pb-0">
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
                            <h3 class="mb-0"><strong>R$ </strong> <span class="text-muted">{{ str_replace('.', ',',
                                    $soma_metas)
                                    }}</span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Gráfico Tipo de Gasto -->
        <div class="row mb-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <canvas id="chartTpGasto" height="auto"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    {{-- <!-- 1 -->
    <div class="col-md-6 col-lg-4 col-xl-4 order-0 mb-4">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center justify-content-between pb-0">
                <div class="card-title mb-0">
                    <h5 class="m-0 me-2">Order Statistics</h5>
                    <small class="text-muted">42.82k Total Sales</small>
                </div>
                <div class="dropdown">
                    <button class="btn p-0" type="button" id="orederStatistics" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="orederStatistics">
                        <a class="dropdown-item" href="javascript:void(0);">Select All</a>
                        <a class="dropdown-item" href="javascript:void(0);">Refresh</a>
                        <a class="dropdown-item" href="javascript:void(0);">Share</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center mb-3" style="position: relative;">
                    <div class="d-flex flex-column align-items-center gap-1">
                        <h2 class="mb-2">8,258</h2>
                        <span>Total Orders</span>
                    </div>
                    <div id="orderStatisticsChart" style="min-height: 137.55px;">
                        <div id="apexchartsg6k9rybx" class="apexcharts-canvas apexchartsg6k9rybx apexcharts-theme-light"
                            style="width: 130px; height: 137.55px;"><svg id="SvgjsSvg1162" width="130" height="137.55"
                                xmlns="http://www.w3.org/2000/svg" version="1.1"
                                xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                style="background: transparent;">
                                <g id="SvgjsG1164" class="apexcharts-inner apexcharts-graphical"
                                    transform="translate(-7, 0)">
                                    <defs id="SvgjsDefs1163">
                                        <clipPath id="gridRectMaskg6k9rybx">
                                            <rect id="SvgjsRect1166" width="150" height="173" x="-4.5" y="-2.5" rx="0"
                                                ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                                                fill="#fff"></rect>
                                        </clipPath>
                                        <clipPath id="forecastMaskg6k9rybx"></clipPath>
                                        <clipPath id="nonForecastMaskg6k9rybx"></clipPath>
                                        <clipPath id="gridRectMarkerMaskg6k9rybx">
                                            <rect id="SvgjsRect1167" width="145" height="172" x="-2" y="-2" rx="0"
                                                ry="0" opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                                                fill="#fff"></rect>
                                        </clipPath>
                                    </defs>
                                    <g id="SvgjsG1168" class="apexcharts-pie">
                                        <g id="SvgjsG1169" transform="translate(0, 0) scale(1)">
                                            <circle id="SvgjsCircle1170" r="44.835365853658544" cx="70.5" cy="70.5"
                                                fill="transparent"></circle>
                                            <g id="SvgjsG1171" class="apexcharts-slices">
                                                <g id="SvgjsG1172" class="apexcharts-series apexcharts-pie-series"
                                                    seriesName="Electronic" rel="1" data:realIndex="0">
                                                    <path id="SvgjsPath1173"
                                                        d="M 70.5 10.71951219512195 A 59.78048780487805 59.78048780487805 0 0 1 97.63977353321047 123.7648046533095 L 90.85483014990785 110.44860348998213 A 44.835365853658544 44.835365853658544 0 0 0 70.5 25.664634146341456 L 70.5 10.71951219512195 z"
                                                        fill="rgba(105,108,255,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="butt" stroke-width="5" stroke-dasharray="0"
                                                        class="apexcharts-pie-area apexcharts-donut-slice-0" index="0"
                                                        j="0" data:angle="153" data:startAngle="0" data:strokeWidth="5"
                                                        data:value="85"
                                                        data:pathOrig="M 70.5 10.71951219512195 A 59.78048780487805 59.78048780487805 0 0 1 97.63977353321047 123.7648046533095 L 90.85483014990785 110.44860348998213 A 44.835365853658544 44.835365853658544 0 0 0 70.5 25.664634146341456 L 70.5 10.71951219512195 z"
                                                        stroke="#ffffff"></path>
                                                </g>
                                                <g id="SvgjsG1174" class="apexcharts-series apexcharts-pie-series"
                                                    seriesName="Sports" rel="2" data:realIndex="1">
                                                    <path id="SvgjsPath1175"
                                                        d="M 97.63977353321047 123.7648046533095 A 59.78048780487805 59.78048780487805 0 0 1 70.5 130.28048780487805 L 70.5 115.33536585365854 A 44.835365853658544 44.835365853658544 0 0 0 90.85483014990785 110.44860348998213 L 97.63977353321047 123.7648046533095 z"
                                                        fill="rgba(133,146,163,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="butt" stroke-width="5" stroke-dasharray="0"
                                                        class="apexcharts-pie-area apexcharts-donut-slice-1" index="0"
                                                        j="1" data:angle="27" data:startAngle="153" data:strokeWidth="5"
                                                        data:value="15"
                                                        data:pathOrig="M 97.63977353321047 123.7648046533095 A 59.78048780487805 59.78048780487805 0 0 1 70.5 130.28048780487805 L 70.5 115.33536585365854 A 44.835365853658544 44.835365853658544 0 0 0 90.85483014990785 110.44860348998213 L 97.63977353321047 123.7648046533095 z"
                                                        stroke="#ffffff"></path>
                                                </g>
                                                <g id="SvgjsG1176" class="apexcharts-series apexcharts-pie-series"
                                                    seriesName="Decor" rel="3" data:realIndex="2">
                                                    <path id="SvgjsPath1177"
                                                        d="M 70.5 130.28048780487805 A 59.78048780487805 59.78048780487805 0 0 1 10.71951219512195 70.50000000000001 L 25.664634146341456 70.5 A 44.835365853658544 44.835365853658544 0 0 0 70.5 115.33536585365854 L 70.5 130.28048780487805 z"
                                                        fill="rgba(3,195,236,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="butt" stroke-width="5" stroke-dasharray="0"
                                                        class="apexcharts-pie-area apexcharts-donut-slice-2" index="0"
                                                        j="2" data:angle="90" data:startAngle="180" data:strokeWidth="5"
                                                        data:value="50"
                                                        data:pathOrig="M 70.5 130.28048780487805 A 59.78048780487805 59.78048780487805 0 0 1 10.71951219512195 70.50000000000001 L 25.664634146341456 70.5 A 44.835365853658544 44.835365853658544 0 0 0 70.5 115.33536585365854 L 70.5 130.28048780487805 z"
                                                        stroke="#ffffff"></path>
                                                </g>
                                                <g id="SvgjsG1178" class="apexcharts-series apexcharts-pie-series"
                                                    seriesName="Fashion" rel="4" data:realIndex="3">
                                                    <path id="SvgjsPath1179"
                                                        d="M 10.71951219512195 70.50000000000001 A 59.78048780487805 59.78048780487805 0 0 1 70.48956633664653 10.719513105630845 L 70.4921747524849 25.664634829223125 A 44.835365853658544 44.835365853658544 0 0 0 25.664634146341456 70.5 L 10.71951219512195 70.50000000000001 z"
                                                        fill="rgba(113,221,55,1)" fill-opacity="1" stroke-opacity="1"
                                                        stroke-linecap="butt" stroke-width="5" stroke-dasharray="0"
                                                        class="apexcharts-pie-area apexcharts-donut-slice-3" index="0"
                                                        j="3" data:angle="90" data:startAngle="270" data:strokeWidth="5"
                                                        data:value="50"
                                                        data:pathOrig="M 10.71951219512195 70.50000000000001 A 59.78048780487805 59.78048780487805 0 0 1 70.48956633664653 10.719513105630845 L 70.4921747524849 25.664634829223125 A 44.835365853658544 44.835365853658544 0 0 0 25.664634146341456 70.5 L 10.71951219512195 70.50000000000001 z"
                                                        stroke="#ffffff"></path>
                                                </g>
                                            </g>
                                        </g>
                                        <g id="SvgjsG1180" class="apexcharts-datalabels-group"
                                            transform="translate(0, 0) scale(1)" style="opacity: 1;"><text
                                                id="SvgjsText1181" font-family="Helvetica, Arial, sans-serif" x="70.5"
                                                y="90.5" text-anchor="middle" dominant-baseline="auto"
                                                font-size="0.8125rem" font-weight="400" fill="#a1acb8"
                                                class="apexcharts-text apexcharts-datalabel-label"
                                                style="font-family: Helvetica, Arial, sans-serif; fill: rgb(161, 172, 184);">Weekly</text><text
                                                id="SvgjsText1182" font-family="Public Sans" x="70.5" y="71.5"
                                                text-anchor="middle" dominant-baseline="auto" font-size="1.5rem"
                                                font-weight="400" fill="#566a7f"
                                                class="apexcharts-text apexcharts-datalabel-value"
                                                style="font-family: &quot;Public Sans&quot;;">38%</text></g>
                                    </g>
                                    <line id="SvgjsLine1183" x1="0" y1="0" x2="141" y2="0" stroke="#b6b6b6"
                                        stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                        class="apexcharts-ycrosshairs"></line>
                                    <line id="SvgjsLine1184" x1="0" y1="0" x2="141" y2="0" stroke-dasharray="0"
                                        stroke-width="0" stroke-linecap="butt" class="apexcharts-ycrosshairs-hidden">
                                    </line>
                                </g>
                                <g id="SvgjsG1165" class="apexcharts-annotations"></g>
                            </svg>
                            <div class="apexcharts-legend"></div>
                            <div class="apexcharts-tooltip apexcharts-theme-dark"
                                style="left: 25.9922px; top: 81.25px;">
                                <div class="apexcharts-tooltip-series-group apexcharts-active"
                                    style="order: 1; display: flex; background-color: rgb(133, 146, 163);"><span
                                        class="apexcharts-tooltip-marker"
                                        style="background-color: rgb(133, 146, 163); display: none;"></span>
                                    <div class="apexcharts-tooltip-text"
                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-y-label">Sports: </span><span
                                                class="apexcharts-tooltip-text-y-value">15</span></div>
                                        <div class="apexcharts-tooltip-goals-group"><span
                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                class="apexcharts-tooltip-text-goals-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                                <div class="apexcharts-tooltip-series-group"
                                    style="order: 2; display: none; background-color: rgb(133, 146, 163);"><span
                                        class="apexcharts-tooltip-marker"
                                        style="background-color: rgb(133, 146, 163); display: none;"></span>
                                    <div class="apexcharts-tooltip-text"
                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-y-label">Sports: </span><span
                                                class="apexcharts-tooltip-text-y-value">15</span></div>
                                        <div class="apexcharts-tooltip-goals-group"><span
                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                class="apexcharts-tooltip-text-goals-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                                <div class="apexcharts-tooltip-series-group"
                                    style="order: 3; display: none; background-color: rgb(133, 146, 163);"><span
                                        class="apexcharts-tooltip-marker"
                                        style="background-color: rgb(133, 146, 163); display: none;"></span>
                                    <div class="apexcharts-tooltip-text"
                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-y-label">Sports: </span><span
                                                class="apexcharts-tooltip-text-y-value">15</span></div>
                                        <div class="apexcharts-tooltip-goals-group"><span
                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                class="apexcharts-tooltip-text-goals-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                                <div class="apexcharts-tooltip-series-group"
                                    style="order: 4; display: none; background-color: rgb(133, 146, 163);"><span
                                        class="apexcharts-tooltip-marker"
                                        style="background-color: rgb(133, 146, 163); display: none;"></span>
                                    <div class="apexcharts-tooltip-text"
                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                        <div class="apexcharts-tooltip-y-group"><span
                                                class="apexcharts-tooltip-text-y-label">Sports: </span><span
                                                class="apexcharts-tooltip-text-y-value">15</span></div>
                                        <div class="apexcharts-tooltip-goals-group"><span
                                                class="apexcharts-tooltip-text-goals-label"></span><span
                                                class="apexcharts-tooltip-text-goals-value"></span></div>
                                        <div class="apexcharts-tooltip-z-group"><span
                                                class="apexcharts-tooltip-text-z-label"></span><span
                                                class="apexcharts-tooltip-text-z-value"></span></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="resize-triggers">
                        <div class="expand-trigger">
                            <div style="width: 273px; height: 139px;"></div>
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
                    <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-success"><i class="bx bx-closet"></i></span>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">Fashion</h6>
                                <small class="text-muted">T-shirt, Jeans, Shoes</small>
                            </div>
                            <div class="user-progress">
                                <small class="fw-semibold">23.8k</small>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex mb-4 pb-1">
                        <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-info"><i class="bx bx-home-alt"></i></span>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">Decor</h6>
                                <small class="text-muted">Fine Art, Dining</small>
                            </div>
                            <div class="user-progress">
                                <small class="fw-semibold">849k</small>
                            </div>
                        </div>
                    </li>
                    <li class="d-flex">
                        <div class="avatar flex-shrink-0 me-3">
                            <span class="avatar-initial rounded bg-label-secondary"><i
                                    class="bx bx-football"></i></span>
                        </div>
                        <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                            <div class="me-2">
                                <h6 class="mb-0">Sports</h6>
                                <small class="text-muted">Football, Cricket Kit</small>
                            </div>
                            <div class="user-progress">
                                <small class="fw-semibold">99</small>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div> --}}

    <!-- 3 -->
    <div class="col-md-6 col-lg-4 order-2 mb-4" style="max-height: 800px; overflow-y: auto;" >
        <div class="card">
            <div class="card-header d-flex align-items-center justify-content-between">
                <h5 class="card-title m-0 me-2">Despesas Recentes</h5>
                <div class="dropdown">
                    <button class="btn p-0" type="button" id="transactionID" data-bs-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <i class="bx bx-dots-vertical-rounded"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="transactionID">
                        <a class="dropdown-item" href="javascript:void(0);">Last 28 Days</a>
                        <a class="dropdown-item" href="javascript:void(0);">Last Month</a>
                        <a class="dropdown-item" href="javascript:void(0);">Last Year</a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <ul class="p-0 m-0">
                    @php
                        $despesas = App\Models\Despesas\Despesa::orderBy('data_despesa', 'ASC')->limit(30)->get();
                    @endphp
                    @foreach ($despesas as $despesa)
                        <li class="d-flex mb-4 pb-1">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="../assets/img/icons/unicons/paypal.png" alt="User" class="rounded">
                            </div>
                            <div class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                <div class="me-2">
                                    <small class="text-muted d-block mb-1">{{$despesa->Departamento->departamento}}</small>
                                    <h6 class="mb-0 text-truncate" style="max-width: 200px;">{{$despesa->despesa}}</h6>
                                </div>
                                <div class="user-progress d-flex align-items-center gap-1">
                                    <h6 class="mb-0">{{$despesa->valor_despesa}}</h6>
                                    <span class="text-muted">R$</span>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>

</div>

<!-- Configurações CHART JS -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    let cData = JSON.parse(`<?php echo $data; ?>`);

        // -------------------------------------  Departamento ------------------------------------- 
        const data = {
            labels: cData[0].nome_departamento,
            datasets: [{
                label: 'Gasto por Departamentos',
                data: cData[0].valor_despesa,
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

        const config1 = {
            type: 'bar',
            data,
            options: {
            }
        };    

        const cDepart = new Chart(
            document.getElementById('chartDepartamentos'),
            config1
        );

        // -------------------------------------  Categoria Despesas ------------------------------------- 
        const data2 = {
            labels: cData[1].categoria_despesa,
            datasets: [{
                label: 'Gasto por categorias',
                data: cData[1].valor_despesa,
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

        const config2 = {
            type: 'bar',
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

        const cCat = new Chart(
            document.getElementById('chartCatDespesa'),
            config2
        );

        // -------------------------------------  Tipo de Gasto ------------------------------------- 
        const data3 = {
            labels: cData[2].tipo_gasto,
            datasets: [{
                label: 'Tipo de Gasto',
                data: cData[2].number,
                backgroundColor: [
                    'rgba(0, 181, 204, 0.2)',
                    'rgb(54, 162, 235)',
                    'rgb(255, 205, 86)'
                ],
                borderWidth: 1
            }]
        };

        const config3 = {
            type: 'doughnut',
            data: data3,
            options: {
                maintainAspectRatio : false
            }
        };

        const cGasto = new Chart(
            document.getElementById('chartTpGasto'),
            config3
        );
</script>
@endsection