@extends('layouts.main')
@section('title', 'Cadastrar Ferramenta')
@section('content')
    @php
        //dd($ferramenta);
        //dd($campos);
        
        $route = route('pedido.store'); // use a rota store
        
        $hj = date('H:i d/m/Y');
    @endphp
    <h1>Cadastrar Pedido</h1>
    <form action={{ $route }} method='post'>
        @csrf
        <div class="mb-3">
            <br><b><label for="" class="form-label">Cliente: </label></b>
            <select name="cliente_id" id="">
                @foreach ($clientes as $cliente)
                    <option value={{ $cliente->id }}>{{ $cliente->nome }}</option>
                @endforeach
            </select><br><br>
            <b><label>Data: </label></b>
            {{ $hj }}
            <input type="hidden" value="{{ $hj }}" name='data'>
            <input type="hidden" value="1" name='total'>
        </div>
        <input type="submit" value="Cadastrar">
    </form>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
@endsection
