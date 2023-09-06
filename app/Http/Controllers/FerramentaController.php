<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Ferramenta;
use Illuminate\Http\Request;

class FerramentaController extends Controller
{
    public function index()
    {
        $ferramentas = Ferramenta::all(); //carrega todas as ferramentas
        return view('ferramentas.list')->with(['ferramentas' => $ferramentas]); //retorna o list com $ferramentas.
    }

    public function create()
        //passa os parametros para gerara a pagina de create(com base na create)
    {
        $campos = [
            'nome',
            'marca',
            'tipo',
            'fornecedor',
            'preco',
            'qtd'
        ];
        return view('ferramentas.create')->with(['campos'=>$campos]);
        //retorna a view create com $campos
        //nesse caso, create servira para criar um item no bd
    }

    public function store(Request $request)
    {
        //salva os dados no bd
        $request->validate([ //etapa de validacao
            'preco' => 'required',
        ], [
            'preco.required' => 'O :attribute é obrigatório',
        ]);

        $dados = [
            'nome' => $request->nome,
            'marca' => $request->marca,
            'tipo' => $request->tipo,
            'fornecedor' => $request->fornecedor,
            'preco' => $request->preco,
            'qtd' => $request->qtd
        ];
       Ferramenta::create($dados); //cria novo item no bd

        return redirect(route('ferramentas.list')); //redireciona para rota list 
                                                    //(que redireciona para list)
    }

    public function show()
    {
        //tem que descobrir o que isso faz
    }

    public function edit($id)
    {
        //passa os parametros para gerara a pagina de edit(com base na create)
        $campos = [ //idealmente isso aqui seria criado uma vez so, dentro do model ou de um objeto, para que quando alterassemos uma vez, alteraria em todas. mas eu nao faco ideia de como fazer isso.
            'nome',
            'marca',
            'tipo',
            'fornecedor',
            'preco',
            'qtd'
        ];
        $ferramenta = Ferramenta::find($id); //encontra ferramenta com base no id
        return view('ferramentas.create')->with(['ferramenta' => $ferramenta])->with(['campos' => $campos]);
        //retorna a view create com $ferramenta e $campos.
        //nesse caso, create funcionara como update.
    }
    public function update(Request $request)
    {
        //atualiza os dados no db
         $request->validate([ //etapa de validacao
             'preco' => 'required',
         ], [
             'preco.required' => 'O :attribute é obrigatório',
         ]);

        $dados = [
             'nome' => $request->nome,
             'marca' => $request->marca,
             'tipo' => $request->tipo,
             'fornecedor' => $request->fornecedor,
             'preco' => $request->preco
        ];

        Ferramenta::updateOrCreate(['id' => $request->id], $dados); //atualiza o item no db

        return redirect('ferramentas/list')->with('success', "Atualizado com sucesso!"); 
        //redireciona para list
    }

    public function destroy($id)
    { //destroi item com base no id
        $ferramenta = Ferramenta::findOrFail($id); //encontra o item
        $ferramenta->delete(); //deleta o item
        return redirect('ferramentas.list')->with('success', 'Removido com Sucesso!');
        //redireciona para list
    }


    public function search(Request $request) {

        if(!empty($request->valor)){
            $ferramentas = Ferramenta::where(
                $request->campo,
                 'like' ,
                "%". $request->valor."%"
                )->get();
        } else {
            $ferramentas = Ferramenta::all();
        }

        return view('ferramentas.list')->with(['ferramentas'=> $ferramentas]);
    }
}
