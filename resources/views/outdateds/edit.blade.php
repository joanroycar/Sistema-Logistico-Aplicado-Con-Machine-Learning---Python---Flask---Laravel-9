@extends('layouts.panel')

@section('content')

<div class="container">
       <div class="row">

    <h4 class="mt-5">Editar Producto Obsoleto</h4>

    {!! Form::model($outdated, ['route' => ['outdateds.update', $outdated], 'method' => 'put','files'=>true, 'class'=>'formulario row g-3']) !!}
   
    <div class="col-md-6">
        <label for="name" class="form-label">Producto</label>
        {!! Form::select('product_id', $products, null, ['class' => 'form-control  block w-full mt-1','style'=>'color:white','disabled', 'placeholder'=>'Seleccione Un Producto .....']) !!}                   
        @error('product_id')
            <strong class="text-sm text-red-600">{{$message}}</strong>
        @enderror                   
    </div>
    <div class="col-md-6">
        <label for="name" class="form-label">Stock</label>

        <input type="number" class="form-control" id="stock" name="stock" style="color: white" value="{{$outdated->stock}}">

        @error('stock')
            <strong class="text-sm text-red-600">{{$message}}</strong>
        @enderror   
    </div>
    <div class="col-md-6">
        <label for="name" class="form-label">Cantidad</label>
        <input type="number" class="form-control" id="quantity" name="quantity" style="color: white"  value="{{$outdated->quantity}}">

        @error('quantity')
            <strong class="text-sm text-red-600">{{$message}}</strong>
        @enderror   
    </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary" style="float: right;">Guardar Información</button>
        </div>

    {!! Form::close() !!}

</div>
</div>

@endsection
@section('scripts')

<script>
    function mostrarValores() {
        datosProducto = document.getElementById('product_id').value.split('_');
        $("#price").val(datosProducto[2]);
        $("#stock").val(datosProducto[1]);
    };

    $("#product_id").on('change',mostrarValores);
    
    </script>
{{-- <script>
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
  
  </script>    --}}



@endsection