@extends('layouts.main')
@section('title', 'Require')
@section('content')
<!--Conteúdo-->
<form method="POST" action="{{ route('auth.check') }}" class="form-login center" autocomplete="off">
@csrf
<div class="r-title">
      <h1 class="title">Login</h1>
      <hr class="bar">
  </div>
      <p>Bem vindo! Entra com sua conta para aproveitar tudo o que temos a oferecer.</p>
      <p>Você <span>esqueceu sua senha?</span></p>
      <div class="result">
        @if(Session::get('fail'))
            <div class="alert alert-fail">
                {{ Session::get('fail') }}
            </div>
        @endif
    </div>
      <div class="form-content">
        <div class="input-group">
        <span class="text-danger">@error('email') {{ $message }} @enderror</span>
            <input type="text" name="email" id="email" placeholder="Email" value="{{ old('email') }}" autocomplete="off">
            <label for="email">E-mail</label>
        </div>
        <div class="input-group">
        <span class="text-danger">@error('password') {{ $message }} @enderror</span>
            <input type="password" name="password" id="password" placeholder="Password" value="{{ old('password') }}" autocomplete="off">
            <label for="password">Senha</label>
        </div>
        <div class="btn-container">
          <button class="r-btn" type="submit"><span>Acessar</span></button>
        </div>
        <p>Não possui conta? <span><a href="register">Cadastre-se aqui!</a></span></p>
      </div>
  </form>
@endsection
