@extends('layouts.panel')

@section('content')
<div class="middle-content container-xxl p-0">
                    
                    <!-- BREADCRUMB -->
                    <div class="page-meta">
                        {{-- <div class="col text-right"> --}}
                        <a href="{{url('/employees/create')}}" class="btn btn-xm btn-primary"  style="float: right;">Registrar Empleado</a>
                          {{-- </div> --}}
                        <nav class="breadcrumb-style-one" aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Tabla</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Empleados</li>
                            </ol>
                        </nav>

                        
                    </div>

                    
                    <!-- /BREADCRUMB -->
    
                    <div class="row layout-top-spacing">
                    
                        <div class="col-xl-12 col-lg-12 col-sm-12  layout-spacing">
                            <div class="widget-content widget-content-area br-8">
                                <table id="zero-config" class="table table-striped dt-table-hover" style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombres</th>
                                            <th>Apellidos</th>
                                            <th>Tipo Empleado</th>
                                            <th>Area</th>
                                            <th>Télefono</th>
                                            <th>Numero de Documento</th>
                                            <th>Dirección</th>

                                            <th  class="text-center dt-no-sorting">Acciones</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($employees as $employee)
                                            
                                        <tr>
                                            <td>
                                                <div class="d-flex">                                                        
                                                    {{-- <div class="usr-img-frame me-2 rounded-circle">
                                                        <img alt="avatar" class="img-fluid rounded-circle" src="src/assets/img/boy.png">
                                                    </div> --}}
                                                    <p class="align-self-center mb-0 admin-name"> {{$employee->id}} </p>
                                                </div>
                                            </td>
                                            <td>{{$employee->name}}</td>
                                            <td>{{$employee->lastname}}</td>
                                            <td>{{$employee->employeetypes->name}}</td>
                                            <td>{{$employee->areas->name}}</td>
                                            <td>{{$employee->phone}}</td>
                                            <td>{{$employee->numberdocument}}</td>
                                            <td>{{$employee->address}}</td>

                                            <td class="text-center">
                                                <ul class="table-controls">
                                                    <form action="{{route('employees.destroy', $employee)}}" method="POST" class="casino">
                                                        @csrf
                                                        @method('DELETE')
                                                        <a href="{{route('employees.edit',$employee)}}" class="bs-tooltip" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar" data-original-title="Edit"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-edit-2 p-1 br-8 mb-1"><path d="M17 3a2.828 2.828 0 1 1 4 4L7.5 20.5 2 22l1.5-5.5L17 3z"></path></svg></a>

                                                        <button type="submit" class="" style="background-color: none"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-trash p-1 br-8 mb-1">
                                                            <polyline points="3 6 5 6 21 6"></polyline>
                                                            <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                                                        </svg></button>

                                                    </form>
                                                    
                                                    
                                    
                                                </ul>
                                            </td>
                                        </tr>
                                        
                                        @endforeach

                                        
                                    </tbody>
                                    
                                </table>
                            </div>
                        </div>
    
                    </div>
    
</div>    
@endsection

