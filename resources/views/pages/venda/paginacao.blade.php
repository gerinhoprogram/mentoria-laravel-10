
{{-- include index --}}
@extends('index')

@section('content')

<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Produtos</h1>
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
    <form action="{{route('venda.index')}}" method="get">
        <input type="text" name="pesquisar" id="">
        <button>Pesquisar</button>
        <a href="{{route('cadastrar.venda')}}" type="button" class="btn btn-success float-end">Incluir vendas</a>
    </form>
    <div class="table-responsive small mt-4">
        @if($findVenda->isEmpty())
            <p>Não existe dados</p>
        @else
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th>Numeração</th>
                    {{-- <th>Produto</th> --}}
                    <th>Cliente</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($findVenda as $venda)

                <tr>
                    <td>{{$venda->numero_da_venda}}</td>
                    {{-- <td>{{$venda->produto->nome}}</td> --}}
                    <td>{{$venda->cliente->nome}}</td>
                    <td>
                        <a href="{{route('enviaComprovantePorEmail.venda', $venda->id)}}">
                            Enviar email
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