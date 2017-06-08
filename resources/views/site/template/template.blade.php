<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>SYSPARK - {{$title or 'Sistem de estacionamento'}}</title>
    <!-- Styles -->
    <link href="{!! asset('css/syspark.css') !!}" type="text/css" rel="stylesheet"/>
</head>
<body>
<div id="container">
    <header>
        <img src="{!! asset('images/header.jpg') !!}">
    </header>
    <div id="menu">
        <a href="/syspark_test/public/entrada" class="botao {{$active1 or null}}">Entrada</a>
        <a href="/syspark_test/public/saida" class="botao {{$active2 or null}}">Saída</a>
        <a href="/syspark_test/public/relatorio" class="botao {{ $active3 or null}}">Relatório</a>
        <div class="botao -view -cinza -direita">
            ?? vagas disponíveis
        </div>
    </div>
    <div>
        @yield('content')
    </div>
</div>

<script src="{!! asset('js/jquery.js') !!}"></script>
<script src="{!! asset('js/jqueryMask.js') !!}"></script>
<script src="{!! asset('js/mask.js') !!}"></script>
</body>
</html>
