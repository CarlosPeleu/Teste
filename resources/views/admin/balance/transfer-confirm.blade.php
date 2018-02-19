@extends('adminlte::page')

@section('title', 'Transferir Saldo')

@section('content_header')
    <h1>Confirmar Transferência</h1>
    <ol class="breadcrumb">
        <li><a href="">DashBoard</a></li>
        <li><a href="">saldo</a></li>
        <li><a href="">Transferencia</a></li>
        <li><a href="">Confirmação</a></li>
    </ol>
@stop

@section('content')
    <div class="box">
       <div class="box-header">
            <h3>Confirmar Transferência</h3>
       </div>
       <div class="box-body">
             @include('admin.alerts.alerts')
           <p><strong>Recebedor: </strong>{{$sender->name}}</p>
           <form method="POST" action="{{route('transfer.valor.store')}}">
               {!! csrf_field() !!}
               <div class="form-group">
                    <input type="hidden" name="sender_id"  value="{{$sender->id}}">
                    <input type="text" name="balder" placeholder="Valor" class="form-control">
               </div>
               <div class="form-group">
                   <button type="submit" class="btn btn-success">Transferir</button>
               </div>
           </form>
       </div>
   </div>
@stop
<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 19/02/18
 * Time: 17:27
 */?>