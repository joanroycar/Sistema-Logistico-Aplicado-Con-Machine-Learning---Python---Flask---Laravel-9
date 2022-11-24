@extends('layouts.panel')


@section('content')

<div class="row layout-top-spacing">

{{-- @foreach ($response->json() as $item)
    <div>{{ $item['ds'] }}</div>
@endforeach --}}

<div class="page-meta">
    {{-- <div class="col text-right"> --}}
        <a href="{{route('predicted.create')}}" class="btn btn-xm btn-primary" style="float: right;">Realizar Prediccion</a>
        {{--
    </div> --}}
    <nav class="breadcrumb-style-one" aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Resultados</a></li>
            <li class="breadcrumb-item active" aria-current="page">Prediccion</li>
        </ol>
    </nav>


</div>

<div class="row layout-top-spacing">

    <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
        <div class="widget-content widget-content-area br-8">
            <table id="zero-config" class="table table-striped dt-table-hover" style="width:100%">
                <thead>
                    <tr>
                        <th>DS</th>
                        <th>YHAT</th>
                        <th>YHAT_LOWER</th>
                        <th>YHAT_UPPER</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach ($response->json() as $item)
                    <tr>
 
                        <td>
                            
                            {{\Carbon\Carbon::parse($item['ds'])->format('Y-m-d')}}
                        </td>
                        <td>
                            {{round($item['yhat'], 2)}}
                        </td>
                        <td>{{round($item['yhat_lower'], 2)}}</td>
                        <td>
                            {{round($item['yhat_upper'], 2)}}
                        </td>
                    </tr>

                    @endforeach


                </tbody>

            </table>
        </div>
    </div>

</div>



@endsection

@section('scripts')

@endsection