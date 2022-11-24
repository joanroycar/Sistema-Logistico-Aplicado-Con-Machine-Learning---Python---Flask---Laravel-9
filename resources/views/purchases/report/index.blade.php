@extends('layouts.panel')

@section('content')
{{-- <div class="row layout-top-spacing">

<div class="col-xl-4 col-lg-12 col-md-12 col-sm-12 col-12 layout-spacing">

    <div class="card"> 
        <div class="card-body"> 

    <div class="widget widget-chart-two">
        <div class="widget-heading">
            <h5 class="">Sales by Category</h5>
        </div>
        <div class="widget-content">
            <div id="" class="">
                <canvas id="myChart" width="400" height="400"></canvas>

            </div>
        </div>
    </div>
      </div>

      

     </div>

     
</div>
</div> --}}
<br>
<br>
<div class="page-header">
    <h3 class="page-title">

    </h3>
    {{-- <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Panel administrador</a></li> <li class="breadcrumb-item"><a href="#">Asistencia</a></li>
            <li class="breadcrumb-item active" aria-current="page">Mis Asistencias</li>
        </ol>
    </nav> --}}

    <div class="row">




      <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2" style="border-left: 0.25rem solid #3d9970!important">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xm font-weight-bold text-uppercase mb-1" style="color: #4C5755">
                            Total de Entradas</div>
                        <div class="h3 mb-0 font-weight-bold text-gray-800">{{$totalpurchases}}</div>
                    </div>
                    <div class="col-auto">
                        {{-- <i class="fas fa-calendar-alt fa-2x " style="color:white!important"></i> --}}
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>
                    </div>
                </div>
            </div>
        </div>
     </div>


    
    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2" style="border-left: 0.25rem solid #3d9970!important">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xm font-weight-bold text-uppercase mb-1" style="color: #4C5755">
                          Entradas del Mes</div>
                      <div class="h3 mb-0 font-weight-bold text-gray-800">{{$purchases}}</div>
                  </div>
                  <div class="col-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>

                    {{-- <i class="fas fa-calendar-times fa-2x " style="color:#3d9970"></i> --}}
                  </div>
              </div>
          </div>
      </div>
    </div>



    <div class="col-xl-4 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2" style="border-left: 0.25rem solid #3d9970!important">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xm font-weight-bold text-uppercase mb-1" style="color: #4C5755">
                        Total de Productos Entrantes</div>
                      <div class="h3 mb-0 font-weight-bold text-gray-800">{{number_format($total,2)}} </div>
                  </div>
                  <div class="col-auto">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye"><path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path><circle cx="12" cy="12" r="3"></circle></svg>

                  </div>
              </div>
          </div>
      </div>
    </div>


    {{-- <div class="col-xl-3 col-md-6 mb-4">
      <div class="card border-left-primary shadow h-100 py-2" style="border-left: 0.25rem solid #3d9970!important">
          <div class="card-body">
              <div class="row no-gutters align-items-center">
                  <div class="col mr-2">
                      <div class="text-xm font-weight-bold text-uppercase mb-1" style="color: #4C5755">
                        Feriados Del Mes</div>
                      <div class="h3 mb-0 font-weight-bold text-gray-800"></div>
                  </div>
                  <div class="col-auto">

                    <i class="fas fa-address-book	 fa-2x " style="color:#3d9970"></i>
                  </div>
              </div>
          </div>
      </div>
    </div> --}}
  </div>

 <div class="row">
  <div class="col-xl-8 col-lg-7">
    <div class="card shadow mb-4">
        <div
            class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold" style="color: #4C5755">Total De Entradas Por Mes</h6>
            
        </div>
        <div class="card-body">
            <div class="chart-area pt-4 pb-2">
                <canvas id="myChart"></canvas>
            </div>
        </div>
    </div>
   </div>



<div class="col-xl-4 col-lg-5">
  <div class="card shadow mb-4">
      <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
          <h6 class="m-0 font-weight-bold" style="color: #4C5755">ENTRADAS DEL MES CON ESTADOS:</h6>
          
      </div>
      <div class="card-body">
          <div class="chart-pie pt-4 pb-2">
              <canvas id="myChartPai"></canvas>
          </div>
          <br>
      </div>
        
  </div>
</div>


</div>
</div>


@endsection

@section('scripts')

<script>
    $(document).ready(function(){

        const cData = JSON.parse(`<?php echo $data; ?>`)
        console.log(cData);
         
        const ctx = document.getElementById('myChartPai').getContext('2d');
         
        const myChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
            labels:['VALID','CANCELED'],
            datasets: [{
                label: '# De Asistencias',
                data:cData.data,
                backgroundColor: [
                
                    '#4F996B',
                    '#CC5952',
                ],

                borderWidth:1
               
            }]
        },
       

        });


    });

</script>

<script>
    $(document).ready(function(){

        const cData = JSON.parse(`<?php echo $report ; ?>`)
        console.log(cData);
         
        const ctx = document.getElementById('myChart').getContext('2d');
         
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
            labels:["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
            datasets: [{
                label: '# De Total Compras',
                data:cData.report,
                backgroundColor: [
                    '#e1bee7',
                    '#e1bHJH',
                    '#e1bee7',
                    'rgba(255, 99, 132, 0.2)',
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    '#e1bee7',
                    '#e1bHJH',
                    '#e1bee7',
                'rgba(255, 99, 132, 1)',
                'rgba(54, 162, 235, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],

                borderWidth:1
               
            }]
        },
        options: {
            scales: {
                yAxes: {
                    beginAtZero: true
                }
            }
        },

        });


    });

</script>

{{-- <script>
        $(document).ready(function(){

    const ctx = document.getElementById('myChartPai').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'pie',
        data : {
  labels: [
    'Red',
    'Blue',
    'Yellow'
  ],
  datasets: [{
    label: 'My First Dataset',
    data: [300, 50, 100],
    backgroundColor: [
      'rgb(255, 99, 132)',
      'rgb(54, 162, 235)',
      'rgb(255, 205, 86)'
    ],
    hoverOffset: 4
  }]
}
    });
});

</script> --}}
@endsection