@extends('layouts.panel')

@section('content')
<br>
<br>


<div class="content-wrapper">

    
    {{-- <div class="page-header">
        <h3 class="page-title">
            Detalles de venta
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="#">Ventas</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalles de venta</li>
            </ol>
        </nav>
    </div> --}}

    <div class="row">
        <div class="col-12">
            <div class="card">
                @if ($order->statusend && $order->status != 'ENTREGADO')

                <div class="card-footer text-muted">

                <a><form action="{{route('orders.ordercompleted', $order)}}" class=" aceptar" method="POST" style="float: right;">
                @csrf
                <button class="btn w-full" type="submit" style="color:aliceblue; background-color: #3d9970">
                    Entregar Pedido</button>
                </form></a>
                <h4>EL PEDIDO ACTUALMENTE ESTA EN UN ESTADO: {{$order->statusend}}</h4>
                </div>
                <div class="card-footer text-muted">
                </div>
                @else
               
                @endif
                <div class="card-body">
                    <div class="form-group row">
                        <div class="col-md-3 text-center">
                            <label class="form-control-label"><strong>Cliente Interno</strong></label>
                            <p><a href="{{route('employees.show', $order->employees->id)}}">{{$order->employees->name}}</a></p>
                        </div>
                        
                        <div class="col-md-3 text-center">
                            <label class="form-control-label"><strong>Usuario</strong></label>
                            <p>{{$order->user->name}}</p>
                        </div>
                        <div class="col-md-3 text-center">
                            <label class="form-control-label"><strong>Número Pedido</strong></label>
                            <p>{{$order->id}}</p>
                        </div>

                        <div class="col-md-3 text-center">
                            <label class="form-control-label"><strong>Fecha de Entrega</strong></label>
                            <p>{{$order->date_order_delivery}}</p>
                        </div>
                        
                    </div>
                    <br /><br />
                    <div class="form-group">
                        <h4 class="card-title">Detalles de Pedido</h4>
                        <div class="table-responsive col-md-12">
                            <table id="saleDetails" class="table">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Unidad de Medida</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th colspan="4">
                                            <p align="right">TOTAL:</p>
                                        </th>
                                        <th>
                                            <p align="right">{{number_format($order->total,2)}}</p>
                                        </th>
                                    </tr>

                                </tfoot>
                                <tbody>
                                    @foreach($orderDetails as $orderDetail)
                                    <tr>
                                        <td>{{$orderDetail->product->name}}</td>
                                        <td>{{$orderDetail->quantity}}</td>
                                        <td>{{$orderDetail->product->measures->name}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    <a href="{{route('orders.index')}}" class="btn btn-primary float-right">Regresar</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

