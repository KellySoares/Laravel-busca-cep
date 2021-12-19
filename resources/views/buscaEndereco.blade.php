@extends('app')

@section('content')

<h4 class="mb-5">
    Buscar por Endereço
</h4>
<p>Para buscar um CEP basta preencher com os dados estado, cidade e logradouro. </p>
@if(session('erro'))
<div class="alert alert-danger" role="alert">
    {{session('erro')}}
</div>
@endif
<form action="{{route('resultadoEnd')}}" method="GET">
    <div class="row g-3">
        <div class="col-md-6">
            <label>Estado</label>

            <select class="form-select" aria-label="Default select example" name="estado">
                <option selected>--Selecione--</option>
                @foreach($estados as $estado)
                <option value="{{$estado['sigla']}}">{{$estado['sigla']}} - {{$estado['nome']}}</option>
                @endforeach
            </select>
        </div>
        <div class="col-md-6">
            <label>Cidade</label>
            <select class="form-select" aria-label="Default select example" name="cidade">
                <option selected>--Selecione--</option>
                @foreach($cidades as $cidade)
                <option value="{{$cidade['nome_cidade']}}">{{$cidade['nome_cidade']}}</option>
                @endforeach
            </select>
            <br>
        </div>
    </div>
    <div class="row g-3">
        <div class="col-md-12">
            <label>Logradouro</label>
            <input type="text" class="form-control" name="logradouro">
        </div>
    </div><br>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Enviar</button>
        <a class="btn btn-danger" href="{{route('listaEndereco')}}">
            Voltar
        </a>
    </div>
</form>

@endsection