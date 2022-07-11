@extends('layouts.layout')

@section('content')
    {{-- Breadcrumb --}}
    @include('layouts.breadcrumb')

    <div class="row justify-content-end">
        <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 col-12 my-3">
            <div class="card">
                <div class="card-body">
                    <!-- /Logo -->
                    <h4 class="mb-2 text-center">Informações do Perfil 😄</h4>
                    <p class="mb-4 text-center">Atualize suas informações de conta e endereço de e-mail</p>
        
                    <form class="mb-3" action="{{route('auth.profile.update')}}" method="POST">
                        @csrf
                        
                        <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">

                        <div class="mb-3">
                            <label for="name" class="form-label">Nome</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{ucfirst(Auth::user()->name)}}" :value="old('name')" placeholder="Nome de usuário" />
                            @error('name')
                                <small class="text-danger fw-bold">{{$message}}</small>   
                            @enderror
                        </div>
        
                        <div class="mb-5">
                            <label for="email" class="form-label">Endereço de E-mail</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{Auth::user()->email}}" :value="old('email')" placeholder="Endereço de e-mail" />
                            @error('email')
                                <small class="text-danger fw-bold">{{$message}}</small>   
                            @enderror
                        </div>
        
                        <div class="mb-0 d-flex justify-content-end">
                            <button class="btn btn-secondary" type="submit">Salvar</button>
                        </div>
                    </form>
        
                </div>
            </div>
        </div>
    </div>

    <div class="row justify-content-end">
        <div class="col-xl-6 col-lg-6 col-md-8 col-sm-10 col-12 my-3">
            <div class="card">
                <div class="card-body">
                    <!-- /Logo -->
                    <h4 class="mb-2 text-center">Atualização de Senha 👾</h4>
                    <p class="mb-4 text-center">Certifique-se de utilizar senhas longas com carateres especiais para maior segurança</p>
        
                    <form id="formAuthentication" class="mb-3" action="{{route('auth.password.update')}}" method="POST">
                        @csrf
                        
                        <input type="hidden" name="user_id" id="user_id" value="{{Auth::user()->id}}">
                        
                        <div class="mb-3 form-password-toggle">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="current_password">Senha Atual</label>
                            </div>
                            <div class="input-group input-group-merge">
                                <input type="password" id="current_password" class="form-control" name="current_password" placeholder="&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;&#xb7;" aria-describedby="current_password" />
                                <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                            </div>
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
                  
        
                        <div class="mb-0 d-flex justify-content-end">
                            <button class="btn btn-secondary" type="submit">Salvar</button>
                        </div>
                    </form>
        
                </div>
            </div>
        </div>
    </div>

@endsection