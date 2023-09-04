@extends('layouts.main')
@section('title', 'Listar Ferramentas')
@section('content')
       
    <h1>Listagem de Ferramentas</h1>

    <table>
    <tr>
        <th>Nome</th>
        <th>Marca</th>
        <th>Tipo</th>
        <th>Fornecedor</th>
        <th>Preço</th>
        <th>Quantidade</th>
    </tr>
    @foreach($ferramentas as $ferramenta)
        <tr>
        <td>{{ $ferramenta->nome }}</td>
        <td>{{ $ferramenta->marca }}</td>
        <td>{{ $ferramenta->tipo }}</td>
        <td>{{ $ferramenta->fornecedor }}</td>
        <td>{{ $ferramenta->preco }}</td>
        <td>{{ $ferramenta->qtd }}</td>
        </tr>
    @endforeach
</table>

@endsection