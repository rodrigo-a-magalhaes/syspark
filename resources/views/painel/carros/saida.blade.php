@extends('site.template.template')

@section('content')

    <form action="syspark_test/public/saida" method="post">
        <input type="hidden" name="_token" value="bQXn3oZKpqRS9uVNJObPJtVPLAHVEuMNhMthNyrw">
        <div class="container">
            <label class="campo botao -cinzaclaro">
                <input type="radio" name="carro" value="287"> a (a/ab)
            </label>
        </div>
        <button type="submit" class="botao -ativo -direita">Confirmar saída</button>
        <button type="reset" class="botao -vermelho -direita">Cancelar</button>
    </form>

@endsection