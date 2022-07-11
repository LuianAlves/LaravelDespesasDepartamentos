<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{route('dashboard')}}" class="app-brand-link">
            <span class="app-brand-text demo menu-text fw-bolder ms-2">Bongas</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item active">
            <a href="{{route('dashboard')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>


        <!--*************** DIVISOR **************** -->
        <li class="menu-header small text-uppercase"><span class="menu-header-text">Cadastros</span></li>

        <li class="menu-item">
            <a href="{{route('departamento.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-buildings"></i>
                <div data-i18n="Support">Departamentos</div>
            </a>
        </li>

        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-category"></i>
                <div data-i18n="Layouts">Despesas</div>
            </a>

            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{route('categoria-despesa.index')}}" class="menu-link">
                        <div data-i18n="Support">Categoria</div>
                    </a>
                </li>
                @if(App\Models\Despesas\CategoriaDespesa::count() != 0)
                    <li class="menu-item">
                        <a href="{{route('sub-categoria-despesa.index')}}" class="menu-link">
                            <div data-i18n="Support">Sub Categoria</div>
                        </a>
                    </li>
                @endif
            </ul>
        </li>

        
        <li class="menu-item">
            <a href="{{route('metodo-pagamento.index')}}" class="menu-link">
                <i class="menu-icon tf-icons bx bx-money"></i>
                <div data-i18n="Support">Métodos de Pagamento</div>
            </a>
        </li>

        @if(
            App\Models\Departamentos\Departamento::count() != 0 && 
            App\Models\Despesas\CategoriaDespesa::count() != 0 && 
            App\Models\Despesas\SubCategoriaDespesa::count() != 0 &&
            App\Models\Pagamentos\MetodoPagamento::count() != 0
        ) 
            <!--*************** DIVISOR **************** -->
            <li class="menu-header small text-uppercase"><span class="menu-header-text">Despesas</span></li>

            <li class="menu-item">
                <a href="{{route('despesa.index')}}" class="menu-link">
                    <i class="menu-icon tf-icons bx bx-building"></i>
                    <div data-i18n="Support">Orçamento</div>
                </a>
            </li>
        @endif

        
    </ul>
</aside>
