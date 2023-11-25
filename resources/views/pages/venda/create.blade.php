@extends('index')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Criar nova venda</h1>

    </div>
    <form class="row g-3" method="POST" action="{{route('cadastrar.venda')}}">
        @csrf
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Número</label>
            <input type="text" disabled value="{{$findNumeracao}}" name="numero_da_venda" class="form-control @error('numero_da_venda') is-invalid @enderror">
                @if ($errors->has('numero_da_venda'))
                    <div class="invalid-feedback">{{$errors->first('numero_da_venda')}}</div>
                @endif        
        </div>

        <div class="col-md-12">
            <label for="" class="form-label">Produto</label>
            <select class="form-select" id="" name="produtos_id">
                <option value="" selected>Selecionar</option>

                @foreach ( $findProduto as $prod )
                    <option value="{{$prod->id}}">{{$prod->nome}}</option>
                @endforeach
            </select>
        </div>

        <div class="col-md-12">
            <label for="" class="form-label">Cliente</label>
            <select class="form-select" id="" name="cliente_id">
                <option value="" selected>Selecionar</option>

                @foreach ( $findCliente as $clie )
                    <option value="{{$clie->id}}">{{$clie->nome}}</option>
                @endforeach
            </select>
        </div>
        
        
        <div class="col-12">
            <button type="submit" class="btn btn-success">Cadastrar</button>
        </div>
    </form>
@endsection
