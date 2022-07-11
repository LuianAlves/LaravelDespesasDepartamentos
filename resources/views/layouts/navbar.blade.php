@php
$data = date('m');
$ano_despesa = date('Y');

$id_auth = Auth::id();

$user = App\Models\User::where('id', $id_auth)->first();

$despesas = App\Models\Despesas\DespesaInfo::where('tipo_gasto', 'Meta')->orWhere('tipo_gasto', 'Despesa/Meta')->where('check_data_despesa', $ano_despesa)->get();

@endphp

<nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
    id="layout-navbar">
    <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
            <i class="bx bx-menu bx-sm"></i>
        </a>
    </div>

    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
        <!-- Search -->
        <div class="navbar-nav align-items-center">
            <div class="nav-item d-flex align-items-center">
                <i class="bx bx-search fs-4 lh-0"></i>
                <input type="text" class="form-control border-0 shadow-none" placeholder="Search..."
                    aria-label="Search..." />
            </div>
        </div>
        <!-- /Search -->

        <ul class="navbar-nav flex-row align-items-center ms-auto">
            <!-- Icon de Notificação -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown p-4">
                @if ($data == '07')
                    <a class="nav-link dropdown-toggle hide-arrow" href="#" data-bs-toggle="dropdown">
                        <div class="avatar avatar-online">
                            <i class="bx bx-bell"></i>
                        </div>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end" style="max-height: 300px; overflow-y: auto;">
                        @foreach ($despesas as $info)

                            @php
                                $despesas = App\Models\Despesas\Despesa::where('id', $info->despesa_id)->get();
                            @endphp

                            @foreach ($despesas as $despesa)
                                <li class="dropdown-item">
                                    <div class="d-flex mb-2">
                                        <div class="flex-grow-1">
                                            <span class="fw-semibold d-block">{{ ucwords($despesa->despesa) }}</span>
                                            <small class="text-muted">{{ $despesa->CategoriaDespesa->categoria_despesa }}</small>
                                        </div>
                                    </div>
                                    <span class="align-middle fw-bold me-3">
                                        <span class="text-success">R$ </span>
                                        {{ str_replace('.', ',', $despesa->valor_despesa) }}
                                    </span>

                                    <form id="form1_{{$despesa->id}}" action="{{url('https://pure-crag-59824.herokuapp.com/remove/despesas/'.$despesa->id)}}" method="post">
                                        @csrf
                                        @method('DELETE')
        
                                            <a href="#" onclick="document.getElementById('form1_{{$despesa->id}}').submit()">
                                                <i class="bx bx-message-square-x text-danger me-2"></i>
                                            </a>
                                    </form>

                                    <form id="form_{{$despesa->id}}" action="{{url('https://pure-crag-59824.herokuapp.com/check/despesas/.', $despesa->id)}}" method="post">
                                        @csrf
        
                                            <a href="#" onclick="document.getElementById('form_{{$despesa->id}}').submit()">
                                                <i class="bx bx-message-square-check text-success me-2"></i>
                                            </a>
                                    </form>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                            @endforeach
                        @endforeach
                    </ul>
                @else
                    <i class="bx bx-bell"></i>
                @endif
            </li>

            <!-- User -->
            <li class="nav-item navbar-dropdown dropdown-user dropdown">
                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                    <img src="{{ asset('assets/img/logo.png') }}" alt class="w-px-40 h-auto rounded-circle" />
                </a>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li>
                        <a class="dropdown-item" href="#">
                            <div class="d-flex">
                                <div class="flex-shrink-0 me-3">
                                    <div class="avatar avatar-online">
                                        <img src="{{ asset('assets/img/no-image.png') }}" alt
                                            class="w-px-40 h-auto rounded-circle" />
                                    </div>
                                </div>
                                <div class="flex-grow-1">
                                    <span class="fw-semibold d-block">{{ ucwords($user->name) }}</span>
                                    <small class="text-muted">{{ $user->email }}</small>
                                </div>
                            </div>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    {{-- <li>
                        <a class="dropdown-item" href="#">
                            <i class="bx bx-user me-2"></i>
                            <span class="align-middle">Meu Perfil</span>
                        </a>
                    </li> --}}
                    <li>
                        <a class="dropdown-item" href="{{ route('profile.show') }}">
                            <i class="bx bx-cog me-2"></i>
                            <span class="align-middle">Configurações</span>
                        </a>
                    </li>
                    <li>
                        <div class="dropdown-divider"></div>
                    </li>
                    <li>
                        <a class="dropdown-item" href="{{ route('auth.logout') }}">
                            <i class="bx bx-power-off me-2"></i>
                            <span class="align-middle">Log Out</span>
                        </a>
                    </li>
                </ul>
            </li>
            <!--/ User -->
        </ul>
    </div>
</nav>
