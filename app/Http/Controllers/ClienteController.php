<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestClientes;
use App\Models\Cliente;
use App\Models\Componentes;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function __construct(Cliente $cliente){
        $this->cliente = $cliente;
    }

    public function index(Request $request){

        $pesquisar = $request->pesquisar;
        // dd($request);

        // busca tudo do banco de dados
        $findCliente = $this->cliente->getClientePesquisarIndex(search: $pesquisar ?? '');
        //dd($findCliente);

        // envia para o front
        return view('pages.clientes.paginacao', compact('findCliente'));

    }

    public function delete(Request $request){

        $id = $request->id;
        $buscaRegistro = Cliente::find($id);
        $buscaRegistro->delete();

        return response()->json(['success' => true]);
    }

    public function cadastrarCliente(FormRequestClientes $request){

        if($request->method() == "POST"){
            // cria dados

            // dd($request);

            $data = $request->all();

            Cliente::create($data);

            Toastr::success('Cadastrado com sucesso!');

            return redirect()->route('cliente.index');
        }

        return view('pages.clientes.create');

    }

    public function atualizarCliente(Request $request, $id){

        if($request->method() == "PUT"){
            
            $data = $request->all();

            // acessando o banco
            $buscaRegistro = Cliente::find($id);
            $buscaRegistro->update($data);

            Toastr::success('Atualizado com sucesso!');

            return redirect()->route('cliente.index');
        
        }

        $findCliente = Cliente::where('id', '=', $id)->first();

        return view('pages.clientes.atualiza', compact('findCliente'));

    }
}
