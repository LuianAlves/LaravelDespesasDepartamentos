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