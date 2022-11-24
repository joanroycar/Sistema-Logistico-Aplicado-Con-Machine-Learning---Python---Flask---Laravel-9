<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no">
    <title>Sistema Logistico </title>
    <link rel="icon" type="image/x-icon" href="{{asset('assets/img/ictevisi.png')}}"/>
    <link href="/layouts/vertical-dark-menu/css/light/loader.css" rel="stylesheet" type="text/css" />
    <link href="/layouts/vertical-dark-menu/css/dark/loader.css" rel="stylesheet" type="text/css" />
    <script src="/layouts/vertical-dark-menu/loader.js"></script>

    <!-- BEGIN GLOBAL MANDATORY STYLES -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{asset('/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/layouts/vertical-dark-menu/css/light/plugins.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('/layouts/vertical-dark-menu/css/dark/plugins.css')}}" rel="stylesheet" type="text/css" />
    <!-- END GLOBAL MANDATORY STYLES -->

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM STYLES -->
    <link href="{{asset('/plugins/src/apex/apexcharts.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('src/assets/css/light/dashboard/dash_1.css')}}" rel="stylesheet" type="text/css" />
    <link href="{{asset('src/assets/css/dark/dashboard/dash_1.css')}}" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/plugins/src/table/datatable/datatables.css">
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    
    <link rel="stylesheet" type="text/css" href="{{asset('/plugins/css/light/table/datatable/dt-global_style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('/plugins/css/dark/table/datatable/dt-global_style.css')}}">
    @yield('css')

    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/vega@5"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/vega-lite@5"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/vega-embed@6"></script>
    <script type="text/javascript" src="https://unpkg.com/tabulator-tables@4.9.3/dist/js/tabulator.js"></script>
    <script type="text/javascript" src="https://cdn.bokeh.org/bokeh/release/bokeh-2.4.2.js"></script>
    <script type="text/javascript" src="https://cdn.bokeh.org/bokeh/release/bokeh-widgets-2.4.2.min.js"></script>
    <script type="text/javascript" src="https://cdn.bokeh.org/bokeh/release/bokeh-tables-2.4.2.min.js"></script>
    <script type="text/javascript" src="https://unpkg.com/@holoviz/panel@0.13.0/dist/panel.min.js"></script>
    <script type="text/javascript">
      Bokeh.set_log_level("info");
    </script>
    
    {{-- <script src="/plugins/src/apex/apexcharts.min.js"></script> --}}
    <script src="https://cdn.jsdelivr.net/npm/chart.js@3.9.1/dist/chart.min.js"></script>
    {{-- <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/assets/css/chat.min.css">
    <script>
        var botmanWidget = {
            aboutText: 'ssdsd',
            introMessage: "✋ HOLA! SOY BOTLOGISTICA",
            title:'BotLogistica'
        };
    </script> --}}
  
    {{-- <script src='https://cdn.jsdelivr.net/npm/botman-web-widget@0/build/js/widget.js'></script> --}}
      
</head>
<body class="layout-boxed">
    <!-- BEGIN LOADER -->
    <div id="load_screen"> <div class="loader"> <div class="loader-content">
        <div class="spinner-grow align-self-center"></div>
    </div></div></div>
    <!--  END LOADER -->

    <!--  BEGIN NAVBAR  -->
      @include('layouts.navbar')
    <!--  END NAVBAR  -->

    <!--  BEGIN MAIN CONTAINER  -->
    <div class="main-container" id="container">

        <div class="overlay"></div>
        <div class="search-overlay"></div>

        <!--  BEGIN SIDEBAR  -->
        @include('layouts.sidebar')
        <!--  END SIDEBAR  -->

        <!--  BEGIN CONTENT AREA  -->
        <div id="content" class="main-content">
            <div class="layout-px-spacing">

                @yield('content')

            </div>
            <!--  BEGIN FOOTER  -->
            <div class="footer-wrapper">
                <div class="footer-section f-section-1">
                    <p class="">Copyright © <span class="dynamic-year">2022</span> <a target="_blank" href="https://designreset.com/cork-admin/"><b>Cabaguiverso</b> </a> Derechos Reservados.</p>
                </div>
                <div class="footer-section f-section-2">
                    <p class="">Coded with <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-heart"><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"></path></svg></p>
                </div>
            </div>
            <!--  END FOOTER  -->
        </div>
        <!--  END CONTENT AREA  -->

    </div>
    <!-- END MAIN CONTAINER -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.4.29/dist/sweetalert2.all.min.js"></script>

    @yield('scripts')
    {{-- <script defer src="https://pyscript.net/latest/pyscript.js"></script> --}}

    {{-- <script src="/assets/js/dashboard/dash_1.js"></script> --}}
 <script src="{{asset('src/plugins/src/table/datatable/datatables.js')}}"></script>
    <!-- BEGIN GLOBAL MANDATORY SCRIPTS -->
    <script src="{{asset('/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('/plugins/src/perfect-scrollbar/perfect-scrollbar.min.js')}}"></script>
    <script src="{{asset('/plugins/src/mousetrap/mousetrap.min.js')}}"></script>
    <script src="{{asset('/layouts/vertical-dark-menu/app.js')}}"></script>
    <!-- END GLOBAL MANDATORY SCRIPTS -->
    <script src="{{asset('assets/js/custom.js')}}"></script>

    <!-- BEGIN PAGE LEVEL PLUGINS/CUSTOM SCRIPTS -->
   
 <script>
     $('#zero-config').DataTable({
         "dom": "<'dt--top-section'<'row'<'col-12 col-sm-6 d-flex justify-content-sm-start justify-content-center'l><'col-12 col-sm-6 d-flex justify-content-sm-end justify-content-center mt-sm-0 mt-3'f>>>" +
     "<'table-responsive'tr>" +
     "<'dt--bottom-section d-sm-flex justify-content-sm-between text-center'<'dt--pages-count  mb-sm-0 mb-3'i><'dt--pagination'p>>",
         "language": {

            // "url": "https://cdn.datatables.net/plug-ins/1.10.16/i18n/Spanish.json",
            // "oPaginate":
            // { 
            //  "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
            //  "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' 
            
            // },

            //  "oPaginate": { "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>', "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' },
            //  "sInfo": "Mostrando página _PAGE_ of _PAGES_",
            // "sSearch": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-search"><circle cx="11" cy="11" r="8"></circle><line x1="21" y1="21" x2="16.65" y2="16.65"></line></svg>',
            // "sSearchPlaceholder": "Buscar...",
            // "sLengthMenu": "Resultados :  _MENU_",

            "sProcessing":     "Procesando...",
	"sLengthMenu":     "Mostrar _MENU_ registros",
	"sZeroRecords":    "No se encontraron resultados",
	"sEmptyTable":     "Ningún dato disponible en esta tabla",
	"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
	"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
	"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
	"sInfoPostFix":    "",
	"sSearch":         "Buscar:",
    "sSearchPlaceholder": "Buscar...",

	"sUrl":            "",
	"sInfoThousands":  ",",
	"sLoadingRecords": "Cargando...",
	"oPaginate": {
		"sFirst":    "Primero",
		"sLast":     "Último",
        "sPrevious": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-left"><line x1="19" y1="12" x2="5" y2="12"></line><polyline points="12 19 5 12 12 5"></polyline></svg>',
        "sNext": '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-arrow-right"><line x1="5" y1="12" x2="19" y2="12"></line><polyline points="12 5 19 12 12 19"></polyline></svg>' 
            
	},
	"oAria": {
		"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
		"sSortDescending": ": Activar para ordenar la columna de manera descendente"
	}

            
         },

         "stripeClasses": [],
         "lengthMenu": [5, 10, 20, 50],
         "pageLength": 5 
     });
 </script>
</body>
</html>
