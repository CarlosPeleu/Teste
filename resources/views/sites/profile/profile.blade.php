@extends('sites.layouts.app')

@section('title', 'Perfil')

@section('content')
    <h1>Meu Perfil</h1>
    @if(session('error'))
        <div class="alert alert-danger">
            {{session('error')}}
        </div>
    @elseif(session('success'))
        <div class="alert alert-success">
            {{session('success')}}
        </div>
    @endif
    <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
        {!! csrf_field() !!}
        <div class="form-group">
            <label for="name">Nome</label>
            <input class="form-control" class='form-control'type="text" name="name" value="{{auth()->user()->name}}">
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input class='form-control' type="email" value="{{auth()->user()->email}}" name="email" placeholder="E-mail">
        </div>
        <div class="form-group">
            <label for="senha">Senha</label>
            <input class='form-control' value="" type="password" name="password" autocomplete="new-password">
        </div>
        <div class="form-group">
            @if(auth()->user()->image != null)
                <img src="{{url('storage/users/'.auth()->user()->image)}}"  alt="{{auth()->user()->name}}" style="max-width: 80px">
            @endif
            <label for="image">Imagem</label>
            <input type="file" class="form-control" name="image">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-info">Alterar Perfil</button>
        </div>
    </form>

 @endsection
<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 21/02/18
 * Time: 16:30
 */
?>