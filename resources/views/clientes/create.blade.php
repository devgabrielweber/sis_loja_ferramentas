@extends('layouts.main')
@section('title', 'Cadastrar Cliente')
@section('content')
       
    <h1>Cadastrar Cliente</h1>

    <form action='{{ route('cliente.store') }}' method='GET'>
        <label>Nome:</label>
        <input type='text' name='nome'>

        <label>CPF:</label>
        <input type='text' name='cpf'>

        <label>CNPJ:</label>
        <input type='text' name='cnpj'>

        <label>Telefone:</label>
        <input type='text' name='telefone'>

        <label>E-mail:</label>
        <input type='text' name='email'>

        <label>Endereço:</label>
        <input type='text' name='endereco'>

        <input type='submit' value='Ãr fi'>
    </form>

@endsection