<?php
   use Illuminate\Support\Str;
//    use Illuminate\Http\Request;

?>
<div class="sidebar-wrapper sidebar-theme">

    <nav id="sidebar">

        <div class="navbar-nav theme-brand flex-row  text-center">
            <div class="nav-logo">
                <div class="nav-item theme-logo">
                    <a href="{{route('dashboard')}}">
                        <img src="{{asset('assets/img/ictevisi.png')}}" alt="logo">
                    </a>
                </div>
                <div class="nav-item theme-text">
                    <a href="{{route('dashboard')}}" class="nav-link"> LOGISTICA </a>
                </div>
            </div>
            <div class="nav-item sidebar-toggle">
                <div class="btn-toggle sidebarCollapse">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevrons-left"><polyline points="11 17 6 12 11 7"></polyline><polyline points="18 17 13 12 18 7"></polyline></svg>
                </div>
            </div>
        </div>
        <div class="shadow-bottom"></div>
        <ul class="list-unstyled menu-categories" id="accordionExample">
            <li class="menu active">
                <a href="#dashboard" data-bs-toggle="collapse" aria-expanded="true" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-home"><path d="M3 9l9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"></path><polyline points="9 22 9 12 15 12 15 22"></polyline></svg>

                        <span>
                            Dashboard</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
                
            </li>

            <li class="menu menu-heading">
                <div class="heading"><svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-minus"><line x1="5" y1="12" x2="19" y2="12"></line></svg><span>Articulos</span></div>
            </li>

            <li class="menu ">
               @can('product.index')
                <a href="#invoice" data-bs-toggle="collapse" aria-expanded="{{ (Request::is('products') || Request::is('categories')||Request::is('measures')||Request::is('supliers') ? 'true' : '') }}" class="dropdown-toggle">
                    <div class="">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-dollar-sign"><line x1="12" y1="1" x2="12" y2="23"></line><path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path></svg>
                        <span>Productos</span>
                    </div>
                    <div>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                    </div>
                </a>
               @endcan
                <ul class="collapse submenu list-unstyled {{ (Request::is('products')||Request::is('categories')||Request::is('measures')||Request::is('supliers') ? 'show' : '') }}" id="invoice" data-bs-parent="#accordionExample">
                    @can('category.index')
                        <li class="{{ (Request::is('categories') ? 'active' : '') }}">

                            <a href="{{route('categories.index')}}"> Tipo Producto </a>
                        </li>
                    @endcan
                    @can('measure.index')
                        <li class="{{ (Request::is('measures') ? 'active' : '') }}">
                            <a href="{{route('measures.index')}}"> Unidad de Medida </a>
                        </li>
                    @endcan
                    @can('product.index')
                        <li class="{{ (Request::is('products') ? 'active' : '') }}">
                            <a href="{{route('products.index')}}"> Producto </a>
                        </li>
                    @endcan
                    @can('suplier.index')
                        <li class="{{ (Request::is('supliers') ? 'active' : '') }}">
                            <a href="{{route('supliers.index')}}"> Proveedores </a>
                        </li> 
                    @endcan                           
                </ul>
            </li>

            <li class="menu ">
                @can('purchases.index')
                    <a href="#ecommerce" data-bs-toggle="collapse" aria-expanded="{{ (Request::is('purchases')|Request::is('purchases/report') ? 'true' : '') }}" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-shopping-cart"><circle cx="9" cy="21" r="1"></circle><circle cx="20" cy="21" r="1"></circle><path d="M1 1h4l2.68 13.39a2 2 0 0 0 2 1.61h9.72a2 2 0 0 0 2-1.61L23 6H6"></path></svg>
                            <span>Mis Entradas</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                    </a>
                @endcan
                <ul class="collapse submenu list-unstyled {{ (Request::is('purchases')||Request::is('purchases/report') ? 'show' : '') }}" id="ecommerce" data-bs-parent="#accordionExample">
                    @can('purchases.index')
                        <li class="{{ (Request::is('purchases') ? 'active' : '') }}">
                            <a href="{{route('purchases.index')}}"> Entradas </a>
                        </li>
                    @endcan
                    @can('purchases.reportpurchase')
                        <li class="{{ (Request::is('purchases/report') ? 'active' : '') }}">
                            <a href="{{route('purchases.report')}}"> Reportes </a>
                        </li>
                    @endcan
                </ul>
            </li>

            <li class="menu">
                @can('orders.index')
                    <a href="#blog" data-bs-toggle="collapse" aria-expanded="{{ ( Request::is('orders')||Request::is('orders/culminated')||Request::is('orders/ontime')||Request::is('orders/untimely')||Request::is('orders/report') ? 'true' : '') }}" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-pen-tool"><path d="M12 19l7-7 3 3-7 7-3-3z"></path><path d="M18 13l-1.5-7.5L2 2l3.5 14.5L13 18l5-5z"></path><path d="M2 2l7.586 7.586"></path><circle cx="11" cy="11" r="2"></circle></svg>
                            <span>Pedidos</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                    </a>
                @endcan
                <ul class="collapse submenu list-unstyled {{ (Request::is('orders') ||Request::is('orders/culminated')||Request::is('orders/ontime')||Request::is('orders/untimely')||Request::is('orders/report') ? 'show' : '') }}" id="blog" data-bs-parent="#accordionExample">
                    @can('orders.index')
                        <li class="{{ (Request::is('orders') ? 'active' : '') }}">
                            <a href="{{route('orders.index')}}"> Lista de Pedidos </a>
                        </li>
                    @endcan

                    @can('orders.culminated')
                        <li class="{{ (Request::is('orders/culminated') ? 'active' : '') }}">
                            <a href="{{route('orders.culminated')}}"> Pedidos Entregados </a>
                        </li>
                    @endcan
                    @can('orders.ontime')
                        <li class="{{ (Request::is('orders/ontime') ? 'active' : '') }}">
                            <a href="{{route('orders.ontime')}}"> Pedidos A Tiempo </a>
                        </li>
                    @endcan
                    @can('orders.untimely')
                        <li class="{{ (Request::is('orders/untimely') ? 'active' : '') }}"> 
                            <a href="{{route('orders.untimely')}}"> Pedido A Destiempo </a>
                        </li> 
                    @endcan     
                    @can('orders.reportorder')
                        <li class="{{ (Request::is('orders/report') ? 'active' : '') }}"> 
                            <a href="{{route('orders.report')}}"> Reportes </a>
                        </li>  
                    @endcan                     

                </ul>
            </li>
            <li class="menu {{ (Request::is('outdateds')||Request::is('outdateds/create') ? 'active' : '') }}">
                @can('outdated.index')
                    <a href="{{route('outdateds.index')}}" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon><line x1="8" y1="2" x2="8" y2="18"></line><line x1="16" y1="6" x2="16" y2="22"></line></svg> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>

                            <span>Obsolescencia</span>
                        </div>
                    </a>
                @endcan
            </li>
            <li class="menu {{ (Request::is('employees') ? 'active' : '') }}">
                @can('employee.index')
                    <a href="{{route('employees.index')}}" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon><line x1="8" y1="2" x2="8" y2="18"></line><line x1="16" y1="6" x2="16" y2="22"></line></svg> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>

                            <span>Empleados</span>
                        </div>
                    </a>
                @endcan
            </li>

            
            <li class="menu {{ (Request::is('roles') ? 'active' : '') }}">
                @can('roles.index')
                    <a href="{{route('roles.index')}}" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon><line x1="8" y1="2" x2="8" y2="18"></line><line x1="16" y1="6" x2="16" y2="22"></line></svg> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"><rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect><path d="M7 11V7a5 5 0 0 1 10 0v4"></path></svg>

                            <span>Roles</span>
                        </div>
                    </a>
                @endcan
            </li>

            <li class="menu {{ (Request::is('areas') ? 'active' : '') }}">
                @can('area.index')
                    <a href="{{route('areas.index')}}" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon><line x1="8" y1="2" x2="8" y2="18"></line><line x1="16" y1="6" x2="16" y2="22"></line></svg> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-layers"><polygon points="12 2 2 7 12 12 22 7 12 2"></polygon><polyline points="2 17 12 22 22 17"></polyline><polyline points="2 12 12 17 22 12"></polyline></svg>

                            <span>Areas</span>
                        </div>
                    </a>
                @endcan
            </li>

            <li class="menu {{ (Request::is('users') ? 'active' : '') }}">
                @can('users.index')
                    <a href="{{route('users.index')}}" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            {{-- <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><polygon points="1 6 1 22 8 18 16 22 23 18 23 2 16 6 8 2 1 6"></polygon><line x1="8" y1="2" x2="8" y2="18"></line><line x1="16" y1="6" x2="16" y2="22"></line></svg> --}}
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-users"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"></path><circle cx="9" cy="7" r="4"></circle><path d="M23 21v-2a4 4 0 0 0-3-3.87"></path><path d="M16 3.13a4 4 0 0 1 0 7.75"></path></svg>

                            <span>Usuarios</span>
                        </div>
                    </a>
                @endcan
            </li>
            <li class="menu">
                @can('indicator.index')
                    <a href="#indicadores" data-bs-toggle="collapse" aria-expanded="{{ ( Request::is('indicators')||Request::is('indicators/tiempo')||Request::is('indicators/completo')||Request::is('orders/untimely')||Request::is('orders/report') ? 'true' : '') }}" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-key"><path d="M21 2l-2 2m-7.61 7.61a5.5 5.5 0 1 1-7.778 7.778 5.5 5.5 0 0 1 7.777-7.777zm0 0L15.5 7.5m0 0l3 3L22 7l-3-3m-3.5 3.5L19 4"></path></svg>
                            <span>Indicadores</span>
                        </div>
                        <div>
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-chevron-right"><polyline points="9 18 15 12 9 6"></polyline></svg>
                        </div>
                    </a>
                @endcan
                <ul class="collapse submenu list-unstyled {{ (Request::is('indicators') ||Request::is('indicators/tiempo')||Request::is('indicators/completo') ? 'show' : '') }}" id="indicadores" data-bs-parent="#accordionExample">
                    @can('indicator.pedidosTiempo')
                        <li class="{{ (Request::is('indicators/tiempo') ? 'active' : '') }}">
                            <a href="{{route('indicators.tiempo')}}"> Reporte Pd. A Tiempo </a>
                        </li>
                    @endcan

                    @can('indicator.pedidosCompletos')
                        <li class="{{ (Request::is('indicators/completo') ? 'active' : '') }}">
                            <a href="{{route('indicators.completo')}}"> Reporte Pd. Completos.</a>
                        </li>
                    @endcan
                    @can('indicator.index')
                        <li class="{{ (Request::is('indicators/obsolescencia') ? 'active' : '') }}">
                            <a href="{{route('indicators.obsolescencia')}}"> Reporte. Obsolescencia </a>
                        </li> 
                    @endcan     
                </ul>
            </li>

            
            <li class="menu {{ (Request::is('predicted') ? 'active' : '') }}">
                @can('predict.index')
                    <a href="{{route('predicted.index')}}" aria-expanded="false" class="dropdown-toggle">
                        <div class="">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-aperture"><circle cx="12" cy="12" r="10"></circle><line x1="14.31" y1="8" x2="20.05" y2="17.94"></line><line x1="9.69" y1="8" x2="21.17" y2="8"></line><line x1="7.38" y1="12" x2="13.12" y2="2.06"></line><line x1="9.69" y1="16" x2="3.95" y2="6.06"></line><line x1="14.31" y1="16" x2="2.83" y2="16"></line><line x1="16.62" y1="12" x2="10.88" y2="21.94"></line></svg>                     


                            <span>Predicciones</span>
                        </div>
                    </a>
                @endcan
            </li>
        </ul>
        
    </nav>

</div>