<!DOCTYPE html>
<head>
</head>


<style>
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }
    .stock{
        display: flex;
        flex-direction: row;
        justify-content: space-around;
        padding:20px;
        flex-wrap: wrap;
    }
    .movie{
        border: 2px solid #000000;
        display: flex;
        flex-direction: column;
        align-items: center;

        align-content: center;
        padding: 15px;
        flex-wrap: wrap;
        width: 250px;

    }
    .movie img {
        display: flex;
        width: 180px;
        height: 250px;
        align-self: center;

    }
    .movie h1 {
        text-align: center;
    }
    .movie span {
        color: #333;
        font-weight: 900;
        font-style: italic;
    }
    .movie h4{
        max-width:170px;
        text-align: justify;
        height: auto;
        word-wrap: break-word;
        flex-wrap: wrap;
        overflow: auto;
        font-weight: normal;
        color: rgba(0,0,0, .9)

    }
    .header {
        width: 100vw;
        height: 10vh;
        margin-top: 30px;
        display:flex;
        text-align: center;
        vertical-align: middle;
        align-self: center;
        align-content: center;
        justify-content: center;
    }


    table td {
        text-align: center;
        padding: 15px;
    }
    table tr{
        border: solid 2px #000;
        background-color: #999;
    }
    table tr:nth-child(even) {
        background-color: #ccc;
    }
</style>




<body>
    <div class="header">
        Bem vindo {{ $dados }},

        @if ($dados === "Visitante")
            <form class="login" method="POST" action="{{ route('user_login') }}">
                <input type="text" name="email" placeholder="Usuario">
                <input type="text" name="password" placeholder="Senha">
                <button type="submit">Entrar</button>
            </form>
        @else
            <a href="">Alugados</a>
            <a href="{{ route('user_logout') }}">Sair</a>
        @endif


    </div>
    <table class="table">
        <thead>
            <td>Quantidade</td>
            <td>Nome</td>
            <td>ano</td>
            <td>Remover</td>
        </thead>

    @foreach (session()->get('cart')->items as $movie)
        <tr>
            {{-- {{dd($movie)}} --}}
            <td>{{ $movie['qnt'] }}</td>
            <td>{{ $movie['item']['name'] }}</td>
            <td>{{ $movie['item']['year'] }}</td>
            <td><a href="{{ route('removeOfCart', $movie['item']['id'])}}">Remover</a></td>
        </tr>
    @endforeach
    </table>
    <table style="margin-left: 20px!important">
        <tr >
            <td>TOTAL:</td>
            <td>{{session()->get('cart')->totalQnt}} filmes</td>
            <td>Finalizar pedido</td>
        </tr>
    </table>

</body>

@if(session()->has('message'))
    <script>
        alert( "{{ session()->pull('message') }}");
    </script>
@endif