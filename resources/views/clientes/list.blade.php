@extends('layouts.main')
@section('title', 'Listar Clientes')
@section('content')
       
    <h1>Listagem de Clientes</h1>

    <table>
    <tr>
        <th>Nome</th>
        <th>CPF</th>
        <th>CNPJ</th>
        <th>Telefone</th>
        <th>E-mail</th>
        <th>Endereço</th>
    </tr>
    @foreach($clientes as $cliente)
        <tr>
        <td>{{ $cliente->nome }}</td>
        <td>{{ $cliente->cpf }}</td>
        <td>{{ $cliente->cnpj }}</td>
        <td>{{ $cliente->telefone }}</td>
        <td>{{ $cliente->email }}</td>
        <td>{{ $cliente->endereco }}</td>
        </tr>
    @endforeach
</table>

@endsection