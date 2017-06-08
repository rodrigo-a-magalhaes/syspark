@extends('site.template.template')

@section('content')

    <form action="{{route('carros.store')}}" method="post">
        <div class="container">
            <input type="hidden" name="_token" value="bQXn3oZKpqRS9uVNJObPJtVPLAHVEuMNhMthNyrw">
            <div class="campo">
                <label for="placa">Placa:</label>
                <input id="placa" name="placa" type="text" placeholder="AAA-1234">
            </div>
            <div class="campo">
                <label for="modelo">Modelo:</label>
                <input id="modelo" name="modelo" type="text">
            </div>
            <div class="campo">
                <label for="cor">Cor:</label>
                <input id="cor" name="cor" type="text">
            </div>
        </div>
        <button type="submit" class="botao -ativo -direita">Confirmar entrada</button>
        <button type="reset" class="botao -vermelho -direita">Limpar</button>
    </form>

@endsection