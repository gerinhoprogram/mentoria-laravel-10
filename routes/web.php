<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProdutosController;
use App\Http\Controllers\VendaController;
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

Route::get('/', function () {
    return view('index');
});

Route::get('/mentoria', function(){
    return 'ola';
});

// http://localhost:8989/produtos/mais alguma coisa
Route::prefix('produtos')->group(function(){
    //controller e função
    Route::get('/', [ProdutosController::class, 'index'])->name('produto.index');
    
    // cadastro
    Route::get('/cadastrarProduto', [ProdutosController::class, 'cadastrarProduto'])->name('cadastrar.produto');
    Route::post('/cadastrarProduto', [ProdutosController::class, 'cadastrarProduto'])->name('cadastrar.produto');

    // atualizar
    Route::get('/atualizarProduto/{id}', [ProdutosController::class, 'atualizarProduto'])->name('atualizar.produto');
    Route::put('/atualizarProduto/{id}', [ProdutosController::class, 'atualizarProduto'])->name('atualizar.produto');

    Route::delete('/delete', [ProdutosController::class, 'delete'])->name('produto.delete');
});


Route::prefix('cliente')->group(function(){
    //controller e função                                     //name na view
    Route::get('/', [ClienteController::class, 'index'])->name('cliente.index');
    
    // cadastro
    Route::get('/cadastrarCliente', [ClienteController::class, 'cadastrarCliente'])->name('cadastrar.cliente');
    Route::post('/cadastrarCliente', [ClienteController::class, 'cadastrarCliente'])->name('cadastrar.cliente');

    // atualizar
    Route::get('/atualizarCliente/{id}', [ClienteController::class, 'atualizarCliente'])->name('atualizar.cliente');
    Route::put('/atualizarCliente/{id}', [ClienteController::class, 'atualizarCliente'])->name('atualizar.cliente');

    Route::delete('/delete', [ClienteController::class, 'delete'])->name('cliente.delete');
});

Route::prefix('venda')->group(function(){
    //controller e função
    Route::get('/', [VendaController::class, 'index'])->name('venda.index');
    
    // cadastro
    Route::get('/cadastrarVenda', [VendaController::class, 'cadastrarVenda'])->name('cadastrar.venda');
    Route::post('/cadastrarVenda', [VendaController::class, 'cadastrarVenda'])->name('cadastrar.venda');

    // atualizar
    Route::get('/atualizarVenda/{id}', [VendaController::class, 'atualizarVenda'])->name('atualizar.venda');
    Route::put('/atualizarVenda/{id}', [VendaController::class, 'atualizarVenda'])->name('atualizar.venda');

    Route::delete('/delete', [VendaController::class, 'delete'])->name('venda.delete');

    Route::get('/enviaComprovantePorEmail/{id}', [VendaController::class, 'enviaComprovantePorEmail'])->name('enviaComprovantePorEmail.venda');
});

Route::prefix('dashboard')->group(function(){
    //controller e função
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');
   
});


Route::prefix('usuario')->group(function(){
    //controller e função
    Route::get('/', [UsuariosController::class, 'index'])->name('usuario.index');
    
    // cadastro
    Route::get('/cadastrarVenda', [VendaController::class, 'cadastrarVenda'])->name('cadastrar.venda');
    Route::post('/cadastrarVenda', [VendaController::class, 'cadastrarVenda'])->name('cadastrar.venda');

    // atualizar
    Route::get('/atualizarVenda/{id}', [VendaController::class, 'atualizarVenda'])->name('atualizar.venda');
    Route::put('/atualizarVenda/{id}', [VendaController::class, 'atualizarVenda'])->name('atualizar.venda');

    Route::delete('/delete', [VendaController::class, 'delete'])->name('venda.delete');

    Route::get('/enviaComprovantePorEmail/{id}', [VendaController::class, 'enviaComprovantePorEmail'])->name('enviaComprovantePorEmail.venda');
});

