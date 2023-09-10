@extends('layouts.main')
@section('title', 'Menu')
@section('content')

<div class="containerWelcome">

<div class="spacer"></div>
<h1>Túlio Tools</h1>
<h2>O melhor em ferramentas e materiais</h2>

</div>
    

@endsection

<style>
    .containerWelcome {
        background-image: url('/img/tools.jpg');
        background-repeat: no-repeat;
        background-attachment: fixed;  
        background-size: cover;

        height: 100%;
        padding: 3rem;
    }

    .containerWelcome h1, .containerWelcome h2 {
        color: #ffffff;
        text-align: right;
    }

    .containerWelcome h1 {
        font-size: 56px;
        font-weight: bold;
    }

    .spacer {
        width: 100;
        height: 20%;
    }
</style>