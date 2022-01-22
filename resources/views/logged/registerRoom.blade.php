@extends('layouts.main')
@section('title', 'Require - Dashboard')
@section('content')
@include('layouts.menu')
<div class="row box">
    <div class="form-content box">
        <form action="{{ route('auth.createRoom') }}" method="POST" autocomplete="off">
            @csrf
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
            <div class="input-group">
                <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                <input type="text" name="name" id="name" placeholder="Name" value="{{ old('name') }}" autocomplete="off">
                <label for="nome">Nome da sala</label>
            </div>
            <div class="input-group">
                <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                <input type="text" name="description" id="description" placeholder="description" value="{{ old('description') }}" autocomplete="off">
                <label for="description">Descrição</label>
            </div>
            <div class="input-group">
                <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                <input type="password" name="password" id="password" placeholder="password" value="{{ old('password') }}" autocomplete="off">
                <label for="password">Senha</label>
            </div>
            <button type="submit"><span>Criar sala<span></button>
        </form>
    </div>
</div>
@endsection