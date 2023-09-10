@extends('layouts.main')
@section('title', 'Listar Clientes')
@section('content')

    <h1>Listagem de Clientes</h1>


    <div class="input-group d-flex ">
        <form action="{{ route('cliente.search') }}" method="get">
            @csrf
            <select name="campo">
                <option value="" selected disabled>Selecione uma opção</option>
                <option value="id">ID</option>
                <option value="nome">Nome</option>
                <option value="cpf">CPF</option>
                <option value="cnpj">CNPJ</option>
                <option value="telefone">Telefone</option>
                <option value="email">E-mail</option>
                <option value="endereco">Endereço</option>
            </select>

            <input type="search" class="form-control rounded" placeholder="Valor a ser buscado" aria-label="Search"
                aria-describedby="search-addon" name="valor" />
            <button type="submit" class="btn btn-outline-primary">Pesquisar</button>

        </form>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>CPF</th>
            <th>CNPJ</th>
            <th>Telefone</th>
            <th>E-mail</th>
            <th>Endereço</th>
            <th>Ação</th>
            <th>Ação</th>
        </tr>
        @foreach ($clientes as $cliente)
            <tr>
                <td>{{ $cliente->id }}</td>
                <td>{{ $cliente->nome }}</td>
                <td>{{ $cliente->cpf }}</td>
                <td>{{ $cliente->cnpj }}</td>
                <td>{{ $cliente->telefone }}</td>
                <td>{{ $cliente->email }}</td>
                <td>{{ $cliente->endereco }}</td>
                <td><a href={{ route('clientes.edit', $cliente->id) }}>Editar</a></td>
                <td><a href={{ route('clientes.edit', $cliente->id) }}>Deletar</a></td>
            </tr>
        @endforeach
    </table>

@endsection

<style>
    h1 {
        text-align: center;
    }

    table {
        margin: 5rem auto;
    }

    td {
        padding: 7;
    }

    tr:nth-child(odd) {
        background-color: #a9d5fa;
    }

    .input-group {
        margin: 0 auto;
        padding: 0 30rem;
    }
</style>
