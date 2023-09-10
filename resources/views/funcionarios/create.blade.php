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
            <input type='text' name='nome' value="@if (!empty($funcionario->nome)) {{ $funcionario->nome }}@elseif (!empty(old('nome'))){{ old('nome') }}@else{{ '' }} @endif"required><br><br>

            <label>CPF:</label><br>
            <input type='text' name='cpf' value="@if (!empty($funcionario->cpf)) {{ $funcionario->cpf }}@elseif (!empty(old('cpf'))){{ old('cpf') }}@else{{ '' }} @endif" required><br><br>

            <label>Salario:</label><br>
            <input type='text' name='salario' value="@if (!empty($funcionario->salario)) {{ $funcionario->salario }}@elseif (!empty(old('salario'))){{ old('salario') }}@else{{ '' }} @endif" required><br><br>

            <label>Cargo:</label><br>
            <input type='text' name='cargo' value="@if (!empty($funcionario->cargo)) {{ $funcionario->cargo }}@elseif (!empty(old('cargo'))){{ old('cargo') }}@else{{ '' }} @endif"required><br><br>

            <label>Telefone:</label><br>
            <input type='text' name='telefone' value="@if (!empty($funcionario->telefone)) {{ $funcionario->telefone }}@elseif (!empty(old('telefone'))){{ old('telefone') }}@else{{ '' }} @endif"required><br><br>

            <label>Email:</label><br>
            <input type='text' name='email' value="@if (!empty($funcionario->email)) {{ $funcionario->email }}@elseif (!empty(old('email'))){{ old('email') }}@else{{ '' }} @endif"required><br><br>

            <label>Endereco:</label><br>
            <input type='text' name='endereco' value="@if (!empty($funcionario->endereco)) {{ $funcionario->endereco }}@elseif (!empty(old('endereco'))){{ old('endereco') }}@else{{ '' }} @endif"required><br><br>

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
