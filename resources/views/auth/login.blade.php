@extends('layouts.layout_auth')

@section('content_auth')
<div class="card">
    <div class="card-body">

        <!-- /Logo -->
        <h4 class="mb-2 text-center">Sistema Orçamentário 🤑</h4>
        <p class="mb-4 text-center">Faça Login para iniciar seu Orçamento !!</p>

        <form id="formAuthentication" class="mb-3" action="{{url('https://bgorcamento.herokuapp.com/login')}}"
            method="POST">
            @csrf

            <div class="mb-3">
                <label for="login" class="form-label">E-mail ou Usuário</label>
                <input type="text" class="form-control" id="login" name="login" :value="old('login')"
                    placeholder="Entre com seu email ou usuário" autofocus />
            </div>

            <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Senha</label>
                    <a href="{{ route('password.request') }}">
                        <small>Esqueceu a senha?</small>
                    </a>
                </div>
                <div class="input-group input-group-merge">
                    <input type="password" id="password" class="form-control" name="password"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password" autocomplete="current-password" />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
            </div>

            <div class="mb-3">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember_me" name="remember_me" />
                    <label class="form-check-label" for="remember-me"> Manter Conectado </label>
                </div>
            </div>
            <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" type="submit">Acessar</button>
            </div>
        </form>

    </div>
</div>
@endsection