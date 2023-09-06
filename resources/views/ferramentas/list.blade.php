@extends('layouts.main')
@section('title', 'Listar Ferramentas')
@section('content')


    <h1>Listagem de Ferramentas</h1>

    <div class="input-group">
        <form action="{{ route('ferramentas.search') }}" method="POST">
            @csrf
            <select name="campo">
                <option value="" selected disabled>Selecione uma opção</option>
                <option value="id">ID</option>
                <option value="nome">Nome</option>
                <option value="marca">Marca</option>
                <option value="tipo">Tipo</option>
                <option value="fornecedor">Fornecedor</option>
                <option value="preco">Preço</option>
                <option value="qtd">Quantidade</option>
            </select>

            <input type="search" class="form-control rounded" placeholder="Valor a ser buscado" aria-label="Search"
                aria-describedby="search-addon" name="valor" />
            <button type="submit" class="btn btn-outline-primary">Pesquisar</button>

        </form>
    </div>

    <table style="min-width: 50%">
        <form action="{{ route('ferramentas.search') }}" method="post">
            @csrf
            <tr>
                <td>{{ $ferramenta->nome }}</td>
                <td>{{ $ferramenta->marca }}</td>
                <td>{{ $ferramenta->tipo }}</td>
                <td>{{ $ferramenta->fornecedor }}</td>
                <td>{{ $ferramenta->preco }}</td>
                <td>{{ $ferramenta->qtd }}</td>
                <td><a href={{ route('ferramentas.edit', $ferramenta->id) }}>Editar</a></td>
                <td><a href=''>Deletar</a></td>
                <td>
                    <label>Pesquisar:</label>
                </td>
                <td>
                    <input type="text" name="search">
                    <button type="submit">Enviar</button>
                </td>
            </tr>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Marca</th>
                <th>Tipo</th>
                <th>Fornecedor</th>
                <th>Preço</th>
                <th>Quantidade</th>
            </tr>
            @foreach ($ferramentas as $ferramenta)
                <tr>
                    <td>{{ $ferramenta->id }}</td>
                    <td>{{ $ferramenta->nome }}</td>
                    <td>{{ $ferramenta->marca }}</td>
                    <td>{{ $ferramenta->tipo }}</td>
                    <td>{{ $ferramenta->fornecedor }}</td>
                    <td>{{ $ferramenta->preco }}</td>
                    <td>{{ $ferramenta->qtd }}</td>
                    <td><a href={{ route('ferramentas.edit', $ferramenta->id) }}>Editar</a></td>
                    <td><a href={{ route('ferramentas.destroy', $ferramenta->id) }}
                            onclick="return confirm('Deseja deletar o item?')">Deletar</a></td>
                </tr>
            @endforeach
        </form>
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
