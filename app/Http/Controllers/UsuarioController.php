<?php

namespace App\Http\Controllers;

use App\Models\Componentes;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function __construct(User $usuario){
        $this->usuario = $usuario;
    }

    public function index(Request $request){

        $pesquisar = $request->pesquisar;
        // dd($request);

        // busca tudo do banco de dados
        $findUsuario = $this->usuario->getUsuariosPesquisarIndex(search: $pesquisar ?? '');
        //dd($findUsuario);

        // envia para o front
        return view('pages.usuario.paginacao', compact('findUsuario'));

    }

    public function delete(Request $request){

        $id = $request->id;
        $buscaRegistro = User::find($id);
        $buscaRegistro->delete();

        return response()->json(['success' => true]);
    }

    public function cadastrarProduto(Request $request){

        if($request->method() == "POST"){
            // cria dados

            // dd($request);

            $data = $request->all();

            $componentes = new Componentes();
            $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);
            
            User::create($data);

            Toastr::success('Cadastrado com sucesso!');

            return redirect()->route('usuario.index');
        }

        return view('pages.usuario.create');

    }

    public function atualizarUsuario(Request $request, $id){

        if($request->method() == "PUT"){
            
            $data = $request->all();

            // retira a virgula do valor
            $componentes = new Componentes();
            $data['valor'] = $componentes->formatacaoMascaraDinheiroDecimal($data['valor']);
            
            // acessando o banco
            $buscaRegistro = User::find($id);
            $buscaRegistro->update($data);

            Toastr::success('Atualizado com sucesso!');

            return redirect()->route('usuario.index');
        
        }

        $findUsuario = User::where('id', '=', $id)->first();

        return view('pages.usuario.atualiza', compact('findUsuario'));

    }
}
