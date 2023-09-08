<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Funcionario;
use Illuminate\Http\Request;

class FuncionarioController extends Controller
{
    public function index()
    {
        $funcionarios = Funcionario::all(); //carrega todas as funcionarios
        return view('funcionarios.list')->with(['funcionarios' => $funcionarios]); //retorna o list com $funcionarios.
    }

    public function create()
        //passa os parametros para gerara a pagina de create(com base na create)
    {
        return view('funcionarios.create');;
        //retorna a view create com $campos
        //nesse caso, create servira para criar um item no bd
    }

    public function store(Request $request)
    {
        //salva os dados no bd
        $dados = [
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'salario' => $request->salario,
            'cargo' => $request->cargo,
            'telefone' => $request->telefone,
            'email' => $request->email,
            'endereco' => $request->endereco
       ];
       Funcionario::create($dados); //cria novo item no bd

        $funcionarios = Funcionario::all();

       return redirect(route('funcionarios.list'))->with(['funcionarios'=>$funcionarios]); //redireciona para rota list
                                                    //(que redireciona para list)
    }

    public function show()
    {
        //tem que descobrir o que isso faz
    }

    public function edit($id)
    {
        //passa os parametros para gerara a pagina de edit(com base na create)

        $funcionario = Funcionario::find($id); //encontra funcionario com base no id
        return view('funcionarios.create')->with(['funcionario' => $funcionario]);
        //retorna a view create com $funcionario e $campos.
        //nesse caso, create funcionara como update.
    }
    public function update(Request $request)
    {
        //atualiza os dados no db
        $dados = [
             'nome' => $request->nome,
             'cpf' => $request->cpf,
             'salario' => $request->salario,
             'cargo' => $request->cargo,
             'telefone' => $request->telefone,
             'email' => $request->email,
             'endereco' => $request->endereco
        ];

        Funcionario::updateOrCreate(['id' => $request->id], $dados); //atualiza o item no db

        return redirect('funcionarios/list')->with('success', "Atualizado com sucesso!");
        //redireciona para list
    }

    public function destroy($id)
    { //destroi item com base no id
        $funcionario = Funcionario::findOrFail($id); //encontra o item
        $funcionario->delete(); //deleta o item
        return redirect('funcionarios/list')->with('success', 'Removido com Sucesso!');
        //redireciona para list
    }
    public function search(Request $request)
    { //falta implementar
        if (!empty($request->valor)) {
            $funcionario = Funcionario::where(
                $request->campo,
                'like',
                "%" . $request->valor . "%"
            )->get();
        } else {
            $funcionarios = Funcionario::all();
        }

        return view('funcionarios.list')->with(['funcionarios' => $funcionario]);
    }
}