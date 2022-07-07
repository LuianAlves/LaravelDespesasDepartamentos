@extends('layouts.layout')

@section('content')

{{-- Breadcrumb --}}
@include('layouts.breadcrumb')

{{-- <div class="row">
    <div class="col-lg-8 mb-4 order-0">
        <div class="card">
            <div class="d-flex align-items-end row">
                <div class="col-sm-7">
                    <div class="card-body">
                        <h5 class="card-title text-primary">Congratulations John! 🎉</h5>
                        <p class="mb-4">
                            You have done <span class="fw-bold">72%</span> more sales today. Check your new badge in
                            your profile.
                        </p>

                        <a href="javascript:;" class="btn btn-sm btn-outline-primary">View Badges</a>
                    </div>
                </div>
                <div class="col-sm-5 text-center text-sm-left">
                    <div class="card-body pb-0 px-0 px-md-4">
                        <img src="../assets/img/illustrations/man-with-laptop-light.png" height="140"
                            alt="View Badge User" data-app-dark-img="illustrations/man-with-laptop-dark.png"
                            data-app-light-img="illustrations/man-with-laptop-light.png" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-4 order-1">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="../assets/img/icons/unicons/chart-success.png" alt="chart success"
                                    class="rounded" />
                            </div>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt3" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt3">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Profit</span>
                        <h3 class="card-title mb-2">$12,628</h3>
                        <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +72.80%</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="../assets/img/icons/unicons/wallet-info.png" alt="Credit Card"
                                    class="rounded" />
                            </div>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt6" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt6">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                            </div>
                        </div>
                        <span>Sales</span>
                        <h3 class="card-title text-nowrap mb-1">$4,679</h3>
                        <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.42%</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Total Revenue -->
    <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2 mb-4">
        <div class="card">
            <div class="row row-bordered g-0">
                <div class="col-md-8">
                    <h5 class="card-header m-0 me-2 pb-3">Total Revenue</h5>
                    <div id="totalRevenueChart" class="px-2"></div>
                </div>
                <div class="col-md-4">
                    <div class="card-body">
                        <div class="text-center">
                            <div class="dropdown">
                                <button class="btn btn-sm btn-outline-primary dropdown-toggle" type="button"
                                    id="growthReportId" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false">
                                    2022
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="growthReportId">
                                    <a class="dropdown-item" href="javascript:void(0);">2021</a>
                                    <a class="dropdown-item" href="javascript:void(0);">2020</a>
                                    <a class="dropdown-item" href="javascript:void(0);">2019</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div id="growthChart"></div>
                    <div class="text-center fw-semibold pt-3 mb-2">62% Company Growth</div>

                    <div class="d-flex px-xxl-4 px-lg-2 p-4 gap-xxl-3 gap-lg-1 gap-3 justify-content-between">
                        <div class="d-flex">
                            <div class="me-2">
                                <span class="badge bg-label-primary p-2"><i
                                        class="bx bx-dollar text-primary"></i></span>
                            </div>
                            <div class="d-flex flex-column">
                                <small>2022</small>
                                <h6 class="mb-0">$32.5k</h6>
                            </div>
                        </div>
                        <div class="d-flex">
                            <div class="me-2">
                                <span class="badge bg-label-info p-2"><i class="bx bx-wallet text-info"></i></span>
                            </div>
                            <div class="d-flex flex-column">
                                <small>2021</small>
                                <h6 class="mb-0">$41.2k</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--/ Total Revenue -->
    <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
        <div class="row">
            <div class="col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="../assets/img/icons/unicons/paypal.png" alt="Credit Card" class="rounded" />
                            </div>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt4" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="cardOpt4">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                            </div>
                        </div>
                        <span class="d-block mb-1">Payments</span>
                        <h3 class="card-title text-nowrap mb-2">$2,456</h3>
                        <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i> -14.82%</small>
                    </div>
                </div>
            </div>
            <div class="col-6 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="avatar flex-shrink-0">
                                <img src="../assets/img/icons/unicons/cc-primary.png" alt="Credit Card"
                                    class="rounded" />
                            </div>
                            <div class="dropdown">
                                <button class="btn p-0" type="button" id="cardOpt1" data-bs-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="bx bx-dots-vertical-rounded"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="cardOpt1">
                                    <a class="dropdown-item" href="javascript:void(0);">View More</a>
                                    <a class="dropdown-item" href="javascript:void(0);">Delete</a>
                                </div>
                            </div>
                        </div>
                        <span class="fw-semibold d-block mb-1">Transactions</span>
                        <h3 class="card-title mb-2">$14,857</h3>
                        <small class="text-success fw-semibold"><i class="bx bx-up-arrow-alt"></i> +28.14%</small>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12 mb-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between flex-sm-row flex-column gap-3">
                            <div class="d-flex flex-sm-column flex-row align-items-start justify-content-between">
                                <div class="card-title">
                                    <h5 class="text-nowrap mb-2">Profile Report</h5>
                                    <span class="badge bg-label-warning rounded-pill">Year 2021</span>
                                </div>
                                <div class="mt-sm-auto">
                                    <small class="text-success text-nowrap fw-semibold"><i class="bx bx-chevron-up"></i>
                                        68.2%</small>
                                    <h3 class="mb-0">$84,686k</h3>
                                </div>
                            </div>
                            <div id="profileReportChart"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}

<div class="row">
    <div class="col-12 col-lg-8 order-2 order-md-3 order-lg-2">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title d-flex align-items-start justify-content-between">
                            <div class="flex-shrink-0">
                                <h6 class="text-uppercase">Despesas Totais</h6>
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
            <div class="col-6">
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
                            <h3 class="mb-0"><strong>R$ </strong> <span class="text-muted">{{ str_replace('.', ',',
                                    $soma_metas)
                                    }}</span>
                            </h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between pb-0">
                        <div class="card-title mb-0">
                            <h5 class="m-0 me-2">Departamentos</h5>
                            <small class="text-muted">Total: {{ count($despesas) }}</small>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="chartDepartamentos"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-12 mb-4">
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
    </div>

    <div class="col-12 col-md-8 col-lg-4 order-3 order-md-2">
        <div class="row">
            <div class="col-12 mb-2">
                <div class="card h-100" style="max-height: 100%; overflow-y: auto;">
                    @foreach ($departamentos as $departamento)
                        @php
                            $total_despesa_departamento = App\Models\Despesas\Despesa::where('departamento_id',
                            $departamento->id)->sum('valor_despesa');
                        @endphp


                        @if(!$total_despesa_departamento)
                        @else
                            <div class="card-body border-bottom">
                                <div class="card-title d-flex align-items-start justify-content-between" style="color: rgb(77, 77, 236);">
                                    <p>{{ $departamento->departamento }}</p>
                                    <span>R$ {{str_replace('.', ',', $total_despesa_departamento)}}</span>
                                </div>
                                <div class="mt-4">
                                    <ul class="p-0 m-0">
                                        @php
                                        $despesas = App\Models\Despesas\Despesa::where('departamento_id',
                                        $departamento->id)->orderBy('data_despesa', 'ASC')->limit(2)->get();
                                        @endphp
                                        @foreach ($despesas as $despesa)
                                        <li class="d-flex mb-4 pb-1">
                                            <div
                                                class="d-flex w-100 flex-wrap align-items-center justify-content-between gap-2">
                                                <div class="col-4">
                                                    <small class="text-muted mb-1 d-block text-truncate"
                                                        style="max-width: 200px;">{{
                                                        $despesa->despesa }}</small>
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
                                                        <span class="badge bg-label-danger" style="font-size: 12px;">M</span>
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
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>


<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    let cData = JSON.parse(`<?php echo $data; ?>`);

        // ------------------------------------- Departamento
        // setup
        const data = {
            labels: cData[0].nome_departamento,
            datasets: [{
                label: 'Gasto por Departamentos',
                data: cData[1].valor_despesa,
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
            labels: cData[1].categoria_despesa,
            datasets: [{
                label: 'Gasto por Departamentos',
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
        // config despesas
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
        // render init block
        const cCat = new Chart(
            document.getElementById('chartCatDespesa'),
            config2
        );

</script>
@endsection
