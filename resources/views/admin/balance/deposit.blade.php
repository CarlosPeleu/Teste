@extends('adminlte::page')

@section('title', 'Deposit')

@section('content_header')
    <h1>Deposito</h1>
@stop

@section('content')
    <div class="box">
       <div class="box-header">
            <h3>Fazer Recarga</h3>
       </div>
       <div class="box-body">
           <form method="POST" action="{{route('deposit.store')}}">
               {!! csrf_field() !!}
               <div class="form-group">
                    <input type="text" name="vl_recarga" placeholder="Valor Recarga">
               </div>
               <div class="form-group">
                   <button type="submit" class="btn btn-success">Enviar</button>
               </div>
           </form>
       </div>
   </div>
@stop