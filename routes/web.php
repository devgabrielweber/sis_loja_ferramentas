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
Route::get('/ferramentas/list', [FerramentaController::class, 'list']);



/* ROTAS DOS CLIENTES */
Route::get('/clientes/create', [ClienteController::class, 'create']);
Route::get('/clientes/list', [ClienteController::class, 'list']);

























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