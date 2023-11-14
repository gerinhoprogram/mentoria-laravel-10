<?php

namespace App\Http\Controllers;

use App\Models\Produto;
use Illuminate\Http\Request;

class ProdutosController extends Controller
{
    public function index(){

        // busca tudo do banco de dados
        $findProduto = Produto::all();
        //dd($findProduto);

        // envia para o front
        return view('pages.produtos.paginacao', compact('findProduto'));

    }
}
