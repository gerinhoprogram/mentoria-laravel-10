<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioRequest;
use App\Models\Componentes;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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

        Toastr::success('Deletado com sucesso!');

        return response()->json(['success' => true]);
    }

    public function cadastrarUsuario(UsuarioRequest $request){

        // dd($request);

        if($request->method() == "POST"){
            // cria dados

            // dd($request);

            $data = $request->all();
            $data['password'] = Hash::make($data['password']);
            User::create($data);

            Toastr::success('Cadastrado com sucesso!');

            return redirect()->route('usuario.index');
        }

        return view('pages.usuario.create');

    }

    public function atualizarUsuario(UsuarioRequest $request, $id){

        if($request->method() == "PUT"){
            
            $data = $request->all();
            
            // acessando o banco
            $buscaRegistro = User::find($id);
            $data['password'] = Hash::make($data['password']);
            $buscaRegistro->update($data);

            Toastr::success('Atualizado com sucesso!');

            return redirect()->route('usuario.index');
        
        }

        $findUsuario = User::where('id', '=', $id)->first();

        return view('pages.usuario.atualiza', compact('findUsuario'));

    }
}
