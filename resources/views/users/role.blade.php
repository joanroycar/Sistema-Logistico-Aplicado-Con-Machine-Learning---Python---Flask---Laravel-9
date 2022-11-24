@extends('layouts.panel')

@section('content')


<div class="container">
    <div class="row">

    

    <h4 class="mt-5">Asignar Rol</h4>
    {!! Form::model($user, ['route' => ['users.updaterole', $user], 'method' => 'put','files'=>true, 'class'=>'formulario row g-3']) !!}

    {{-- <form class="row g-3"> --}}
        <div class="col-md-12">
            <label for="name" class="form-label">Nombre</label>
            <input type="name" class="form-control" id="name" name="name" value="{{$user->name}}" readonly> 
        </div>

        <h1 class="h5">Lista de Roles</h1>
            @error('roles')
                <br>
                <small class="text-danger">
                    <strong>{{$message}}</strong>
                </small>
                <br>
            @enderror

        @foreach ($roles as $rol)
            <div>
                <label >
                    {!! Form::checkbox('roles[]', $rol->id, null, ['class' => 'mr-1']) !!}
                    {{$rol->name}}
                </label>
            </div>
        @endforeach
        
        <div class="col-12">
            <button type="submit" class="btn btn-primary" style="float: right;">Asignar Rol</button>
        </div>
    {!! Form::close() !!}

</div>
</div>



@endsection