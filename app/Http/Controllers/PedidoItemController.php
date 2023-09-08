<?php

namespace App\Http\Controllers;

use App\Models\Ferramenta;
use App\Models\PedidoItem;
use App\Models\Pedido;
use App\Models\Cliente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedidoItemController extends Controller
{


    public static function retornaQuantidadeItens($ferrramenta, $id)
    {
        $pedido_item_return = PedidoItem::where('pedido_id', '=', $id)
            ->where('ferramenta_id', '=', $ferrramenta->id)
            ->get();
        return $pedido_item_return[0]->qtd;
    }


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
        $ferramenta = Ferramenta::find($request->ferramenta_id);
        $total = $request->total + $ferramenta->preco * $request->qtd;
        $pedido_id = $request->pedido_id;

        $pedidoitem = new PedidoItem();
        $pedidoitem->ferramenta_id = $request->ferramenta_id;
        $pedidoitem->pedido_id = $request->pedido_id;
        $pedidoitem->qtd = $request->qtd;
        $pedidoitem->save();

        //dd($pedidoitem);

        $pedido = Pedido::find($pedido_id);
        $ferramentas = Ferramenta::all();

        $cliente = Cliente::find($pedido->cliente_id);
 
        $pedido_ferramentas = PedidoItem::where('pedido_id','=',$pedido_id)->get();

        foreach($pedido_ferramentas as $index => $pedido_ferramenta){
            $ferramentasDoPedido[] = Ferramenta::find($pedido_ferramenta->ferramenta_id);
            $ferramentasDoPedidoIDS[] = $ferramentasDoPedido[$index]->id; 
        }

        foreach($ferramentas as $index => $x){
            if (in_array($x->id, $ferramentasDoPedidoIDS)){
                $ferramentas[$index]->disabled = true;
            } else {
                $ferramentas[$index]->disabled = false;
            }
        }

        
        //dd($pedido_ferramentas);

        //dd($pedidoitem);

        return view('pedido_item.add')->with(['id'=>$pedido_id,'pedido'=>$pedido,'ferramentas'=>$ferramentas,'cliente'=>$cliente,'total'=>$total,'ferramentasDoPedido'=>$ferramentasDoPedido]);
    }

    public function show()
    {
        //tem que descobrir o que isso faz
    }
    public function edit($id, $total, $ferrramenta_id)
    {
        $pedido_item = PedidoItem::where('pedido_id', '=', $id)->where('ferramenta_id', '=', $ferrramenta_id)->get();
        //dd($pedido_item);
        $pedido = Pedido::find($pedido_item[0]->pedido_id);
        $cliente = Cliente::find($pedido->cliente_id);
        $ferramentas = Ferramenta::all();
        return view('pedido_item.add')->with(['pedido_item' => $pedido_item[0],'pedido'=>$pedido,'total'=>$total,'cliente'=>$cliente,'ferramentas'=>$ferramentas]);
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
        return('<html><h1>Enviado com sucesso!</h1></html>');
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
