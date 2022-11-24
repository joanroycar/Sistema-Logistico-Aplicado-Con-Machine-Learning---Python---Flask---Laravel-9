@extends('layouts.panel')

@section('content')

        <div class="container">
       <div class="row">


    <h4 class="mt-5">Crear Usuario</h4>
    {!! Form::open(['route' => 'users.store', 'autocomplete' => 'off', 'files' => true, 'class'=>'formulario row g-3']) !!}

        <div class="col-md-12">
            <label for="name" class="form-label">Nombre</label>
            <input type="name" class="form-control" id="name" name="name"> 
            @error('name')
                <strong class="text-sm text-red-600">{{$message}}</strong>
            @enderror 
        </div>

        <div class="col-md-12">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
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
            <button type="submit" class="btn btn-primary" style="float: right;">Crear Usuario</button>
        </div>
    {!! Form::close() !!}

</div>
</div>


@endsection

@section('scripts')
<script>
    $('.formulario').submit(function(e){
        e.preventDefault()
  
        Swal.fire({
          title: 'Estas seguro de guardar?',
          text: "¡No podrás revertir esto!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, Guardar!',
          cancelButtonText: 'Cancelar',
        }).then((result) => {
          if (result.value) {
  
            
            this.submit()
            
          }
        })
  
    })
  
  </script>   
@endsection