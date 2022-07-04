{{-- <x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <div class="mb-4 text-sm text-gray-600">
            {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a
            password reset link that will allow you to choose a new one.') }}
        </div>

        @if (session('status'))
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ session('status') }}
        </div>
        @endif

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('password.email') }}">
            @csrf

            <div class="block">
                <x-jet-label for="email" value="{{ __('Email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-jet-button>
                    {{ __('Email Password Reset Link') }}
                </x-jet-button>
            </div>
        </form>
    </x-jet-authentication-card>
</x-guest-layout> --}}

@extends('layouts.layout_auth')

@section('content_auth')
<div class="card">
    <div class="card-body">
        <h4 class="mb-2 text-center">Esquece a Senha? 🔒</h4>
        <p class="mb-4 text-center">Insira seu e-mail e siga as instruções para recuperar sua senha</p>

        <form class="mb-3" action="{{ route('password.email') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Insira seu e-mail" autofocus="">
            </div>
            <button class="btn btn-primary d-grid w-100">Enviar Link de Recuperação</button>
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