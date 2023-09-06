@extends('layouts.main')
@section('title', 'Cadastrar Ferramenta')
@section('content')

    @php

       // dd($pedido);
        //dd($campos);
        if (isset($pedido)) {
            //entra pro update
            //se $pedido existir
            if (!empty($pedido->id)) {
                //se $pedido->id nao for vazio
                $route = route('pedido.update', $pedido->id); //usa a rota de update
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

        $hj = date('H:i d/m/Y');
@endphp

    <h1>Cadastrar Produtos</h1>
    <form action={{ $route }} method='post'>
        @csrf
        <div class="mb-3">
            <b><label>Pedido n°: </label></b>{{$pedido_dados->id}}<br>
            <b><label>Cliente: </label></b>
            <label>ID: </label>{{$cliente->id}}<br>
            <label>Nome: </label>{{$cliente->nome}}<br>
            <b><label>Data: </label></b>{{$dados->data}}<br>
            <br><b><label for="" class="form-label">Ferramenta: </label></b>
            <select name="cliente" id="">
                @foreach ($ferramentas as $ferramenta)
                    <option value={{ $ferramenta->id }}>{{ $ferramenta->nome }}</option>
                @endforeach
            </select><br><br>

        </div>
        <input type="submit" value="Cadastrar">
    </form>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection
