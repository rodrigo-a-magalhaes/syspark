@extends('painel.carros.template.template')

@section('content')


    @if($car->count() > 0)
        <form action="{{url('/painel/carros/editar')}}" method="post">
            {!! csrf_field() !!}
            @foreach($car as $item)
                <div class="container contSaida">
                    <label class="campo botao -cinzaclaro -left">
                        <input type="radio" name="carro" value="{{$item->id}}">
                        <span class="saidaPlaca">{{$item->placa}}</span>
                        <br>
                        <span class="saidaDesc">- {{$item->modelo}} -<br>- {{$item->cor}} -</span>
                    </label>
                </div>
            @endforeach
            <div class="clear"></div>
            <button type="submit" class="botao -ativo -direita">Confirmar saída</button>
            <button type="reset" class="botao -vermelho -direita">Cancelar</button>
        </form>
    @else
        <h1>Nenhum automóvel estacionado.</h1>
    @endif

@endsection