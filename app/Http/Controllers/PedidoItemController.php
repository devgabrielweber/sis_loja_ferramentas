<?php

namespace App\Http\Controllers;

use App\Models\Ferramenta;
use App\Models\PedidoItem;
use Illuminate\Http\Request;

class PedidoItemController extends Controller
{
    public function index()
    {
        $pedido_items = PedidoItem::all();
        return view('pedido_item.list')->with(['pedido_items' => $pedido_items]);
    }

    public function create()
    {
        $clientes = Ferramenta::orderBy('name');
        return view('pedido_item.form')->with(['ferramentas' => $clientes]);
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

        PedidoItem::create($dados);

        return redirect('pedido_item')->with('success', 'Cadastrado com Sucesso!');
    }

    public function show()
    {
        //tem que descobrir o que isso faz
    }
    public function edit($id)
    {
        $pedido_item = PedidoItem::find($id);
        return view('pedido_item.form')->with(['pedido_item' => $pedido_item]);
    }
    public function update(Request $request)
    {

        $request->validate([
            'preco' => 'required',
            'cliente_id' => 'required'
        ], [
            'preco.required' => 'O :attribute é obrigatório',
            'cliente_id.required' => ':attribute é obrigatório!'
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

        PedidoItem::updateOrCreate(['id' => $request->id], $dados);

        return redirect('pedido_item')->with('success', "Atualizado com sucesso!");
    }

    public function destroy($id)
    {
        $pedido_item = PedidoItem::findOrFail($id);
        $pedido_item->delete();
        return redirect('pedido_item')->with('success', 'Removido com Sucesso!');
    }
    public function search(Request $request)
    {
        if (!empty($request->valor)) {
            $pedido_item = PedidoItem::where(
                $request->tipo,
                'like',
                "%" . $request->valor . "%"
            )->get();
        } else {
            $pedido_item = PedidoItem::all();
        }

        return view('pedido_item.list')->with(['pedido_items' => $pedido_item]);
    }
}
