@extends('layouts.panel')

@section('content')
<br>
<br>
<div class="content-wrapper">
    {{-- <div class="page-header">
        <h3 class="page-title">
            Detalles de compra
        </h3>
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Panel administrador</a></li>
                <li class="breadcrumb-item"><a href="#">Compras</a></li>
                <li class="breadcrumb-item active" aria-current="page">Detalles de compra</li>
            </ol>
        </nav>
    </div> --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                   
                    <div class="form-group row">
                        <div class="col-md-4 text-center">
                            <label class="form-control-label" for="nombre"><strong>Proveedor</strong></label>
                            <p>{{$purchase->supliers->name}}</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <label class="form-control-label" for="num_compra"><strong>Número Entrada</strong></label>
                            <p>{{$purchase->id}}</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <label class="form-control-label" for="num_compra"><strong>Usuario</strong></label>
                            <p>{{$purchase->users->name}}</p>
                        </div>
                    </div>
                    <br /><br />
                    <div class="form-group row ">
                        <h4 class="card-title ml-3">Detalles de la Entrada</h4>
                        <div class="table-responsive col-md-12">
                            <table id="detalles" class="table">
                                <thead>
                                    <tr>
                                        <th>Producto</th>
                                        <th>Cantidad</th>
                                        <th>Unidad de Medida</th>
                                        <th>Lote</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <th colspan="3">
                                            <p align="right">TOTAL DE PRODUCTOS ENTRANTES:</p>
                                        </th>
                                        <th>
                                            <p align="right">{{number_format($purchase->total,2)}}</p>
                                        </th>
                                    </tr>
                    
                                </tfoot>
                                <tbody>
                                    @foreach($purchaseDetails as $purchaseDetail)
                                    <tr>
                                        <td>{{$purchaseDetail->products->name }}</td>
                                        <td>{{$purchaseDetail->quantity}}</td>
                                        <td>{{$purchaseDetail->products->measures->name }}</td>
                                        <td>{{$purchaseDetail->price}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    


                </div>
                <div class="card-footer text-muted">
                    <a href="{{route('purchases.index')}}" class="btn btn-primary float-right">Regresar</a>
                </div>
            </div>
        </div>
    </div>

</div>
@endsection

