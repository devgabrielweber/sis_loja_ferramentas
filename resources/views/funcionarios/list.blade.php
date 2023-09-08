@extends('layouts.main')
@section('title', 'Listar Ferramentas')
@section('content')


    <div class="container-fluid w-100 align-text-center">
        <h1>Listagem de Funcionarios</h1>
    </div>
    <div class="container-fluid w-100 justify-content-center align-items-center">
        <div class="input-group">
            <div class="container-fluid p-4">
                <form action="{{ route('funcionarios.search') }}" method="get">
                    @csrf
                    <select name="campo">
                        <option value="" selected disabled>Selecione uma opção</option>
                        <option value="id">ID</option>
                        <option value="nome">Nome</option>
                        <option value="cpf">CPF</option>
                        <option value="salario">Salario</option>
                        <option value="cargo">Cargo</option>
                        <option value="telefone">Telefone</option>
                        <option value="email">Email</option>
                        <option value="endereco">Endereço</option>
                    </select>

                    <input type="search" class="form-control rounded" placeholder="Valor a ser buscado" name="valor" />
                    <button type="submit" class="btn btn-outline-primary">Pesquisar</button>
                </form>
            </div>
            <div class="container-fluid justify-content-center align-items-center">
                <table class="container-fluid w-100" style="margin-top: -3%">
                    @csrf
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Salario</th>
                        <th>Cargo</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Endereço</th>
                        <td>Ação</td>
                        <td>Ação</td>
                    </tr>
                    @foreach ($funcionarios as $funcionario)
                        <tr>
                            <td>{{ $funcionario->id }}</td>
                            <td>{{ $funcionario->nome }}</td>
                            <td>{{ $funcionario->cpf }}</td>
                            <td>{{ $funcionario->salario }}</td>
                            <td>{{ $funcionario->cargo }}</td>
                            <td>{{ $funcionario->telefone }}</td>
                            <td>{{ $funcionario->email }}</td>
                            <td>{{ $funcionario->endereco }}</td>
                            <td><a href={{ route('funcionarios.edit', $funcionario->id) }}>Editar</a></td>
                            <td><a href={{ route('funcionarios.destroy', $funcionario->id) }}
                                    onclick="return confirm('Deseja deletar o item?')">Deletar</a></td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>

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
