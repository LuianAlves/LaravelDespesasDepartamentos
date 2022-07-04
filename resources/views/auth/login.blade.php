{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div>
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('Password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="block mt-4">
                <label for="remember_me" class="flex items-center">
                    <x-jet-checkbox id="remember_me" name="remember" />
                    <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                </label>
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-jet-button class="ml-4">
                    {{ __('Log in') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}


@extends('layouts.layout_auth')

@section('content_auth')
    <div class="card">
        <div class="card-body">

        <!-- /Logo -->
        <h4 class="mb-2 text-center">Sistema Orçamentário 🤑</h4>
        <p class="mb-4 text-center">Faça Login para iniciar seu Orçamento !!</p>

        <form id="formAuthentication" class="mb-3" action="{{route('login')}}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="login" class="form-label">E-mail ou Usuário</label>
                <input type="text" class="form-control" id="login" name="login" :value="old('login')" placeholder="Entre com seu email ou usuário" autofocus/>
            </div>

            <div class="mb-3 form-password-toggle">
                <div class="d-flex justify-content-between">
                    <label class="form-label" for="password">Senha</label>
                    <a href="{{ route('password.request') }}">
                    <small>Esqueceu a senha?</small>
                    </a>
                </div>
                <div class="input-group input-group-merge">
                    <input type="password" id="password" class="form-control" name="password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="password" autocomplete="current-password" />
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

        <p class="text-center">
            <span>Ainda não tem registro?</span>
            <a href="{{route('register')}}">
                <span>Registrar nova conta</span>
            </a>
        </p>
        </div>
    </div>
@endsection