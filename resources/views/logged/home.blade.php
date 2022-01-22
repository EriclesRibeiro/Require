@extends('layouts.logged.main')
@section('title', 'Require - Bate-Papo')
@section('content')
<!-- 
<div class="nav-hello">Olá, <span>{{$LoggedUserInfo->name}}</span></div>
<div class="row">
    <div class="left-section col-md-6">
        <div class="title">
            <h3>Salas</h3>
        </div>
        @foreach($rooms as $room)
            <div class="room-item box">
                <p>{{ $room->name }}</p>
                <i class="fas fa-sign-in-alt"></i>
            </div>            
        @endforeach
    </div>
    <hr class="r-divisor">
    <div class="box right-section col-md-6">
        <div class="box enter-room">
            <div class="title">
                <h3>Entre em uma sala</h3>
            </div>
            <div class="form-content box">
                <form action="" autocomplete="off">
                    <div class="input-group">
                        <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                        <input type="text" name="name" id="name" placeholder="Name" value="{{ old('name') }}" autocomplete="off">
                        <label for="nome">Nome da sala</label>
                    </div>
                    <div class="input-group">
                        <span class="text-danger">@error('email') {{ $message }} @enderror</span>
                        <input type="password" name="password" id="password" placeholder="password" value="{{ old('password') }}" autocomplete="off">
                        <label for="password">Senha</label>
                    </div>
                    <button type="submit"><span>Entrar<span></button>
                </form>
            </div>
        </div>
    </div>
</div> -->
<div class="r-header"></div>
<div class="nav-menu">
@include('layouts.logged.menu')
</div>
@endsection