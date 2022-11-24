@extends('layouts.panel')

@section('content')
<div class="middle-content container-xxl p-0">


    <br>
    <h4 class="text-center">COEFICIENTE DE OBSOLESCENCIA</h4>
    <!-- /BREADCRUMB -->
  
    <div class="row layout-top-spacing">
        

<br>
<h5 class="text-center"> Coeficiente de obsolescencia =  Total de productos obsoletos / Total de productos mantenidos en inventario.
</h5>

        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
            <div class="widget-content widget-content-area br-8">
                <table id="zero-config" class="table table-striped dt-table-hover" style="width:100%">
                    <thead>
                        <tr>
                            <th class="text-center dt-no-sorting">CATEGORIA</th>
                            <th class="text-center dt-no-sorting">TOTAL DE PRODUCTOS OBSOLETOS</th>
                            {{-- <th class="text-center dt-no-sorting">TOTAL DE PEDIDOS A DESTIEMPO</th> --}}
                            <th class="text-center dt-no-sorting">TOTAL DE PRODUCTOS MANTENIDOS EN INVENTARIO</th>
                            <th class="text-center dt-no-sorting">COEFICIENTE DE OBSOLESCENCIA</th>

                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($outdateds as $outdated)

                        <tr>

                            <td>{{$outdated->categoria}}</td>
                            <td>{{$outdated->Tobsoletos}}</td>
                            {{-- <td>{{$outdated->DESTIEMPO}}</td> --}}
                            <td>{{$outdated->total}}</td>
                            <td>{{$outdated->Tobsoletos / $outdated->total}}</td>




                        </tr>

                        @endforeach


                    </tbody>

                </table>
            </div>
        </div>


    </div>

</div>
@endsection