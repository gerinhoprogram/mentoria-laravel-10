
{{-- include index --}}
@extends('index')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Clientes</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
        </div>
        <button type="button"
            class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
            <svg class="bi">
                <use xlink:href="#calendar3" />
            </svg>
            This week
        </button>
    </div>
</div>

<div>
    <form action="{{route('cliente.index')}}" method="get">
        <input type="text" name="pesquisar" id="">
        <button>Pesquisar</button>
        <a href="{{route('cadastrar.cliente')}}" type="button" class="btn btn-success float-end">Incluir clientes</a>
    </form>
    <div class="table-responsive small mt-4">
        @if($findCliente->isEmpty())
            <p>Não existe dados</p>
        @else
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>E-mail</th>
                    <th>Endereço</th>
                    <th>Logradouro</th>
                    <th>CEP</th>
                    <th>Bairro</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($findCliente as $cliente)

                <tr>
                    <td>{{$cliente->nome}}</td>
                    <td>{{$cliente->email}}</td>
                    <td>{{$cliente->endereco}}</td>
                    <td>{{$cliente->logradouro}}</td>
                    <td>{{$cliente->cep}}</td>
                    <td>{{$cliente->bairro}}</td>
                    <td>
                        <a href="{{route('atualizar.cliente', $cliente->id)}}" class="btn btn-warning btn-sm">
                            Editar 
                        </a>
                        <meta name="csrf-token" content=" {{ csrf_token() }} " />
                        <a onclick="deleteRegistroPaginacao('{{route('cliente.delete')}}', {{$cliente->id}})" class="btn btn-danger btn-sm">
                            Excluir 
                        </a>
                    </td>
                    
                </tr>

                @endforeach
                
            </tbody>
        </table>
        @endif
    </div> 
</div>

@endsection