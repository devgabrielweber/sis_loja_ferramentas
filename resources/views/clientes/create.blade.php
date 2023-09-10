@extends('layouts.main')
@section('title', 'Cadastrar Cliente')
@section('content')


    @php
        //dd($cliente);
        //dd($campos);
        if (isset($cliente)) {
            //se $cliente existir
            if (!empty($cliente->id)) {
                //se $cliente->id nao for vazio
                $route = route('clientes.update', $cliente->id); //usa a rota de update
            }
        } else {
            $route = route('clientes.store'); // use a rota store
            // se cliente nao existir
        }
    @endphp


    <div class="container d-flex justify-content-center align-items-center flex-wrap">

    <h1 class="container text-center">Cadastrar Cliente</h1>

    <form action='{{ $route }}' method='GET'>
        <label>Nome:</label><br>
        <input type='text' name='nome' value="@if (!empty($cliente->nome)) {{ $cliente->nome }}@elseif (!empty(old('nome'))){{ old('nome') }}@else{{ '' }} @endif"required><br><br>

        <label>CPF:</label><br>
        <input type='text' name='cpf' value="@if (!empty($cliente->cpf)) {{ $cliente->cpf }}@elseif (!empty(old('cpf'))){{ old('cpf') }}@else{{ '' }} @endif"><br><br>

        <label>CNPJ:</label><br>
        <input type='text' name='cnpj' value="@if (!empty($cliente->cnpj)) {{ $cliente->cnpj }}@elseif (!empty(old('cnpj'))){{ old('cnpj') }}@else{{ '' }} @endif"><br><br>

        <label>Telefone:</label><br>
        <input type='text' name='telefone' value="@if (!empty($cliente->telefone)) {{ $cliente->telefone }}@elseif (!empty(old('telefone'))){{ old('telefone') }}@else{{ '' }} @endif"required><br><br>

        <label>E-mail:</label><br>
        <input type='text' name='email' value="@if (!empty($cliente->email)) {{ $cliente->email }}@elseif (!empty(old('email'))){{ old('email') }}@else{{ '' }} @endif"required><br><br>

        <label>Endereço:</label><br>
        <input type='text' name='endereco' value="@if (!empty($cliente->endereco)) {{ $cliente->endereco }}@elseif (!empty(old('endereco'))){{ old('endereco') }}@else{{ '' }} @endif"required><br><br>

        <input type='submit' value='Enviar'>
    </form>

</div>

@endsection
