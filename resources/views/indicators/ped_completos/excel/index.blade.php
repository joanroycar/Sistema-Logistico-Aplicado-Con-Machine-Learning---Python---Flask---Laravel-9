<table>
    <thead>
        <tr>
            <th>Fecha</th>
            <th>PedidosCorrectamentePreparados</th>
            <th>TotalPedidos</th>
            <th>PPP</th>
        </tr>
    </thead>
    <tbody>
        @foreach($completo as $completos)
        <tr>
            <td>{{$completos->TIEMPO}}</td>
            <td>{{$completos->COMPLETO}}</td>
            <td>{{$completos->TOTALPEDIDOS}}</td>
            <td>{{$completos->COMPLETO / $completos->TOTALPEDIDOS}}</td>
        </tr>
        @endforeach
    </tbody>
</table>