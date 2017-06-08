@extends('site.template.template')

@section('content')

    @if(isset($errors) && count($errors) > 0)
        <div>
            @foreach($errors->all() as $error)
                <p>{{$error}}</p>
            @endforeach
        </div>
    @endif

    <form action="{{route('carros.store')}}" method="post">
        <div class="container">
            {!! csrf_field() !!}

            <div class="campo">
                <label for="placa">Placa:</label>
                <input id="placa" name="placa" type="text" placeholder="AAA-1234" value="{{old('placa')}}">
            </div>
            <div class="campo">
                <label for="modelo">Modelo:</label>
                <input id="modelo" name="modelo" type="text" value="{{old('modelo')}}">
            </div>
            <div class="campo">
                <label for="cor">Cor:</label>
                <input id="cor" name="cor" type="text" value="{{old('cor')}}">
            </div>
        </div>
        <button type="submit" class="botao -ativo -direita">Confirmar entrada</button>
        <button type="reset" class="botao -vermelho -direita">Limpar</button>
    </form>

@endsection