<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index()
    {
        $clientes = Cliente::all();
        return view('cliente.list')->with(['clientes' => $clientes]);
    }

    public function create()
    {
        return view('cliente.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:100',
            'cpf' => 'max:14',
            'cnpj' => 'max:14'
        ], [
            'nome.required' => 'O :attribute é obrigatório',

            'nome.max' => ':atributte não pode ser maior que 100 caracteres!',

            'cpf.max' => ':attribute não pode ser maior que 14 caracteres!',
            'cnpj.max' => ':attribute não pode ser maior que 14 caracteres!',
        ]);

        $dados = [
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'cnpj' => $request->cnpj,
            'telefone' => $request->telefone,
            'enail' => $request->email,
            'endereco' => $request->endereco
        ];

        Cliente::create($dados);

        return redirect('cliente')->with('success', 'Cadastrado com Sucesso!');
    }

    public function show()
    {
        //tem que descobrir o que isso faz
    }
    public function edit($id)
    {
        $cliente = Cliente::find($id);
        return view('cliente.form')->with(['cliente' => $cliente]);
    }
    public function update(Request $request)
    {

        $request->validate([
            'nome' => 'required|max:100',
            'cpf' => 'max:14',
            'cnpj' => 'max:14'
        ], [
            'nome.required' => 'O :attribute é obrigatório',

            'nome.max' => ':atributte não pode ser maior que 100 caracteres!',

            'cpf.max' => ':attribute não pode ser maior que 14 caracteres!',
            'cnpj.max' => ':attribute não pode ser maior que 14 caracteres!',
        ]);

        $dados = [
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'cnpj' => $request->cnpj,
            'telefone' => $request->telefone,
            'enail' => $request->email,
            'endereco' => $request->endereco
        ];

        Cliente::updateOrCreate(['id' => $request->id], $dados);

        return redirect('cliente')->with('success', "Atualizado com sucesso!");
    }

    public function destroy($id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->delete();
        return redirect('cliente')->with('success', 'Removido com Sucesso!');
    }
    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $cliente = Cliente::where(
                $request->tipo,
                'like',
                "%" . $request->valor . "%"
            )->get();
        } else {
            $cliente = Cliente::all();
        }

        return view('cliente.list')->with(['clientes' => $cliente]);
    }
}
