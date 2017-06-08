@extends('painel.carros.template.template')

@section('content')

    @foreach($carros as $carro)
        <div class="container">
            <div class="campo botao -view {{(!empty($carro->saida)? '-offRelatorio' : '-cinza')}} -left">
                <p class="placa">{{$carro->placa}}
                    <span class="delete"><a href="{{route('carros.destroy', 'del/'.$carro->id)}}">X</a></span>
                </p>
                <p class="placaDesc">id: {{$carro->id}}</p>
                <p class="placaDesc">Modelo: {{$carro->modelo}}</p>
                <p class="placaDesc">Cor: {{$carro->cor}}</p>
                <p class="placaDesc">Entrada: {{date("d-m-Y H:m:s",strtotime($carro->entrada))}}</p>
                <p class="placaDesc">
                    Saída: {{(!empty($carro->saida) ? date("d-m-Y H:m:s",strtotime($carro->saida)) : null)}}</p>
            </div>
        </div>

    @endforeach

@endsection