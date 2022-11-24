@extends('layouts.panel')

@section('content')


<div class="container">
    <div class="row">

    

    <h4 class="mt-5">Editar Datos del Usuario</h4>
    {!! Form::model($user, ['route' => ['users.update', $user], 'method' => 'put','files'=>true, 'class'=>'formulario row g-3']) !!}

    {{-- <form class="row g-3"> --}}
        <div class="col-md-12">
            <label for="name" class="form-label">Nombre</label>
            <input type="name" class="form-control" id="name" name="name" value="{{$user->name}}">
            @error('name')
                <strong class="text-sm text-red-600">{{$message}}</strong>
            @enderror  
        </div>

        <div class="col-md-12">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}"> 
            @error('email')
                <strong class="text-sm text-red-600">{{$message}}</strong>
            @enderror 
        </div>

        <div class="col-md-12">
            <label for="password" class="form-label">Contraseña</label>
            <input type="password" class="form-control" id="password" name="password">
            @error('password')
                <strong class="text-sm text-red-600">{{$message}}</strong>
            @enderror  
        </div>
        
        <div class="col-12">
            <button type="submit" class="btn btn-primary" style="float: right;">Editar Usuario</button>
        </div>
    {!! Form::close() !!}

</div>
</div>



@endsection