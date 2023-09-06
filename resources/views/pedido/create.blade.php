@extends('layouts.main')
@section('title', 'Cadastrar Ferramenta')
@section('content')

    @php
        //dd($ferramenta);
        //dd($campos);
        if (isset($pedido)) {
            //entra pro update
            //se $pedido existir
            if (!empty($pedido->id)) {
                //se $pedido->id nao for vazio
                $route = route('pedido.update', $ferramenta->id); //usa a rota de update
            }
        } else {
            $route = route('pedido.store'); // use a rota store
            // se $pedido nao existir
        }
        
        if (isset($dados)) {
            // se dados exisitr
            $valor = $dados; //$valor = $dados
        }
        if (!isset($nferramentas)) {
            $nferramentas = 1;
        }
    @endphp

    <h1>Cadastrar Pedido</h1>

    <form action={{ $route }} method='post'>
        @csrf
        <div class="mb-3">
            <label for="" class="form-label">Cliente</label>
            <select name="cliente" id="">
                @foreach ($clientes as $cliente)
                    <option value={{ $cliente->id }}>{{ $cliente->nome }}</option>
                @endforeach
            </select><br><br>
            <label>Ferramentas: </label><br>
            @foreach ($ferramentas as $ferramenta)
                {{ $ferramenta->nome }}:<br>
                <label>Quantidade:</label>
                <input type="number" value="{{ $ferramenta->id . '_qtd' }}"><br><br>
            @endforeach
        </div>
    </form>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection
