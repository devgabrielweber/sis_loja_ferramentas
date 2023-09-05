@extends('layouts.main')
@section('title', 'Listar Ferramentas')
@section('content')

    <h1>Listagem de Ferramentas</h1>

    <table style="min-width: 50%">
        <tr>
            <th>Nome</th>
            <th>Marca</th>
            <th>Tipo</th>
            <th>Fornecedor</th>
            <th>Preço</th>
            <th>Quantidade</th>
        </tr>
        @foreach ($ferramentas as $ferramenta)
            <tr>
                <td>{{ $ferramenta->nome }}</td>
                <td>{{ $ferramenta->marca }}</td>
                <td>{{ $ferramenta->tipo }}</td>
                <td>{{ $ferramenta->fornecedor }}</td>
                <td>{{ $ferramenta->preco }}</td>
                <td>{{ $ferramenta->qtd }}</td>
                <td><a href={{ route('ferramentas.edit', $ferramenta->id) }}>Editar</a></td>
            </tr>
        @endforeach
    </table>

@endsection
<style>
    td {
        padding: 7;
    }

    tr:nth-child(odd) {
        background-color: #a9d5fa;
    }
</style>
