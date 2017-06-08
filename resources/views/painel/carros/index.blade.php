<h1>Carro</h1>

<table>
    <tr>
        <th>Placa</th>
        <th>Modelo</th>
        <th>Cor</th>
    </tr>

    @foreach($carros as $carro)
        <tr>
            <td>{{$carro->placa}}</td>
            <td>{{$carro->modelo}}</td>
            <td>{{$carro->cor}}</td>
        </tr>
    @endforeach

</table>