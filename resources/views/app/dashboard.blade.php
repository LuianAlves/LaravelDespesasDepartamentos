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
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2">Departamentos</h5>
                            <small class="text-muted">Total de despesas: {{ count($despesas) }}</small>
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
                            <span class="badge bg-label-warning d-flex justify-content-end">
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
    <!-- 1 -->
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
    </div>

    <!-- 2 -->
    <div class="col-md-6 col-lg-4 order-1 mb-4">
        <div class="card h-100">
            <div class="card-header">
                <ul class="nav nav-pills" role="tablist">
                    <li class="nav-item">
                        <button type="button" class="nav-link active" role="tab" data-bs-toggle="tab"
                            data-bs-target="#navs-tabs-line-card-income" aria-controls="navs-tabs-line-card-income"
                            aria-selected="true">
                            Income
                        </button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab">Expenses</button>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="nav-link" role="tab">Profit</button>
                    </li>
                </ul>
            </div>
            <div class="card-body px-0">
                <div class="tab-content p-0">
                    <div class="tab-pane fade show active" id="navs-tabs-line-card-income" role="tabpanel"
                        style="position: relative;">
                        <div class="d-flex p-4 pt-3">
                            <div class="avatar flex-shrink-0 me-3">
                                <img src="../assets/img/icons/unicons/wallet.png" alt="User">
                            </div>
                            <div>
                                <small class="text-muted d-block">Total Balance</small>
                                <div class="d-flex align-items-center">
                                    <h6 class="mb-0 me-1">$459.10</h6>
                                    <small class="text-success fw-semibold">
                                        <i class="bx bx-chevron-up"></i>
                                        42.9%
                                    </small>
                                </div>
                            </div>
                        </div>
                        <div id="incomeChart" style="min-height: 215px;">
                            <div id="apexcharts9spe49m2"
                                class="apexcharts-canvas apexcharts9spe49m2 apexcharts-theme-light"
                                style="width: 320px; height: 215px;"><svg id="SvgjsSvg1185" width="320" height="215"
                                    xmlns="http://www.w3.org/2000/svg" version="1.1"
                                    xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                    class="apexcharts-svg apexcharts-zoomable" xmlns:data="ApexChartsNS"
                                    transform="translate(0, 0)" style="background: transparent;">
                                    <g id="SvgjsG1187" class="apexcharts-inner apexcharts-graphical"
                                        transform="translate(0, 10)">
                                        <defs id="SvgjsDefs1186">
                                            <clipPath id="gridRectMask9spe49m2">
                                                <rect id="SvgjsRect1192" width="308.635009765625" height="175.73" x="-3"
                                                    y="-1" rx="0" ry="0" opacity="1" stroke-width="0" stroke="none"
                                                    stroke-dasharray="0" fill="#fff"></rect>
                                            </clipPath>
                                            <clipPath id="forecastMask9spe49m2"></clipPath>
                                            <clipPath id="nonForecastMask9spe49m2"></clipPath>
                                            <clipPath id="gridRectMarkerMask9spe49m2">
                                                <rect id="SvgjsRect1193" width="330.635009765625" height="201.73"
                                                    x="-14" y="-14" rx="0" ry="0" opacity="1" stroke-width="0"
                                                    stroke="none" stroke-dasharray="0" fill="#fff"></rect>
                                            </clipPath>
                                            <linearGradient id="SvgjsLinearGradient1213" x1="0" y1="0" x2="0" y2="1">
                                                <stop id="SvgjsStop1214" stop-opacity="0.5"
                                                    stop-color="rgba(105,108,255,0.5)" offset="0"></stop>
                                                <stop id="SvgjsStop1215" stop-opacity="0.25"
                                                    stop-color="rgba(195,196,255,0.25)" offset="0.95"></stop>
                                                <stop id="SvgjsStop1216" stop-opacity="0.25"
                                                    stop-color="rgba(195,196,255,0.25)" offset="1"></stop>
                                            </linearGradient>
                                        </defs>
                                        <line id="SvgjsLine1191" x1="-0.5" y1="0" x2="-0.5" y2="173.73" stroke="#b6b6b6"
                                            stroke-dasharray="3" stroke-linecap="butt" class="apexcharts-xcrosshairs"
                                            x="-0.5" y="0" width="1" height="173.73" fill="#b1b9c4" filter="none"
                                            fill-opacity="0.9" stroke-width="1"></line>
                                        <g id="SvgjsG1219" class="apexcharts-xaxis" transform="translate(0, 0)">
                                            <g id="SvgjsG1220" class="apexcharts-xaxis-texts-g"
                                                transform="translate(0, -4)"><text id="SvgjsText1222"
                                                    font-family="Helvetica, Arial, sans-serif" x="0" y="202.73"
                                                    text-anchor="middle" dominant-baseline="auto" font-size="13px"
                                                    font-weight="400" fill="#a1acb8"
                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1223"></tspan>
                                                    <title></title>
                                                </text><text id="SvgjsText1225"
                                                    font-family="Helvetica, Arial, sans-serif" x="43.23357282366071"
                                                    y="202.73" text-anchor="middle" dominant-baseline="auto"
                                                    font-size="13px" font-weight="400" fill="#a1acb8"
                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1226">Jan</tspan>
                                                    <title>Jan</title>
                                                </text><text id="SvgjsText1228"
                                                    font-family="Helvetica, Arial, sans-serif" x="86.46714564732142"
                                                    y="202.73" text-anchor="middle" dominant-baseline="auto"
                                                    font-size="13px" font-weight="400" fill="#a1acb8"
                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1229">Feb</tspan>
                                                    <title>Feb</title>
                                                </text><text id="SvgjsText1231"
                                                    font-family="Helvetica, Arial, sans-serif" x="129.70071847098214"
                                                    y="202.73" text-anchor="middle" dominant-baseline="auto"
                                                    font-size="13px" font-weight="400" fill="#a1acb8"
                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1232">Mar</tspan>
                                                    <title>Mar</title>
                                                </text><text id="SvgjsText1234"
                                                    font-family="Helvetica, Arial, sans-serif" x="172.93429129464286"
                                                    y="202.73" text-anchor="middle" dominant-baseline="auto"
                                                    font-size="13px" font-weight="400" fill="#a1acb8"
                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1235">Apr</tspan>
                                                    <title>Apr</title>
                                                </text><text id="SvgjsText1237"
                                                    font-family="Helvetica, Arial, sans-serif" x="216.16786411830358"
                                                    y="202.73" text-anchor="middle" dominant-baseline="auto"
                                                    font-size="13px" font-weight="400" fill="#a1acb8"
                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1238">May</tspan>
                                                    <title>May</title>
                                                </text><text id="SvgjsText1240"
                                                    font-family="Helvetica, Arial, sans-serif" x="259.40143694196433"
                                                    y="202.73" text-anchor="middle" dominant-baseline="auto"
                                                    font-size="13px" font-weight="400" fill="#a1acb8"
                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1241">Jun</tspan>
                                                    <title>Jun</title>
                                                </text><text id="SvgjsText1243"
                                                    font-family="Helvetica, Arial, sans-serif" x="302.63500976562506"
                                                    y="202.73" text-anchor="middle" dominant-baseline="auto"
                                                    font-size="13px" font-weight="400" fill="#a1acb8"
                                                    class="apexcharts-text apexcharts-xaxis-label "
                                                    style="font-family: Helvetica, Arial, sans-serif;">
                                                    <tspan id="SvgjsTspan1244">Jul</tspan>
                                                    <title>Jul</title>
                                                </text></g>
                                        </g>
                                        <g id="SvgjsG1247" class="apexcharts-grid">
                                            <g id="SvgjsG1248" class="apexcharts-gridlines-horizontal">
                                                <line id="SvgjsLine1250" x1="0" y1="0" x2="302.635009765625" y2="0"
                                                    stroke="#eceef1" stroke-dasharray="3" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine1251" x1="0" y1="43.4325" x2="302.635009765625"
                                                    y2="43.4325" stroke="#eceef1" stroke-dasharray="3"
                                                    stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine1252" x1="0" y1="86.865" x2="302.635009765625"
                                                    y2="86.865" stroke="#eceef1" stroke-dasharray="3"
                                                    stroke-linecap="butt" class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine1253" x1="0" y1="130.29749999999999"
                                                    x2="302.635009765625" y2="130.29749999999999" stroke="#eceef1"
                                                    stroke-dasharray="3" stroke-linecap="butt"
                                                    class="apexcharts-gridline"></line>
                                                <line id="SvgjsLine1254" x1="0" y1="173.73" x2="302.635009765625"
                                                    y2="173.73" stroke="#eceef1" stroke-dasharray="3"
                                                    stroke-linecap="butt" class="apexcharts-gridline"></line>
                                            </g>
                                            <g id="SvgjsG1249" class="apexcharts-gridlines-vertical"></g>
                                            <line id="SvgjsLine1256" x1="0" y1="173.73" x2="302.635009765625"
                                                y2="173.73" stroke="transparent" stroke-dasharray="0"
                                                stroke-linecap="butt"></line>
                                            <line id="SvgjsLine1255" x1="0" y1="1" x2="0" y2="173.73"
                                                stroke="transparent" stroke-dasharray="0" stroke-linecap="butt"></line>
                                        </g>
                                        <g id="SvgjsG1194" class="apexcharts-area-series apexcharts-plot-series">
                                            <g id="SvgjsG1195" class="apexcharts-series" seriesName="seriesx1"
                                                data:longestSeries="true" rel="1" data:realIndex="0">
                                                <path id="SvgjsPath1217"
                                                    d="M0 173.73L0 112.92450000000001C15.131750488281249 112.92450000000001 28.101822335379467 125.95425 43.233572823660715 125.95425C58.365323311941964 125.95425 71.33539515904019 86.86500000000001 86.46714564732143 86.86500000000001C101.59889613560267 86.86500000000001 114.5689679827009 121.611 129.70071847098214 121.611C144.8324689592634 121.611 157.8025408063616 34.74600000000001 172.93429129464286 34.74600000000001C188.06604178292412 34.74600000000001 201.03611363002233 104.238 216.16786411830358 104.238C231.29961460658484 104.238 244.26968645368305 65.14875 259.4014369419643 65.14875C274.5331874302455 65.14875 287.5032592773438 91.20825 302.635009765625 91.20825C302.635009765625 91.20825 302.635009765625 91.20825 302.635009765625 173.73M302.635009765625 91.20825C302.635009765625 91.20825 302.635009765625 91.20825 302.635009765625 91.20825 "
                                                    fill="url(#SvgjsLinearGradient1213)" fill-opacity="1"
                                                    stroke-opacity="1" stroke-linecap="butt" stroke-width="0"
                                                    stroke-dasharray="0" class="apexcharts-area" index="0"
                                                    clip-path="url(#gridRectMask9spe49m2)"
                                                    pathTo="M 0 173.73L 0 112.92450000000001C 15.131750488281249 112.92450000000001 28.101822335379467 125.95425 43.233572823660715 125.95425C 58.365323311941964 125.95425 71.33539515904019 86.86500000000001 86.46714564732143 86.86500000000001C 101.59889613560267 86.86500000000001 114.5689679827009 121.611 129.70071847098214 121.611C 144.8324689592634 121.611 157.8025408063616 34.74600000000001 172.93429129464286 34.74600000000001C 188.06604178292412 34.74600000000001 201.03611363002233 104.238 216.16786411830358 104.238C 231.29961460658484 104.238 244.26968645368305 65.14875 259.4014369419643 65.14875C 274.5331874302455 65.14875 287.5032592773438 91.20825 302.635009765625 91.20825C 302.635009765625 91.20825 302.635009765625 91.20825 302.635009765625 173.73M 302.635009765625 91.20825z"
                                                    pathFrom="M -1 217.1625L -1 217.1625L 43.233572823660715 217.1625L 86.46714564732143 217.1625L 129.70071847098214 217.1625L 172.93429129464286 217.1625L 216.16786411830358 217.1625L 259.4014369419643 217.1625L 302.635009765625 217.1625">
                                                </path>
                                                <path id="SvgjsPath1218"
                                                    d="M0 112.92450000000001C15.131750488281249 112.92450000000001 28.101822335379467 125.95425 43.233572823660715 125.95425C58.365323311941964 125.95425 71.33539515904019 86.86500000000001 86.46714564732143 86.86500000000001C101.59889613560267 86.86500000000001 114.5689679827009 121.611 129.70071847098214 121.611C144.8324689592634 121.611 157.8025408063616 34.74600000000001 172.93429129464286 34.74600000000001C188.06604178292412 34.74600000000001 201.03611363002233 104.238 216.16786411830358 104.238C231.29961460658484 104.238 244.26968645368305 65.14875 259.4014369419643 65.14875C274.5331874302455 65.14875 287.5032592773438 91.20825 302.635009765625 91.20825C302.635009765625 91.20825 302.635009765625 91.20825 302.635009765625 91.20825 "
                                                    fill="none" fill-opacity="1" stroke="#696cff" stroke-opacity="1"
                                                    stroke-linecap="butt" stroke-width="2" stroke-dasharray="0"
                                                    class="apexcharts-area" index="0"
                                                    clip-path="url(#gridRectMask9spe49m2)"
                                                    pathTo="M 0 112.92450000000001C 15.131750488281249 112.92450000000001 28.101822335379467 125.95425 43.233572823660715 125.95425C 58.365323311941964 125.95425 71.33539515904019 86.86500000000001 86.46714564732143 86.86500000000001C 101.59889613560267 86.86500000000001 114.5689679827009 121.611 129.70071847098214 121.611C 144.8324689592634 121.611 157.8025408063616 34.74600000000001 172.93429129464286 34.74600000000001C 188.06604178292412 34.74600000000001 201.03611363002233 104.238 216.16786411830358 104.238C 231.29961460658484 104.238 244.26968645368305 65.14875 259.4014369419643 65.14875C 274.5331874302455 65.14875 287.5032592773438 91.20825 302.635009765625 91.20825"
                                                    pathFrom="M -1 217.1625L -1 217.1625L 43.233572823660715 217.1625L 86.46714564732143 217.1625L 129.70071847098214 217.1625L 172.93429129464286 217.1625L 216.16786411830358 217.1625L 259.4014369419643 217.1625L 302.635009765625 217.1625">
                                                </path>
                                                <g id="SvgjsG1196" class="apexcharts-series-markers-wrap"
                                                    data:realIndex="0">
                                                    <g id="SvgjsG1198" class="apexcharts-series-markers"
                                                        clip-path="url(#gridRectMarkerMask9spe49m2)">
                                                        <circle id="SvgjsCircle1199" r="6" cx="0"
                                                            cy="112.92450000000001"
                                                            class="apexcharts-marker no-pointer-events wokpmyl11"
                                                            stroke="transparent" fill="transparent" fill-opacity="1"
                                                            stroke-width="4" stroke-opacity="0.9" rel="0" j="0"
                                                            index="0" default-marker-size="6"></circle>
                                                        <circle id="SvgjsCircle1200" r="6" cx="43.233572823660715"
                                                            cy="125.95425"
                                                            class="apexcharts-marker no-pointer-events wf29ekmfj"
                                                            stroke="transparent" fill="transparent" fill-opacity="1"
                                                            stroke-width="4" stroke-opacity="0.9" rel="1" j="1"
                                                            index="0" default-marker-size="6"></circle>
                                                    </g>
                                                    <g id="SvgjsG1201" class="apexcharts-series-markers"
                                                        clip-path="url(#gridRectMarkerMask9spe49m2)">
                                                        <circle id="SvgjsCircle1202" r="6" cx="86.46714564732143"
                                                            cy="86.86500000000001"
                                                            class="apexcharts-marker no-pointer-events wm4rhb9au"
                                                            stroke="transparent" fill="transparent" fill-opacity="1"
                                                            stroke-width="4" stroke-opacity="0.9" rel="2" j="2"
                                                            index="0" default-marker-size="6"></circle>
                                                    </g>
                                                    <g id="SvgjsG1203" class="apexcharts-series-markers"
                                                        clip-path="url(#gridRectMarkerMask9spe49m2)">
                                                        <circle id="SvgjsCircle1204" r="6" cx="129.70071847098214"
                                                            cy="121.611"
                                                            class="apexcharts-marker no-pointer-events wi2ry5jrjj"
                                                            stroke="transparent" fill="transparent" fill-opacity="1"
                                                            stroke-width="4" stroke-opacity="0.9" rel="3" j="3"
                                                            index="0" default-marker-size="6"></circle>
                                                    </g>
                                                    <g id="SvgjsG1205" class="apexcharts-series-markers"
                                                        clip-path="url(#gridRectMarkerMask9spe49m2)">
                                                        <circle id="SvgjsCircle1206" r="6" cx="172.93429129464286"
                                                            cy="34.74600000000001"
                                                            class="apexcharts-marker no-pointer-events wxp2xeowt"
                                                            stroke="transparent" fill="transparent" fill-opacity="1"
                                                            stroke-width="4" stroke-opacity="0.9" rel="4" j="4"
                                                            index="0" default-marker-size="6"></circle>
                                                    </g>
                                                    <g id="SvgjsG1207" class="apexcharts-series-markers"
                                                        clip-path="url(#gridRectMarkerMask9spe49m2)">
                                                        <circle id="SvgjsCircle1208" r="6" cx="216.16786411830358"
                                                            cy="104.238"
                                                            class="apexcharts-marker no-pointer-events w8bjsf0kj"
                                                            stroke="transparent" fill="transparent" fill-opacity="1"
                                                            stroke-width="4" stroke-opacity="0.9" rel="5" j="5"
                                                            index="0" default-marker-size="6"></circle>
                                                    </g>
                                                    <g id="SvgjsG1209" class="apexcharts-series-markers"
                                                        clip-path="url(#gridRectMarkerMask9spe49m2)">
                                                        <circle id="SvgjsCircle1210" r="6" cx="259.4014369419643"
                                                            cy="65.14875"
                                                            class="apexcharts-marker no-pointer-events w74a8wqvv"
                                                            stroke="transparent" fill="transparent" fill-opacity="1"
                                                            stroke-width="4" stroke-opacity="0.9" rel="6" j="6"
                                                            index="0" default-marker-size="6"></circle>
                                                    </g>
                                                    <g id="SvgjsG1211" class="apexcharts-series-markers"
                                                        clip-path="url(#gridRectMarkerMask9spe49m2)">
                                                        <circle id="SvgjsCircle1212" r="6" cx="302.635009765625"
                                                            cy="91.20825"
                                                            class="apexcharts-marker no-pointer-events w2p06nxx4h"
                                                            stroke="#696cff" fill="#ffffff" fill-opacity="1"
                                                            stroke-width="4" stroke-opacity="0.9" rel="7" j="7"
                                                            index="0" default-marker-size="6"></circle>
                                                    </g>
                                                </g>
                                            </g>
                                            <g id="SvgjsG1197" class="apexcharts-datalabels" data:realIndex="0"></g>
                                        </g>
                                        <line id="SvgjsLine1257" x1="0" y1="0" x2="302.635009765625" y2="0"
                                            stroke="#b6b6b6" stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                            class="apexcharts-ycrosshairs"></line>
                                        <line id="SvgjsLine1258" x1="0" y1="0" x2="302.635009765625" y2="0"
                                            stroke-dasharray="0" stroke-width="0" stroke-linecap="butt"
                                            class="apexcharts-ycrosshairs-hidden"></line>
                                        <g id="SvgjsG1259" class="apexcharts-yaxis-annotations"></g>
                                        <g id="SvgjsG1260" class="apexcharts-xaxis-annotations"></g>
                                        <g id="SvgjsG1261" class="apexcharts-point-annotations"></g>
                                        <rect id="SvgjsRect1262" width="0" height="0" x="0" y="0" rx="0" ry="0"
                                            opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                                            fill="#fefefe" class="apexcharts-zoom-rect"></rect>
                                        <rect id="SvgjsRect1263" width="0" height="0" x="0" y="0" rx="0" ry="0"
                                            opacity="1" stroke-width="0" stroke="none" stroke-dasharray="0"
                                            fill="#fefefe" class="apexcharts-selection-rect"></rect>
                                    </g>
                                    <rect id="SvgjsRect1190" width="0" height="0" x="0" y="0" rx="0" ry="0" opacity="1"
                                        stroke-width="0" stroke="none" stroke-dasharray="0" fill="#fefefe"></rect>
                                    <g id="SvgjsG1245" class="apexcharts-yaxis" rel="0" transform="translate(-8, 0)">
                                        <g id="SvgjsG1246" class="apexcharts-yaxis-texts-g"></g>
                                    </g>
                                    <g id="SvgjsG1188" class="apexcharts-annotations"></g>
                                </svg>
                                <div class="apexcharts-legend" style="max-height: 107.5px;"></div>
                                <div class="apexcharts-tooltip apexcharts-theme-light"
                                    style="left: 12px; top: 116.425px;">
                                    <div class="apexcharts-tooltip-title"
                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;"></div>
                                    <div class="apexcharts-tooltip-series-group apexcharts-active"
                                        style="order: 1; display: flex;"><span class="apexcharts-tooltip-marker"
                                            style="background-color: rgb(105, 108, 255);"></span>
                                        <div class="apexcharts-tooltip-text"
                                            style="font-family: Helvetica, Arial, sans-serif; font-size: 12px;">
                                            <div class="apexcharts-tooltip-y-group"><span
                                                    class="apexcharts-tooltip-text-y-label">series-1: </span><span
                                                    class="apexcharts-tooltip-text-y-value">24</span></div>
                                            <div class="apexcharts-tooltip-goals-group"><span
                                                    class="apexcharts-tooltip-text-goals-label"></span><span
                                                    class="apexcharts-tooltip-text-goals-value"></span></div>
                                            <div class="apexcharts-tooltip-z-group"><span
                                                    class="apexcharts-tooltip-text-z-label"></span><span
                                                    class="apexcharts-tooltip-text-z-value"></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="apexcharts-xaxistooltip apexcharts-xaxistooltip-bottom apexcharts-theme-light"
                                    style="left: -11px; top: 185.73px;">
                                    <div class="apexcharts-xaxistooltip-text"
                                        style="font-family: Helvetica, Arial, sans-serif; font-size: 12px; min-width: 0px;">
                                    </div>
                                </div>
                                <div
                                    class="apexcharts-yaxistooltip apexcharts-yaxistooltip-0 apexcharts-yaxistooltip-left apexcharts-theme-light">
                                    <div class="apexcharts-yaxistooltip-text"></div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex justify-content-center pt-4 gap-2">
                            <div class="flex-shrink-0" style="position: relative;">
                                <div id="expensesOfWeek" style="min-height: 57.7px;">
                                    <div id="apexchartss1tiw328k"
                                        class="apexcharts-canvas apexchartss1tiw328k apexcharts-theme-light"
                                        style="width: 60px; height: 57.7px;"><svg id="SvgjsSvg1264" width="60"
                                            height="57.7" xmlns="http://www.w3.org/2000/svg" version="1.1"
                                            xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.dev"
                                            class="apexcharts-svg" xmlns:data="ApexChartsNS" transform="translate(0, 0)"
                                            style="background: transparent;">
                                            <g id="SvgjsG1266" class="apexcharts-inner apexcharts-graphical"
                                                transform="translate(-10, -10)">
                                                <defs id="SvgjsDefs1265">
                                                    <clipPath id="gridRectMasks1tiw328k">
                                                        <rect id="SvgjsRect1268" width="86" height="87" x="-3" y="-1"
                                                            rx="0" ry="0" opacity="1" stroke-width="0" stroke="none"
                                                            stroke-dasharray="0" fill="#fff"></rect>
                                                    </clipPath>
                                                    <clipPath id="forecastMasks1tiw328k"></clipPath>
                                                    <clipPath id="nonForecastMasks1tiw328k"></clipPath>
                                                    <clipPath id="gridRectMarkerMasks1tiw328k">
                                                        <rect id="SvgjsRect1269" width="84" height="89" x="-2" y="-2"
                                                            rx="0" ry="0" opacity="1" stroke-width="0" stroke="none"
                                                            stroke-dasharray="0" fill="#fff"></rect>
                                                    </clipPath>
                                                </defs>
                                                <g id="SvgjsG1270" class="apexcharts-radialbar">
                                                    <g id="SvgjsG1271">
                                                        <g id="SvgjsG1272" class="apexcharts-tracks">
                                                            <g id="SvgjsG1273"
                                                                class="apexcharts-radialbar-track apexcharts-track"
                                                                rel="1">
                                                                <path id="apexcharts-radialbarTrack-0"
                                                                    d="M 40 18.098170731707313 A 21.901829268292687 21.901829268292687 0 1 1 39.99617740968999 18.098171065291247"
                                                                    fill="none" fill-opacity="1"
                                                                    stroke="rgba(236,238,241,0.85)" stroke-opacity="1"
                                                                    stroke-linecap="round"
                                                                    stroke-width="2.0408536585365864"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-radialbar-area"
                                                                    data:pathOrig="M 40 18.098170731707313 A 21.901829268292687 21.901829268292687 0 1 1 39.99617740968999 18.098171065291247">
                                                                </path>
                                                            </g>
                                                        </g>
                                                        <g id="SvgjsG1275">
                                                            <g id="SvgjsG1279"
                                                                class="apexcharts-series apexcharts-radial-series"
                                                                seriesName="seriesx1" rel="1" data:realIndex="0">
                                                                <path id="SvgjsPath1280"
                                                                    d="M 40 18.098170731707313 A 21.901829268292687 21.901829268292687 0 1 1 22.2810479140526 52.873572242130095"
                                                                    fill="none" fill-opacity="0.85"
                                                                    stroke="rgba(105,108,255,0.85)" stroke-opacity="1"
                                                                    stroke-linecap="round"
                                                                    stroke-width="4.081707317073173"
                                                                    stroke-dasharray="0"
                                                                    class="apexcharts-radialbar-area apexcharts-radialbar-slice-0"
                                                                    data:angle="234" data:value="65" index="0" j="0"
                                                                    data:pathOrig="M 40 18.098170731707313 A 21.901829268292687 21.901829268292687 0 1 1 22.2810479140526 52.873572242130095">
                                                                </path>
                                                            </g>
                                                            <circle id="SvgjsCircle1276" r="18.881402439024395" cx="40"
                                                                cy="40" class="apexcharts-radialbar-hollow"
                                                                fill="transparent"></circle>
                                                            <g id="SvgjsG1277" class="apexcharts-datalabels-group"
                                                                transform="translate(0, 0) scale(1)"
                                                                style="opacity: 1;"><text id="SvgjsText1278"
                                                                    font-family="Helvetica, Arial, sans-serif" x="40"
                                                                    y="45" text-anchor="middle" dominant-baseline="auto"
                                                                    font-size="13px" font-weight="400" fill="#697a8d"
                                                                    class="apexcharts-text apexcharts-datalabel-value"
                                                                    style="font-family: Helvetica, Arial, sans-serif;">$65</text>
                                                            </g>
                                                        </g>
                                                    </g>
                                                </g>
                                                <line id="SvgjsLine1281" x1="0" y1="0" x2="80" y2="0" stroke="#b6b6b6"
                                                    stroke-dasharray="0" stroke-width="1" stroke-linecap="butt"
                                                    class="apexcharts-ycrosshairs"></line>
                                                <line id="SvgjsLine1282" x1="0" y1="0" x2="80" y2="0"
                                                    stroke-dasharray="0" stroke-width="0" stroke-linecap="butt"
                                                    class="apexcharts-ycrosshairs-hidden"></line>
                                            </g>
                                            <g id="SvgjsG1267" class="apexcharts-annotations"></g>
                                        </svg>
                                        <div class="apexcharts-legend"></div>
                                    </div>
                                </div>
                                <div class="resize-triggers">
                                    <div class="expand-trigger">
                                        <div style="width: 61px; height: 59px;"></div>
                                    </div>
                                    <div class="contract-trigger"></div>
                                </div>
                            </div>
                            <div>
                                <p class="mb-n1 mt-1">Expenses This Week</p>
                                <small class="text-muted">$39 less than last week</small>
                            </div>
                        </div>
                        <div class="resize-triggers">
                            <div class="expand-trigger">
                                <div style="width: 321px; height: 377px;"></div>
                            </div>
                            <div class="contract-trigger"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

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