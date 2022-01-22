@extends('layouts.main')
@section('title', 'Require')
@section('content')
<!--Conteúdo-->
<form method="POST" action="{{ route('auth.create') }}" class="form-login center">
    @csrf
    <div class="r-title">
        <h1 class="title">Login</h1>
        <hr class="bar">
    </div>
    <p>Vamos criar sua conta na Require!</p>
    <p>Já possui uma conta? <span><a href="/">Vamos entrar!</a></span></p>
    <div class="result">
        @if(Session::get('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        
        @if(Session::get('fail'))
            <div class="alert alert-fail">
                {{ Session::get('fail') }}
            </div>
        @endif
    </div>
    <div class="form-content">
        <div class="input-group">
            <span class="text-danger">@error('name') {{ $message }} @enderror</span>
            <input type="text" name="name" id="name" placeholder="Nome" value="{{ old('name') }}">
            <label for="name">Nome completo</label>
        </div>
        <div class="input-group">
            <span class="text-danger">@error('email') {{ $message }} @enderror</span>
            <input type="text" name="email" id="email" placeholder="Email" value="{{ old('email') }}">
            <label for="email">E-mail</label>
        </div>
        <div class="input-group">
            <span class="text-danger">@error('password') {{ $message }} @enderror</span>
            <input type="password" name="password" id="password" placeholder="Password" value="{{ old('password') }}">
            <label for="password">Senha</label>
        </div>
        <div class="btn-container">
            <button class="r-btn" type="submit"><span>Cadastrar</span></button>
        </div>
    </div>
</form>
@endsection