<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function create() {
        return view('clientes.create');
    }

    public function list() {
        $clientes = Cliente::all();

        return view('clientes.list', ['clientes' => $clientes]);
    }

    public function search(Request $request) {

        if(!empty($request->valor)){
            $clientes = Cliente::where(
                $request->campo,
                 'like' ,
                "%". $request->valor."%"
                )->get();
        } else {
            $clientes = Cliente::all();
        }

        return view('clientes.list')->with(['clientes'=> $clientes]);
    }

    public function store(Request $request)
    {
        $dados = [
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'cnpj' => $request->cnpj,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'endereco' => $request->endereco
        ];

       Cliente::create($dados); //cria novo item no bd

        return redirect(route('cliente.list')); //redireciona para rota list 
                                                    //(que redireciona para list)
    }
}
