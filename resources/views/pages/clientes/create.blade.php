@extends('index')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Cadastrar cliente</h1>

    </div>
    <form class="row g-3" method="POST" action="{{route('cadastrar.cliente')}}">
        @csrf
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Nome</label>
            <input type="text" value="{{old('nome')}}" name="nome" class="form-control @error('nome') is-invalid @enderror">
                @if ($errors->has('nome'))
                    <div class="invalid-feedback">{{$errors->first('nome')}}</div>
                @endif        
        </div>

        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">E-mail</label>
            <input type="text" value="{{old('email')}}" name="email" class="form-control @error('email') is-invalid @enderror">
                @if ($errors->has('email'))
                    <div class="invalid-feedback">{{$errors->first('email')}}</div>
                @endif        
        </div>

        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">CEP</label>
            <input id="cep" type="text" value="{{old('cep')}}" name="cep" class="form-control @error('cep') is-invalid @enderror">
                @if ($errors->has('cep'))
                    <div class="invalid-feedback">{{$errors->first('cep')}}</div>
                @endif        
        </div>

        <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Endereço</label>
            <input id="endereco" type="text" value="{{old('endereco')}}" name="endereco" class="form-control @error('endereco') is-invalid @enderror">
                @if ($errors->has('endereco'))
                    <div class="invalid-feedback">{{$errors->first('endereco')}}</div>
                @endif        
        </div>

        <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Logradouro</label>
            <input id="logradouro" type="text" value="{{old('logradouro')}}" name="logradouro" class="form-control @error('logradouro') is-invalid @enderror">
                @if ($errors->has('logradouro'))
                    <div class="invalid-feedback">{{$errors->first('logradouro')}}</div>
                @endif        
        </div>

        <div class="col-md-12">
            <label for="inputEmail4" class="form-label">Bairro</label>
            <input id="bairro" type="text" value="{{old('bairro')}}" name="bairro" class="form-control @error('bairro') is-invalid @enderror">
                @if ($errors->has('bairro'))
                    <div class="invalid-feedback">{{$errors->first('bairro')}}</div>
                @endif        
        </div>
        
        
        <div class="col-12">
            <button type="submit" class="btn btn-success">Cadastrar</button>
        </div>
    </form>
@endsection
