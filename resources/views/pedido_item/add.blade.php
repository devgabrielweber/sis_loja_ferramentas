@extends('layouts.main')
@section('title', 'Cadastrar Ferramenta')
@section('content')

    @php
        use App\http\Controllers\PedidoItemController;
        $route = route('pedido_item.add', [$pedido->id, $total]);
        
    @endphp

    <script>
        $(document).on('submit', 'form', function(e) {
            e.preventDefault();

            // your ajax or whatever put here
        });
    </script>

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
                @if (isset($pedido_id))
                    <option value={{ $ferramenta->id }} @disabled(true)>
                    @else
                        @foreach ($ferramentas as $ferramenta)
                    <option value={{ $ferramenta->id }} @if ($ferramenta->disabled == true) {{ 'disabled' }} @endif>
                        {{ $ferramenta->nome }}</option>
                @endforeach
                @endif
            </select>
            <input type="number" name="qtd"
                value=@if (isset($pedido_item)) {{ $pedido_item->qtd }} @else {{ '' }} @endif>
            <br><br>

            <input type="hidden" name="pedido_id" value={{ $pedido->id }}>
            <input type="submit" value="Adicionar Ferramenta">
            <br><br><label>Total:</label> <input type="number" name="total" value="{{ $total }}"
                disabled><br><br>
    </form>
    <div>
        <h2>
            Ferramentas do pedido:
        </h2>
        <table style="min-width: 50%">
            @csrf
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Marca</th>
                <th>Tipo</th>
                <th>Fornecedor</th>
                <th>Preço</th>
                <th>Quantidade</th>
            </tr>
            @if (isset($ferramentasDoPedido))
                @foreach ($ferramentasDoPedido as $ferramenta)
                    <tr>
                        <td>{{ $ferramenta->id }}</td>
                        <td>{{ $ferramenta->nome }}</td>
                        <td>{{ $ferramenta->marca }}</td>
                        <td>{{ $ferramenta->tipo }}</td>
                        <td>{{ $ferramenta->fornecedor }}</td>
                        <td>{{ $ferramenta->preco }}</td>
                        <td>{{ PedidoItemController::retornaQuantidadeItens($ferramenta, $pedido->id) }}</td>
                    </tr>
                @endforeach
            @endif
        </table>
        <button onclick={{ route('pedido.save') }}>Salvar</button>
    </div>

    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection
