@extends('layouts.panel')

@section('content')

        <div class="container">
       <div class="row">


    <h4 class="mt-5">Realizar Prediccion</h4>
    {!! Form::open(['route' => 'predicted.post', 'autocomplete' => 'off', 'files' => true, 'class'=>'formulario row g-3']) !!}

        <div class="col-md-12">
            <label for="name" class="form-label">Cantidad de Meses a Predecir</label>
            <input type="number" class="form-control" id="number" name="number"> 
            @error('name')
                <strong class="text-sm text-red-600">{{$message}}</strong>
            @enderror 
        </div>
       
        <div class="col-12">
            <button type="submit" class="btn btn-primary" style="float: right;">Predecir</button>
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
          title: 'Estas seguro de predecir?',
          text: "¡No podrás revertir esto!",
          icon: 'warning',
          showCancelButton: true,
          confirmButtonColor: '#3085d6',
          cancelButtonColor: '#d33',
          confirmButtonText: 'Si, predecir!',
          cancelButtonText: 'Cancelar',
        }).then((result) => {
          if (result.value) {
  
            
            this.submit()
            
          }
        })
  
    })
  
  </script>   
@endsection