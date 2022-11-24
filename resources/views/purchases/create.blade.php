@extends('layouts.panel')
@section('title','Registro de compra')

@section('content')
{{-- <div class="content-wrapper"> --}}
    {{-- <div class="page-header">
        <h3 class="page-title">
            Registro de compra
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('purchases.index')}}">Compras</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de compra</li>
            </ol>
        </nav>
    </div> --}}
    <br>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                {!! Form::open(['route'=>'purchases.store', 'method'=>'POST']) !!}
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registro de Entrada</h4>
                    </div>
                    
                    @include('purchases._form')
                     
                     
                </div>
                <div class="card-footer text-muted">
                    <button type="submit" id="guardar" class="btn btn-primary" style=" float:right"> Guardar Información</button>
                     <a href="{{route('purchases.index')}}" class="btn btn-light">
                        Cancelar
                     </a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
{{-- </div> --}}
@endsection

@section('css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
{{-- <link rel="stylesheet" href="{{asset('/path/to/select2.css')}}"> --}}
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@ttskch/select2-bootstrap4-theme@x.x.x/dist/select2-bootstrap4.min.css">

@endsection
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.13/js/select2.min.js" integrity="sha512-2ImtlRlf2VVmiGZsjm9bEyhjGW4dU7B6TNwh/hx/iSByxNENtj3WVE6o/9Lj4TJeVXPi4bnOIMXFIJJAeufa0A==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

@section('scripts')

{{-- <script>
    $(document).ready(function () {
        $('#country').on('change', function () {
            var countryId = this.value;
            $('#product_id').html('');
            $.ajax({
                url: '{{ route('getStatespur') }}?category_id='+countryId,
                type: 'get',
                success: function (res) {
                    $('#product_id').html('<option value="" selected　@if(old('product_id')=='3')selected  @endif>Seleccione un Producto .....</option>');
                    $.each(res, function (key, value) {
                        $('#product_id').append('<option value="' + value
                            .id + '_'+ value.measures.name +'"       >' + value.name + '</option>');
                    });
                    // $('#city').html('<option value="">Select City</option>');
                }
            });
        });
     
    });
</script> --}}

<script>
    $('#country').select2({theme: "bootstrap4"  });
  </script>

<script>
    $('#product_id').select2({theme: "bootstrap4"  });
  </script>

<script>
    $(document).ready(function () {
        $("#agregar").click(function () {
            agregar();
        });
    });
    
    var cont = 0;
    total = 0;
    subtotal = [];
    
    $("#guardar").hide();
    

    function mostrarValores() {
    datosProducto = document.getElementById('product_id').value.split('_');
    $("#unidad").val(datosProducto[1]);
    };

     $("#product_id").on('change',mostrarValores);






    function agregar() {
        datosProducto = document.getElementById('product_id').value.split('_');
        product_id = datosProducto[0];
        producto = $("#product_id option:selected").text();
        quantity = $("#quantity").val();
        price = $("#price").val();
        impuesto = $("#tax").val();
    
        if (product_id != "" && product_id > 0 && quantity != "" && quantity > 0 ) {
            subtotal[cont] = parseInt(quantity);
            total = total + subtotal[cont];
            var fila = '<tr class="selected" id="fila' + cont + '"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont + ');"><i class="fa-solid fa-circle-radiation"> X </i></button></td> <td><input type="hidden" name="product_id[]" value="' + product_id + '">' + producto + '</td><td> <input type="hidden" name="quantity[]" value="' + quantity + '"> <input type="number" value="' + quantity + '" class="form-control" disabled> </td><td> <input type="hidden" name="price[]" value="' + price + '"> <input type="text" value="' + price + '" class="form-control" disabled> </td></tr>';
            cont++;
            limpiar();
            totales();
            evaluar();
            $('#detalles').append(fila);
        } else {
            Swal.fire({
                type: 'error',
                text: 'Rellenar correctamente todos los campos del detalle de la compras',
    
            })
        }
    }
    
    function limpiar() {
        $("#quantity").val("");
        $("#price").val("");
    }
    
    function totales() {
        $("#total_html").html("" + total.toFixed(2));
        $("#total_value").val(total.toFixed(2));
        
        total_impuesto = total * impuesto / 100;
        total_pagar = total + total_impuesto;
        $("#total_impuesto").html("PEN " + total_impuesto.toFixed(2));
        $("#total_pagar_html").html("PEN " + total_pagar.toFixed(2));
        $("#total_pagar").val(total_pagar.toFixed(2));
    }
    
    function evaluar() {
        if (total > 0) {
            $("#guardar").show();
        } else {
            $("#guardar").hide();
        }
    }
    
    function eliminar(index) {
        total = total - subtotal[index];
        total_impuesto = total * impuesto / 100;
        total_pagar_html = total + total_impuesto;
        $("#total").html("PEN" + total);
        $("#total_impuesto").html("PEN" + total_impuesto);
        $("#total_pagar_html").html(total_pagar_html);
        $("#total_pagar").val(total_pagar_html.toFixed(2));
        $("#fila" + index).remove();
        evaluar();
    }
    
</script>
@endsection
