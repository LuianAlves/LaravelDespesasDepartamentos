@extends('layouts.layout_auth')

@section('content_auth')
<div class="card">
    <div class="card-body">

        <!-- /Logo -->
        <h4 class="mb-2 text-center">Sistema Orçamentário 🤑</h4>
        <p class="mb-4 text-center">Cadastre-se para iniciar seu Orçamento !!</p>

        <form class="mb-3" action="{{route('register')}}" method="POST">
            @csrf

            <div class="mb-3">
                <label for="login" class="form-label">Nome de usuário</label>
                <input type="text" class="form-control" id="name" name="name" :value="old('name')" placeholder="Nome de usuário" autofocus />
                @error('name')
                    <small class="text-danger fw-bold">{{$message}}</small>   
                @enderror
            </div>

            <div class="mb-3">
                <label for="login" class="form-label">Endereço de E-mail</label>
                <input type="text" class="form-control" id="email" name="email" :value="old('email')" placeholder="E-mail" autofocus />
                @error('email')
                    <small class="text-danger fw-bold">{{$message}}</small>   
                @enderror
            </div>

            <div class="mb-3 form-password-toggle">
                <label class="form-label" for="password">Senha</label>
                <div class="input-group input-group-merge">
                    <input type="password" id="password" class="form-control" name="password"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password" autocomplete="current-password" />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
                @error('password')
                    <small class="text-danger fw-bold">{{$message}}</small>   
                @enderror
            </div>
            <div class="mb-3 form-password-toggle">
                <label class="form-label" for="password_confirmation">Confirmar senha</label>
                <div class="input-group input-group-merge">
                    <input type="password" id="password_confirmation" class="form-control" name="password_confirmation"
                        placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;"
                        aria-describedby="password_confirmation" autocomplete="current-password" />
                    <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                </div>
                @error('password_confirmation')
                    <small class="text-danger fw-bold">{{$message}}</small>   
                @enderror
            </div>

            <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" type="submit">Cadastrar</button>
            </div>
        </form>
    </div>
</div>
@endsection