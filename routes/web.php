<?php

use App\Http\Controllers\ProdutosController;
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
});

