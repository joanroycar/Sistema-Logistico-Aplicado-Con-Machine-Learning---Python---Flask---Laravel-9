<table>
    <thead>
        <tr>
            <th>Fecha</th>
            <th>PEDIDOS ENTREGADOS A TIEMPO</th>
            <th>NUMERO TOTAL DE PEDIDOS</th>
            <th>PET</th>

        </tr>
    </thead>
    <tbody>
        @foreach($tiempo as $tiempos)
        <tr>
            <td>{{$tiempos->TIEMPO}}</td>
            <td>{{$tiempos->TEMPRANO}}</td>
            <td>{{$tiempos->TOTALPEDIDOS}}</td>
            <td>{{$tiempos->TEMPRANO / $tiempos->TOTALPEDIDOS}}</td>


        </tr>
        @endforeach
    </tbody>
</table>