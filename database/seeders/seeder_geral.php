<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\Ferramenta;
use App\Models\Funcionario;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class seeder_geral extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('clientes')->insert([
            [
                'nome'=>'hiury',
                'cpf'=>'128739172',
                'telefone'=>'4059865',
                'email'=>'alksdja@gmail.com',
                'endereco'=>'rua bonita, 123'
            ],
            [
                'nome'=>'renata',
                'cpf'=>'1253246234',
                'telefone'=>'4596458690',
                'email'=>'dfgjhfg@gmail.com',
                'endereco'=>'rua bela, 124'
            ],
            [
                'nome'=>'murilo',
                'cpf'=>'0928347823',
                'telefone'=>'068675532',
                'email'=>'zxcvzxcv@gmail.com',
                'endereco'=>'rua beleza, 125'
            ],
        ]);
        DB::table('ferramentas')->insert([
            [
                'nome'=>'martelo',
                'marca'=>'bosh',
                'tipo'=>'borracha',
                'fornecedor'=>'mepar',
                'preco'=>'123',
                'qtd'=>'10'
            ],
            [
                'nome'=>'furadeira',
                'marca'=>'dewald',
                'tipo'=>'bateria',
                'fornecedor'=>'furadeiras e cia',
                'preco'=>'64',
                'qtd'=>'1'
            ],
            [
                'nome'=>'chave de fenda',
                'marca'=>'philco',
                'tipo'=>'tam 3',
                'fornecedor'=>'mepar',
                'preco'=>'14',
                'qtd'=>'23'
            ],
            [
                'nome'=>'serra angular',
                'marca'=>'bosh',
                'tipo'=>'',
                'fornecedor'=>'mepar',
                'preco'=>'1124',
                'qtd'=>'4'
            ],
        ]);
        DB::table('funcionarios')->insert([
            [
                'nome'=>'maria',
                'cpf'=>'5637894',
                'salario'=>'1400',
                'cargo'=>'atendente',
                'telefone'=>'9812739172',
                'email'=>'alshjd@gmail.com',
                'endereco'=>'rua das flores',
            ],
            [
                'nome'=>'joao',
                'cpf'=>'6784564',
                'salario'=>'1500',
                'cargo'=>'atendente senior',
                'telefone'=>'67246346',
                'email'=>'sdfhgasdfg@gmail.com',
                'endereco'=>'rua florida',
            ],
            [
                'nome'=>'jose',
                'cpf'=>'34563456',
                'salario'=>'10000',
                'cargo'=>'CEO',
                'telefone'=>'56734567',
                'email'=>'zxcvzxcv@gmail.com',
                'endereco'=>'rua dona florinda',
            ],
        ]);
    }
}
