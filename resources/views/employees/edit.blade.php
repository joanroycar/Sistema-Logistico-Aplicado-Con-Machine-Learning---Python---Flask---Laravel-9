@extends('layouts.panel')

@section('content')

<div class="container">
       <div class="row">

    <h4 class="mt-5">Editar Empleado</h4>
    {!! Form::model($employee, ['route' => ['employees.update', $employee], 'method' => 'put','files'=>true, 'class'=>'formulario row g-3']) !!}

    <div class="col-md-6">
        <label for="name" class="form-label">Nombres</label>
        <input type="name" class="form-control" id="name" name="name" style="color: white" value="{{$employee->name}}">  
    </div>
    <div class="col-md-6">
        <label for="lastname" class="form-label">Apellidos</label>
        <input type="lastname" class="form-control" id="lastname" name="lastname" style="color: white" value="{{$employee->lastname}}"> 
    </div>
        <div class="col-md-6">
            <label for="name" class="form-label">Area</label>
            {!! Form::select('area_id', $area, null, ['class' => 'form-control  block w-full mt-1','style'=>'color:white', 'placeholder'=>'Seleccione Un Area .....']) !!}                   
        </div>
        <div class="col-md-6">
            <label for="name" class="form-label">Tipo de Empleado</label>
            {!! Form::select('employee_type_id', $employeetype, null, ['class' => 'form-control  block w-full mt-1','style'=>'color:white', 'placeholder'=>'Seleccione Un Tipo de Empleado .....']) !!}                   
        </div>
        <div class="col-md-6">
            <label for="phone" class="form-label">Telefono / Celular</label>
            <input type="text" class="form-control" id="phone" name="phone" value="{{$employee->phone}}" style="color: white"> 
        </div>
        <div class="col-md-6">
            <label for="phone" class="form-label">Fecha Nacimiento</label>
            {!! Form::date('datebirth', null, ['class' => 'form-control ', 'style'=>'color:black; background:white'. ($errors->has('fechaNacimiento') ? ' border-red-600' : '')]) !!}
        </div>
        
        <div class="col-md-6">
            <label for="address" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="address" name="address" value="{{$employee->address}}" style="color: white"> 
        </div>

        <div class="col-md-6">
            <label for="numberdocument" class="form-label">Numero de Documento</label>
            <input type="text" class="form-control" id="numberdocument" name="numberdocument" value="{{$employee->numberdocument}}" style="color: white"> 
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary" style="float: right;">Guardar Información</button>
        </div>

    {!! Form::close() !!}

</div>
</div>

@endsection