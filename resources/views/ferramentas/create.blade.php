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

    <h1>Cadastrar Ferramenta</h1>

    <form action={{ $route }} method='post'>
        @csrf
        @foreach ($campos as $campo)
            <label>{{ $campo }}</label><br>
            <input type="text" name={{ $campo }} placeholder={{ $campo }} value='{{ $valor[$campo] }}'><br>
        @endforeach
        <input type="submit">
    </form>
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

@endsection
