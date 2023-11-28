<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormRequestVenda;
use App\Mail\ComprovanteDeVendaEmail;
use App\Models\Cliente;
use App\Models\Produto;
use App\Models\Venda;
use Brian2694\Toastr\Facades\Toastr;
use GuzzleHttp\Client;
use Illuminate\Contracts\Mail\Mailer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class VendaController extends Controller
{
    public function __construct(Venda $venda){
        $this->venda = $venda;
    }

    public function index(Request $request){

        $pesquisar = $request->pesquisar;
        // dd($request);

        // busca tudo do banco de dados
        $findVenda = $this->venda->getVendaPesquisarIndex(search: $pesquisar ?? '');
        // echo"<pre>";
        // print_r($findVenda);
        // exit;

        // envia para o front
        return view('pages.venda.paginacao', compact('findVenda'));

    }

    public function delete(Request $request){

        $id = $request->id;
        $buscaRegistro = Venda::find($id);
        $buscaRegistro->delete();

        return response()->json(['success' => true]);
    }

    public function cadastrarVenda(FormRequestVenda $request){

        // pega o maior id de Vendas
        $findNumeracao = Venda::max('numero_da_venda') + 1;
        $findProduto = Produto::all();
        $findCliente = Cliente::all();

        if($request->method() == "POST"){
            // cria dados

            $data = $request->all();

            $data['numero_da_venda'] = $findNumeracao;

            // dd($data);

            Venda::create($data);

            Toastr::success('Cadastrado com sucesso!');

            return redirect()->route('venda.index');
        }

        
        return view('pages.venda.create', compact('findNumeracao', 'findProduto', 'findCliente'));

    }

    public function atualizarProduto(FormRequestVenda $request, $id){

        if($request->method() == "PUT"){
            
            $data = $request->all();

            // retira a virgula do valor

            // acessando o banco
            $buscaRegistro = Venda::find($id);
            $buscaRegistro->update($data);

            Toastr::success('Atualizado com sucesso!');

            return redirect()->route('venda.index');
        
        }

        $findVenda = Venda::where('id', '=', $id)->first();

        return view('pages.venda.atualiza', compact('findVenda'));

    }

    public function enviaComprovantePorEmail($id){
       
        $buscaVenda = Venda::where('id', '=', $id)->first();
        $email = $buscaVenda->cliente->email;

        $sendMailData = [
            'clienteNome' => $buscaVenda->cliente->nome
        ];

        Mail::to($email)->send(new ComprovanteDeVendaEmail($sendMailData));
        
        Toastr::success('Enviado com sucesso!');
        return redirect()->route('venda.index');
    }
}
