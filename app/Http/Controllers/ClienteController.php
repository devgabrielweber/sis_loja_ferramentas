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
}
