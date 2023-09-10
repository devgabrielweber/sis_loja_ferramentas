@extends('layouts.main')
@section('title', 'Cadastrar Cliente')
@section('content')

    <h1>Cadastrar Cliente</h1>

    <form action='{{ route('cliente.store') }}' method='GET'>
        <label>Nome:</label><br>
        <input type='text' name='nome'><br><br>

        <label>CPF:</label><br>
        <input type='text' name='cpf'><br><br>

        <label>CNPJ:</label><br>
        <input type='text' name='cnpj'><br><br>

        <label>Telefone:</label><br>
        <input type='text' name='telefone'><br><br>

        <label>E-mail:</label><br>
        <input type='text' name='email'><br><br>

        <label>Endereço:</label><br>
        <input type='text' name='endereco'><br><br>

        <input type='submit' value='Enviar'>
    </form>

@endsection