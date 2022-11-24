<!DOCTYPE>
<html>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="X-UA-Compatible" content="ie=edge">
<title>Reporte de venta</title>
<style>
    body {
        /*position: relative;*/
        /*width: 16cm;  */
        /*height: 29.7cm; */
        /*margin: 0 auto; */
        /*color: #555555;*/
        /*background: #FFFFFF; */
        font-family: Arial, sans-serif;
        font-size: 14px;
        /*font-family: SourceSansPro;*/
    }


    #datos {
        float: left;
        margin-top: 2%;
        margin-left: 2%;
        margin-right: 2%;
        text-align: left;
    }

    #proveedor {
        text-align: left;
    }

    #encabezado {
        text-align: center;
        margin-left: 35%;
        margin-right: 35%;
        font-size: 15px;
    }

    #fact {
        /*position: relative;*/
        float: right;
        margin-top: 2%;
        margin-left: 2%;
        margin-right: 2%;
        margin-bottom: 2%
        font-size: 20%;
        font-weight: bold;
        padding: 10px;
        color: #FFFFFF;
        background: #D2691E;
    }

    section {
        clear: left;
    }

    #cliente {
        text-align: left;
    }

    #facliente {
        width: 40%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
    }

    #fac,
    #fv,
    #fa {
        color: #FFFFFF;
        font-size: 15px;
    }

    #facliente thead {
        padding: 20px;
        background: #D2691E;
        text-align: left;
        border-bottom: 1px solid #FFFFFF;
    }

    #facvendedor {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
    }

    #facvendedor thead {
        padding: 20px;
        background: #D2691E;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;
    }

    #facproducto {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 15px;
    }

    #facproducto thead {
        padding: 20px;
        background: #D2691E;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;
    }

    #facproducto tbody {
        padding: 20px;
        text-align: center;
    }

</style>

<body>
    <header>
        {{--  <div id="logo">
            <img src="{{asset($company->logo)}}" alt="" id="imagen">
        </div>  --}}
        <div>
            <table id="datos">
                <thead>
                    <tr>
                        <th id="proveedor">DATOS DEL PEDIDO</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <th>
                            <p id="proveedor">
                                USUARIO: {{$order->user->name}}<br>
                            </p>
                            <p id="proveedor">
                                EMAIL: {{$order->user->email}}<br>
                            </p>
                            <p id="proveedor">
                                CLIENTE INTERNO: {{$order->employees->name}}<br>
                            </p>
                            <p id="proveedor">
                                AREA: {{$order->employees->areas->name}}
                            </p>

                            <p id="proveedor">
                                FECHA DE ENTREGA: {{$order->date_order_delivery}}
                            </p>
                        </th>
                    </tr>
                </tbody>
            </table>
        </div>
        <div id="fact">
            {{--  <p>
                {{$order->user->types_identification}}-VENTA
                <br>
                {{$order->user->id}}
            </p>  --}}
            <p>
                NUMERO DE PEDIDO: {{$order->id}}
                {{-- <br> --}}
                
            </p>
        </div>
    </header>
    <br>
    <br>
    <section>
        <div>
            <table id="facproducto">
                <thead>
                    <tr id="fa">
                        <th>CANTIDAD</th>
                        <th>PRODUCTO</th>
                        <th>CATEGORIA</th>
                        <th>UNIDAD DE MEDIDA</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($orderDetails as $orderDetail)
                    <tr>
                        <td>{{$orderDetail->quantity}}</td>
                        <td>{{$orderDetail->product->name}}</td>
                        <td>{{$orderDetail->product->categories->name}}</td>
                        <td>{{$orderDetail->product->measures->name}}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>

                    <tr>
                        <th colspan="4">
                            <p align="right">TOTAL DE PRODUCTOS:</p>
                        </th>
                        <td>
                            <p align="right">{{number_format($order->total,2)}}</p>
                        </td>
                    </tr>

                  
                </tfoot>
            </table>
        </div>
    </section>
    <br>
    <br>
    <footer>
        <!--puedes poner un mensaje aqui-->
        <div id="datos">
            <p id="encabezado">
                {{--  <b>{{$company->name}}</b><br>{{$company->description}}<br>Telefono:{{$company->telephone}}<br>Email:{{$company->email}}  --}}
            </p>
        </div>
    </footer>
</body>

</html>
