<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Venda;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(){

        $produtos = $this->buscaTotalProdutos();
        $clientes = $this->buscaTotalClientes();
        $vendas = $this->buscaTotalVendas();

        return view('pages.dashboard.dashboard', compact('produtos', 'clientes', 'vendas'));
    }

    public function buscaTotalProdutos(){
        return Produto::all()->count();
    }

    public function buscaTotalClientes(){
        return Cliente::all()->count();
    }

    public function buscaTotalVendas(){
        return Venda::all()->count();
    }
}
