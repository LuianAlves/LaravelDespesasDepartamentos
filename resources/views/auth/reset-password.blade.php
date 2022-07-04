@extends('layouts.layout_auth')

@section('content_auth')
<div class="card">
    <div class="card-body">
        <h4 class="mb-2 text-center">Esquece a Senha? 🔒</h4>
        <p class="mb-4 text-center">Insira seu e-mail e siga as instruções para recuperar sua senha</p>

        <form class="mb-3" method="POST" action="{{ route('password.update') }}">
            @csrf

            <input type="hidden" name="token" value="{{ $request->route('token') }}">

            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input type="text" class="form-control" id="email" name="email" :value="old('email', $request->email)" placeholder="Entre com seu email" autofocus/>
            </div>

            <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Nova Senha</label>
                </div>
                <div class="input-group input-group-merge">
                    <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
            </div>

            <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                    <label class="form-label" for="password_confirmation">Confirmar Senha</label>
                </div>
                <div class="input-group input-group-merge">
                    <input type="password" id="password_confirmation" class="form-control" name="password_confirmation" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password_confirmation" />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
            </div>

            <button class="btn btn-primary d-grid w-100">Atualizar Senha</button>
        </form>

        <div class="text-center">
            <a href="{{route('login')}}" class="d-flex align-items-center justify-content-center">
                <i class="bx bx-chevron-left scaleX-n1-rtl bx-sm"></i>
                Voltar para Login
            </a>
        </div>

    </div>
</div>
@endsection