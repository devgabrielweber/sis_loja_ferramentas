<?php
use App\Http\Controllers\PedidoController;
use App\Models\PedidoItem;
use Illuminate\Support\Facades\Route;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
use App\Http\Controllers\EventController;
use App\Http\Controllers\FerramentaController;
use App\Http\Controllers\ClienteController;
use App\Http\Controllers\PedidoItemController;
use App\Http\Controllers\FuncionarioController;
Route::get('/', [EventController::class, 'index']);
Route::get('/events/create', [EventController::class, 'create']);



/* ROTAS DAS FERRAMENTAS */
Route::get('/ferramentas/create', [FerramentaController::class, 'create'])->name('ferramentas.create');
//rota do create, chama create no controller, que redirecionada para create
Route::get('/ferramentas/list', [FerramentaController::class, 'index'])->name('ferramentas.list');
//rota do list, chama index no controller, que redireciona para list
Route::post('/ferramentas/create',
[FerramentaController::class, 'store'])->name('ferramentas.store');//rota do store, chama store no controller, que redireciona para a list.
Route::get('/ferramentas/edit/{id}', [FerramentaController::class, 'edit'])->name('ferramentas.edit');
//rota do edit, chama edit no controller, que redicreciona para create com $ferramenta e $campos
Route::post('/ferramentas/update/{id}', [FerramentaController::class, 'update'])->name('ferramentas.update');
//rota do update, chama update no controller, que redireciona para list
Route::post('/ferramentas/list', [FerramentaController::class, 'index'])->name('ferramentas.list');
//rota post de list, para que o controller update consiga redirecionar para list. nao tem interferencia no funcionamento da pagina em si.
Route::get('/ferramentas/list/{id}', [FerramentaController::class, 'destroy'])->name('ferramentas.destroy');
Route::get('/ferramentas/search',[FerramentaController::class, 'search'])->name('ferramentas.search');


/* ROTAS DOS CLIENTES */
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('cliente.create');;
Route::get('/clientes/list', [ClienteController::class, 'list'])->name('cliente.list');;
Route::get('/clientes/search', [ClienteController::class, 'search'])->name('cliente.search');
Route::get('/clientes/store', [ClienteController::class, 'store'])->name('cliente.store');
Route::get('/clientes/edit/{id}', [FuncionarioController::class, 'edit'])->name('clientes.edit');


Route::get('/pedido/create',[PedidoController::class, 'create'])->name('pedido.create');
Route::post('/pedido/update/{id}', [PedidoController::class, 'update'])->name('pedido.update');
Route::post('/pedido/create/', [PedidoController::class, 'store'])->name('pedido.store');

Route::post('/pedido_item/add/{id}/{total}',[PedidoItemController::class, 'store'])->name('pedido_item.add');

Route::post('/pedido/create',[PedidoController::class, 'save'])->name('pedido.save');


// ROTA DOS FUNCIONARIOS
Route::get('/funcionarios/create', [FuncionarioController::class, 'create'])->name('funcionarios.create');
Route::get('/funcionarios/list', [FuncionarioController::class, 'index'])->name('funcionarios.list');
Route::post('/funcionarios/create', [FuncionarioController::class, 'store'])->name('funcionarios.store');
Route::get('/funcionarios/edit/{id}', [FuncionarioController::class, 'edit'])->name('funcionarios.edit');
Route::post('/funcionarios/update/{id}', [FuncionarioController::class, 'update'])->name('funcionarios.update');
Route::post('/funcionarios/list', [FuncionarioController::class, 'index'])->name('funcionarios.list');
Route::get('/funcionarios/list/{id}', [FuncionarioController::class, 'destroy'])->name('funcionarios.destroy');
Route::get('/funcionarios/search',[FuncionarioController::class, 'search'])->name('funcionarios.search');