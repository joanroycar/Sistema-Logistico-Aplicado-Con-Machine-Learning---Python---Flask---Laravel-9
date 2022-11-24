@extends('layouts.panel')

@section('content')


<div class="container">
    <div class="row">

    

    <h4 class="mt-5">Editar Rol</h4>
    {!! Form::model($role, ['route' => ['roles.update', $role], 'method' => 'put','files'=>true, 'class'=>'formulario row g-3']) !!}

    {{-- <form class="row g-3"> --}}
        <div class="col-md-12">
            <label for="name" class="form-label">Nombre</label>
            <input type="name" class="form-control" id="name" name="name" value="{{$role->name}}">
            @error('name')
                <span class="text-danger">
                    <strong>{{$message}}</strong>
                </span>
            @enderror  
        </div>

        <strong>Permisos</strong>

        @error('permissions')
            <br>
            <small class="text-danger">
                <strong>{{$message}}</strong>
            </small>
            <br>
        @enderror

        @foreach ($permissions as $permission)
            <div>
                <label>
                    {!! Form::checkbox('permissions[]', $permission->id, null, ['class' => 'mr-1']) !!}
                    {{$permission->description}}
                </label>
            </div>
        @endforeach
        
        <div class="col-12">
            <button type="submit" class="btn btn-primary" style="float: right;">Editar Rol</button>
        </div>
    {!! Form::close() !!}

</div>
</div>



@endsection