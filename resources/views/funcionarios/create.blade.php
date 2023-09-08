@extends('layouts.main')
@section('title', 'Cadastrar Ferramenta')
@section('content')

    @php
        //dd($funcionario);
        //dd($campos);
        if (isset($funcionario)) {
            //se $funcionario existir
            if (!empty($funcionario->id)) {
                //se $funcionario->id nao for vazio
                $route = route('funcionarios.update', $funcionario->id); //usa a rota de update
            }
        } else {
            $route = route('funcionarios.store'); // use a rota store
            // se funcionario nao existir
        }
    @endphp

    <div class="container d-flex justify-content-center align-items-center flex-wrap">
        <h1 class="container text-center">Cadastrar Funcionario</h1>
        <form action={{ $route }} method='post'>
            @csrf
            <label>Nome:</label><br>
            <input type='text' name='nome'><br><br>

            <label>CPF:</label><br>
            <input type='text' name='cpf'><br><br>

            <label>Salario:</label><br>
            <input type='text' name='salario'><br><br>

            <label>Cargo:</label><br>
            <input type='text' name='cargo'><br><br>

            <label>Telefone:</label><br>
            <input type='text' name='telefone'><br><br>

            <label>Email:</label><br>
            <input type='text' name='email'><br><br>

            <label>Endereco:</label><br>
            <input type='text' name='endereco'><br><br>

            <input type='submit' value='Enviar' class="container text-center">
        </form>
        @if ($errors->any())
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
    </div>
@endsection
