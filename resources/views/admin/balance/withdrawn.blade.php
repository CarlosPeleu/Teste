@extends('adminlte::page')

@section('title', 'Saque')

@section('content_header')
    <h1>Saque</h1>
@stop

@section('content')
    <div class="box">
       <div class="box-header">
            <h3>Fazer Saque</h3>
       </div>
       <div class="box-body">
             @include('admin.alerts.alerts')
           <form method="POST" action="{{route('withdrawn.store')}}">
               {!! csrf_field() !!}
               <div class="form-group">
                    <input type="text" name="vl_recarga" placeholder="Valor saque">
               </div>
               <div class="form-group">
                   <button type="submit" class="btn btn-success">Enviar</button>
               </div>
           </form>
       </div>
   </div>
@stop<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 19/02/18
 * Time: 15:00
 */
?>