@extends('layouts.main')
@section('title', 'Cadastrar Ferramenta')
@section('content')


    {{-- Esse eh um form que se monta sozinho. O funcionamento eh bem simples.
        Quando o forms eh invocado pela rota de update, ele recebe duas variaveis:
        $ferramenta e $campos.
        Quando eh chamado pela rota create, ele recebe apenas uma variavel:
        $campos

        $ferramenta contem os dados da ferramenta a serem editados
        $campos contem os campos preenchiveis
    --}}





    @php
        //dd($ferramenta);
        //dd($campos);
        if (isset($ferramenta)) {
            //se $ferramenta existir
            if (!empty($ferramenta->id)) {
                //se $ferramenta->id nao for vazio
                $route = route('ferramentas.update', $ferramenta->id); //usa a rota de update
                foreach ($campos as $campo) {
                    // para cada campo, gere um indice dentro de $dados com o valor de $ferramenta no indice $campo
                    $dados[$campo] = $ferramenta->$campo;
                    //dd($campos);
                }
            }
        } else {
            $route = route('ferramentas.store'); // use a rota store
            // se ferramenta nao existir
        }
        
        if (isset($dados)) {
            // se dados exisitr
            $valor = $dados; //$valor = $dados
        } else {
            // se dados nao exisitr
            foreach ($campos as $campo) {
                //para cada campo, gere um indice em $valor com o valor vazio.
                $valor[$campo] = '';
            }
        }
    @endphp

    <div class="container d-flex justify-content-center align-items-center flex-wrap">
        <h1 class="container text-center">Cadastrar Ferramenta</h1>
        <form action={{ $route }} method='post'>
            @csrf
            <label>Nome:</label><br>
            <input type='text' name='nome'><br><br>

            <label>Marca:</label><br>
            <input type='text' name='marca'><br><br>

            <label>Tipo:</label><br>
            <input type='text' name='tipo'><br><br>

            <label>Fornecedor:</label><br>
            <input type='text' name='fornecedor'><br><br>

            <label>Preço:</label><br>
            <input type='number' name='preco'><br><br>

            <label>Quantidade:</label><br>
            <input type='text' name='qtd'><br><br>

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
