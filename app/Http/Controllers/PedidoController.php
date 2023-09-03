<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pedido;
use Illuminate\Http\Request;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Pedido::all();
        return view('pedido.list')->with(['pedidos' => $pedidos]);
    }

    public function create()
    {
        $clientes = Cliente::all()->orderBy('name');
        return view('pedido.form')->with(['clientes' => $clientes]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'preco' => 'required',
        ], [
            'preco.required' => 'O :attribute é obrigatório',
        ]);

        $dados = [
            'cliente_id' => $request->cliente_id,
            'preco' => $request->preco,
        ];

        Pedido::create($dados);

        return redirect('pedido')->with('success', 'Cadastrado com Sucesso!');
    }

    public function show()
    {
        //tem que descobrir o que isso faz
    }
    public function edit($id)
    {
        $pedido = Pedido::find($id);
        return view('pedido.form')->with(['pedido' => $pedido]);
    }
    public function update(Request $request)
    {

        $request->validate([
            'preco' => 'required',
        ], [
            'preco.required' => 'O :attribute é obrigatório',
        ]);

        $dados = [
            'cliente_id' => $request->cliente_id,
            'preco' => $request->preco,
        ];


        $dados = [
            'nome' => $request->nome,
            'cpf' => $request->cpf,
            'cnpj' => $request->cnpj,
            'telefone' => $request->telefone,
            'enail' => $request->email,
            'endereco' => $request->endereco
        ];

        Pedido::updateOrCreate(['id' => $request->id], $dados);

        return redirect('pedido')->with('success', "Atualizado com sucesso!");
    }

    public function destroy($id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->delete();
        return redirect('pedido')->with('success', 'Removido com Sucesso!');
    }
    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $pedido = Pedido::where(
                $request->tipo,
                'like',
                "%" . $request->valor . "%"
            )->get();
        } else {
            $pedido = Pedido::all();
        }

        return view('pedido.list')->with(['pedidos' => $pedido]);
    }
}
