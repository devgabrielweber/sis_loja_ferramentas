<?php

namespace App\Http\Controllers;

use App\Models\Ferramenta;
use Illuminate\Http\Request;

class FerramentaController extends Controller
{
    public function index()
    {
        $ferramentas = Ferramenta::all();
        return view('ferramenta.list')->with(['ferramentas' => $ferramentas]);
    }

    public function create()
    {
        return view('ferramenta.form');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|max:100',
            'preco' => 'required',
        ], [
            'nome.required' => 'O :attribute é obrigatório',

            'nome.max' => ':atributte não pode ser maior que 100 caracteres!',

            'preco.required' => ':attribute é obrigatório'
        ]);

        $dados = [
            'nome' => $request->nome,
            'marca' => $request->marca,
            'tipo' => $request->tipo,
            'fornecedor' => $request->fornecedor,
            'preco' => $request->preco
        ];

        Ferramenta::create($dados);

        return redirect('ferramenta')->with('success', 'Cadastrado com Sucesso!');
    }

    public function show()
    {
        //tem que descobrir o que isso faz
    }
    public function edit($id)
    {
        $ferramenta = Ferramenta::find($id);
        return view('ferramenta.form')->with(['ferramenta' => $ferramenta]);
    }
    public function update(Request $request)
    {

        $request->validate([
            'nome' => 'required|max:100',
            'preco' => 'required',
        ], [
            'nome.required' => 'O :attribute é obrigatório',

            'nome.max' => ':atributte não pode ser maior que 100 caracteres!',

            'preco.required' => ':attribute é obrigatório'
        ]);

        $dados = [
            'nome' => $request->nome,
            'marca' => $request->marca,
            'tipo' => $request->tipo,
            'fornecedor' => $request->fornecedor,
            'preco' => $request->preco
        ];

        Ferramenta::updateOrCreate(['id' => $request->id], $dados);

        return redirect('ferramenta')->with('success', "Atualizado com sucesso!");
    }

    public function destroy($id)
    {
        $ferramenta = Ferramenta::findOrFail($id);
        $ferramenta->delete();
        return redirect('ferramenta')->with('success', 'Removido com Sucesso!');
    }
    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $ferramenta = Ferramenta::where(
                $request->tipo,
                'like',
                "%" . $request->valor . "%"
            )->get();
        } else {
            $ferramenta = Ferramenta::all();
        }

        return view('ferramenta.list')->with(['ferramentas' => $ferramenta]);
    }
}
