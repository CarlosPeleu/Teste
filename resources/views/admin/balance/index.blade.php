@extends('adminlte::page')

@section('title', 'Saldo')

@section('content_header')
    <h1>Saldo</h1>
    <ol class="breadcrumb">
        <li><a href="">DashBoard</a></li>
        <li><a href="">saldo</a></li>
    </ol>
@stop

@section('content')
   <div class="box">
       <div class="box-header">
            <a href="{{route('balance.deposit')}}" class="btn btn-primary">Deposito</a>
           @if($amount>0)
            <a href="{{route('balance.withdrawn')}}" class="btn btn-danger">Sacar</a>
            <a href="{{route('balance.transfer')}}" class="btn btn-info">Transferir</a>
           @endif
       </div>
       <div class="box-body">
           @include('admin.alerts.alerts')
           <div class="small-box bg-green">
                <div class="inner">
                  <h3>R${{number_format($amount,2,',','')}}</h3>
                  <p>Bounce Rate</p>
                </div>
                <div class="icon">
                  <i class="ion ion-stats-bars"></i>
                </div>
            <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
           </div>
       </div>
   </div>
@stop<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 16/02/18
 * Time: 10:09
 */
?>