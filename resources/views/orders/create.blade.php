@extends('layouts.panel')

@section('content')
{{-- <li class="nav-item d-none d-lg-flex">
    <a class="nav-link" type="button" data-toggle="modal" data-target="#exampleModal-2">
      <span class="btn btn-warning">+ Registrar cliente</span>
    </a>
</li> --}}
<br>
<div class="content-wrapper">
    {{-- <div class="page-header">
        <h3 class="page-title">
            Registro de venta
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="{{route('orders.index')}}">Ventas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Registro de venta</li>
            </ol>
        </nav>
    </div> --}}
    <br>
    <div class="row">
        <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
                {!! Form::open(['route'=>'orders.store', 'method'=>'POST']) !!}
                <div class="card-body">
                    
                    <div class="d-flex justify-content-between">
                        <h4 class="card-title">Registro de Pedido</h4>
                    </div>
                    
                    @include('orders._form')
                     
                     
                </div>
                <div class="card-footer text-muted">
                    <button type="submit" id="guardar" class="btn btn-primary float-right">Registrar</button>
                     <a href="{{route('orders.index')}}" class="btn btn-light">
                        Cancelar
                     </a>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>

{{-- 
<div class="modal fade" id="exampleModal-2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel-2"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel-2">Registro rápido de cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>


            {!! Form::open(['route'=>'employees.store', 'method'=>'POST','files' => true]) !!}


            <div class="modal-body">

                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="helpId" required>
                </div>
                <div class="form-group">
                    <label for="dni">DNI</label>
                    <input type="number" class="form-control" name="dni" id="dni" aria-describedby="helpId" required>
                </div>

                <input type="hidden" name="sale" value="1">

            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-success">Registrar</button>
                <button type="button" class="btn btn-light" data-dismiss="modal">Cancel</button>
            </div>

        {!! Form::close() !!}

        </div>
    </div>
</div> --}}


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

<script>
    $(document).ready(function () {
        $('#country').on('change', function () {
            var countryId = this.value;
            $('#product_id').html('');
            $.ajax({
                url: '{{ route('getStatesOrders') }}?category_id='+countryId,
                type: 'get',
                success: function (res) {
                    $('#product_id').html('<option value="" selected　@if(old('product_id')=='3')selected  @endif>Seleccione un Producto .....</option>');
                    $.each(res, function (key, value) {
                        $('#product_id').append('<option value="' + value
                            .id + '_'+ value.stock +'"       >' + value.name + '</option>');
                    });
                    // $('#city').html('<option value="">Select City</option>');
                }
            });
        });
     
    });
</script>


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

var cont = 1;
total = 0;
subtotal = [];
$("#guardar").hide();

function mostrarValores() {
    datosProducto = document.getElementById('product_id').value.split('_');
    $("#price").val(datosProducto[2]);
    $("#stock").val(datosProducto[1]);
};

$("#product_id").on('change',mostrarValores);






function agregar() {
    datosProducto = document.getElementById('product_id').value.split('_');

    product_id = datosProducto[0];
    producto = $("#product_id option:selected").text();
    quantity = $("#quantity").val();
    discount = $("#discount").val();
    price = $("#price").val();
    stock = $("#stock").val();
    impuesto = $("#tax").val();
    if (product_id != "" && product_id > 0  && quantity != "" && quantity > 0) {
        if (parseInt(stock) >= parseInt(quantity)) {
            subtotal[cont] = parseInt(quantity);
            total = total + subtotal[cont];
            var fila = '<tr class="selected" id="fila' + cont + '"><td><button type="button" class="btn btn-danger btn-sm" onclick="eliminar(' + cont + ');"><i class="fa-solid fa-circle-radiation"> X </i></button></td> <td><input type="hidden" name="product_id[]" value="' + product_id + '">' + producto + '</td><td> <input type="hidden" name="quantity[]" value="' + quantity + '"> <input type="number" value="' + quantity + '" class="form-control" disabled> </td></tr>';
            cont++;
            limpiar();
            totales();
            evaluar();
            $('#detalles').append(fila);
        } else {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'La cantidad a entregar supera el stock.',
            })
        }
    } else {
        Swal.fire({
            icon: 'error',
            title: 'Oops...',
            text: 'Rellene todos los campos del detalle del pedido.',
        })
    }
}
function limpiar() {
    $("#quantity").val("");
    $("#discount").val("0");
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
    $("#total_pagar_html").html("PEN" + total_pagar_html);
    $("#total_pagar").val(total_pagar_html.toFixed(2));
    $("#fila" + index).remove();
    evaluar();
}

</script>

@endsection
