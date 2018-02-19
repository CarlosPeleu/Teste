@if($errors->any())
   <div class="alert alert-warning">
       @foreach( $errors->all() as $error)
           <p>{{$error}}</p>
       @endforeach
   </div>
@endif

@if(session('success'))
    <div class="alert alert-success">
        {{session('success')}}
    </div>
@endif

@if(session('error'))
    <div class="alert alert-danger">
        {{session('error')}}
    </div>
@endif
<?php
/**
 * Created by PhpStorm.
 * User: carlos
 * Date: 19/02/18
 * Time: 11:18
 */