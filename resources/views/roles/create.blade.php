@extends('layouts.panel')

@section('content')
        <div class="container">
       <div class="row">

    <h4 class="mt-5">Crear Rol</h4>
    {!! Form::open(['route' => 'roles.store', 'autocomplete' => 'off', 'files' => true, 'class'=>'formulario row g-3']) !!}

        <div class="col-md-12">
            <label for="name" class="form-label">Nombre</label>
            <input type="name" class="form-control" id="name" name="name">
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
            <button type="submit" class="btn btn-primary" style="float: right;">Crear Rol</button>
        </div>
    {!! Form::close() !!}

</div>
</div>

{{-- </div> --}}


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