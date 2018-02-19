@extends('adminlte::page')

@section('title', 'Deposit')

@section('content_header')
    <h1>Transferencia</h1>
@stop

@section('content')
    <div class="box">
       <div class="box-header">
            <h3>Quem vai receber a transferência</h3>
       </div>
       <div class="box-body">
             @include('admin.alerts.alerts')
           <form method="POST" action="{{route('transfer.store')}}">
               {!! csrf_field() !!}
               <div class="form-group">
                    <input type="text" name="sender" placeholder="Informacao de quem vai receber" class="form-control">
               </div>
               <div class="form-group">
                   <button type="submit" class="btn btn-success">Próxima Etapa</button>
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
 * Time: 16:07
 */
?>