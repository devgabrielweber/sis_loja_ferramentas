<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ferramenta;

class FerramentaController extends Controller
{
    public function create() {
        return view('ferramentas.create');
    }

    /* FUNÇÃO RESPONSÁVEL POR ENVIAR OS ARQUIVOS DO BANCO PARA A ROTA DE LISTAGEM DAS FERRAMENTAS
    E RETORNÁ-LA PARA A VIEW*/
    public function list() {
        $ferramentas = Ferramenta::all();

        return view('ferramentas.list', ['ferramentas' => $ferramentas]);
    }
}
