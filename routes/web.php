<?php

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

Route::get('/', [EventController::class, 'index']);
Route::get('/events/create', [EventController::class, 'create']);


/* ROTAS DAS FERRAMENTAS */
Route::get('/ferramentas/create', [FerramentaController::class, 'create']);
//rota do create, chama create no controller, que redirecionada para create

Route::get('/ferramentas/list', [FerramentaController::class, 'index'])->name('ferramentas.list');
//rota do list, chama index no controller, que redireciona para list

Route::post('/ferramentas/list', [FerramentaController::class, 'store'])->name('ferramentas.store');
//rota do store, chama store no controller, que redireciona para a list.

Route::get('/ferramentas/edit/{id}', [FerramentaController::class, 'edit'])->name('ferramentas.edit');
//rota do edit, chama edit no controller, que redicreciona para create com $ferramenta e $campos

Route::post('/ferramentas/update/{id}', [FerramentaController::class, 'update'])->name('ferramentas.update');
//rota do update, chama update no controller, que redireciona para list

Route::post('/ferramenta/list', [FerramentaController::class, 'index']);
//rota post de list, para que o controller update consiga redirecionar para list. nao tem interferencia no funcionamento da pagina em si.

Route::post('/ferramenta/search', [FerramentaController::class, 'index'])->name('ferramentas.search');

/* ROTAS DOS CLIENTES */
Route::get('/clientes/create', [ClienteController::class, 'create'])->name('cliente.create');;
Route::get('/clientes/list', [ClienteController::class, 'list'])->name('cliente.list');;
Route::get('/clientes/search', [ClienteController::class, 'search'])->name('cliente.search');
Route::get('/clientes/store', [ClienteController::class, 'store'])->name('cliente.store');

























/*
    MUDANÇAS NAS VIEWS A PARTIR DE PARÂMETROS VIA LINK


    /produtos/{id?}              - link da rota, espera um id (opcional, caso não tiver, cai no default)
    $id dentro de function()    - inicialização da variável id e possibilidade de valor default
    view('product')             - arquivo .blade.php que será acessado na pasta views
    ['id' => $id]               - parâmetro extra que será passado para a view
    

Route::get('/produtos/{id?}', function ($id = null) {
    return view('product', ['id' => $id]);
});


Route::get('/busca', function () {
    $busca = request('search');

    return view('search', ['busca' => $busca]);
});

*/