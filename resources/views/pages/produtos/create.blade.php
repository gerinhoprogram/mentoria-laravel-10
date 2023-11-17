@extends('index')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Produtos</h1>

    </div>
    <form class="row g-3" method="POST" action="{{route('cadastrar.produto')}}">
        @csrf
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Nome</label>
            <input type="text" name="nome" class="form-control @error('nome') is-invalid @enderror">
                @if ($errors->has('nome'))
                    <div class="invalid-feedback">{{$errors->first('nome')}}</div>
                @endif        
        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Valor</label>
            <input type="text" class="form-control @error('valor') is-invalid @enderror" id="valor" name="valor">
            @if ($errors->has('valor'))
                <div class="invalid-feedback">{{$errors->first('valor')}}</div>
            @endif
        </div>
        {{-- <div class="col-12">
            <label for="inputAddress" class="form-label">Address</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
        </div>
        <div class="col-12">
            <label for="inputAddress2" class="form-label">Address 2</label>
            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
        </div>
        <div class="col-md-6">
            <label for="inputCity" class="form-label">City</label>
            <input type="text" class="form-control" id="inputCity">
        </div>
        <div class="col-md-4">
            <label for="inputState" class="form-label">State</label>
            <select id="inputState" class="form-select">
                <option selected>Choose...</option>
                <option>...</option>
            </select>
        </div>
        <div class="col-md-2">
            <label for="inputZip" class="form-label">Zip</label>
            <input type="text" class="form-control" id="inputZip">
        </div>
        <div class="col-12">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" id="gridCheck">
                <label class="form-check-label" for="gridCheck">
                    Check me out
                </label>
            </div>
        </div> --}}
        <div class="col-12">
            <button type="submit" class="btn btn-success">Cadastrar</button>
        </div>
    </form>
@endsection
