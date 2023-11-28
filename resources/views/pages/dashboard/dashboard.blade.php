@extends('index')

{{-- conteudo da pagina --}}
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>

    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Produtos cadastrados</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">{{$produtos}}</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Clientes cadastrados</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">{{$clientes}}</a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6 mt-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Usuários</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">Go somewhere</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 mt-4">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">Vendas</h5>
                    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                    <a href="#" class="btn btn-primary">{{$vendas}}</a>
                </div>
            </div>
        </div>
    </div>
@endsection
