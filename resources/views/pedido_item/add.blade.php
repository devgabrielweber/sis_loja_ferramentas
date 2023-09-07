@extends('layouts.main')
@section('title', 'Cadastrar Ferramenta')
@section('content')

    @php
        
        $route = route('pedido_item.add'); // use a rota store
    @endphp

    <h1>Cadastrar Produtos</h1>
    <form action={{ $route }} method='post'>
        @csrf
        <div class="mb-3">
            <b><label>Pedido n°: </label></b>{{ $pedido->id }}<br>
            <b><label>Cliente: </label></b><br>
            <label>ID: </label> {{ $cliente->id }}<br>
            <label>Nome: </label> {{ $cliente->nome }}<br>
            <b><label>Data: </label></b> {{ $pedido->data }}<br>
            <br><b><label for="" class="form-label">Ferramenta: </label></b>
            <select name="ferramenta_id" id="">
                @foreach ($ferramentas as $ferramenta)
                    <option value={{ $ferramenta->id }}>{{ $ferramenta->nome }}</option>
                @endforeach
            </select>
            <input type="number" name="qtd">
            <br><br>

            <input type="hidden" name="pedido_id" value={{ $pedido->id }}>
            <input type="submit" value="Adicionar Ferramenta">
    </form>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection
