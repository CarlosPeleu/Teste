@extends('adminlte::page')

@section('title', 'Historic')

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
           <h3>Pesquisa</h3>
           <form method="POST" action="{{route('historic.search')}}" class="form form-inline">
               {!! csrf_field()!!}
                <input type="text" name="id" class="form-control" placeholder="Informe o ID">
                <input type="date" name="date" class="form-control">
                <select name="type" class="form-control">
                    <option value="">Tipo</option>
                    @foreach($types as $key => $type)
                        <option value="{{$key}}">{{$type}}</option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary">Pesquisar</button>
           </form>
           <h3>Histórico</h3>
       </div>
       <div class="box-body">
             @include('admin.alerts.alerts')
               <table class="table table-sm table-bordered table-hover">
                   <thead>
                        <tr>
                          <th scope="col">ID</th>
                          <th scope="col">Type</th>
                          <th scope="col">Saldo</th>
                          <th scope="col">Saldo Ant</th>
                          <th scope="col">Saldo </th>
                          <th scope="col">Transação </th>
                          <th scope="col">Dt. Lançamento </th>
                        </tr>
                   </thead>
                   <tbody>
                   @foreach($historics as $historico)
                        <tr>
                            <td>{{$historico->id}}</td>
                            <td>{{$historico->type($historico->type)}}</td>
                            <td>{{$historico->amout}}</td>
                            <td>{{$historico->total_before}}</td>
                            <td>{{$historico->total_after}}</td>
                            <td>@if($historico->user_id_transaction)
                                    {{$historico->userSender->name}}
                                @else

                            </td>@endif
                            <td>{{$historico->date->format('d/m/Y')}}</td>
                        </tr>
                    @endforeach
                   </tbody>
               </table>
                @if(isset($dataForm))
                    {!! $historics->appends($dataForm)->links() !!}
                @else
                    {!! $historics->links() !!}
                @endif
       </div>
   </div>
@stop
<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 20/02/18
 * Time: 11:49
 */
?>