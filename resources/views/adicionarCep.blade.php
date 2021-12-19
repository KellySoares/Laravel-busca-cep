@extends('app')

@section('content')
<h4 class="mb-5">
    Adicionar Endereço
</h4>
<!-- pode-se customizar em portugues as mensagens de erro  -->
<!-- na documentaçao do laravel tem explicações sobre isso  -->
<p>Confira o endereço e complete os campos número e complemento.</p>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form action="{{route('salvar')}}" method="POST">
    <!-- csrf cria uma hash valida apenas para a proxima requisicao -->
    @csrf


    <div class="row g-3">
        <div class="col-md-6">
            <label>Cep</label>
            <input type="text" class="form-control" name="cep" value="{{str_replace('-', '', $cep)}}">
        </div>
        <div class="col-md-6">

            <label>Estado</label>
            <input type="text" class="form-control" name="estado" value="{{$estado}}">
        </div>
    </div>
    <div class="row g-3">
        <div class="col-md-6">
            <label>Cidade</label>
            <input type="text" class="form-control" name="cidade" value="{{$cidade}}">
        </div>
        <div class="col-md-6">

            <label>Bairro</label>
            <input type="text" class="form-control" name="bairro" value="{{$bairro}}">
        </div>
    </div>
    <div class="row g-3">
        <div class="col-md-12">
            <label>Logradouro</label>
            <input type="text" class="form-control" name="logradouro" value="{{$logradouro}}">
        </div>
    </div>
    <div class="row g-3">
        <div class="col-md-6">
            <label>Número</label>
            <input type="text" class="form-control" name="numero">
        </div>
        <div class="col-md-6">

            <label>Complemento</label>
            <input type="text" class="form-control" name="complemento">
        </div>
    </div><br>
    <div class="form-group">
        <button type="submit" class="btn btn-primary">Salvar</button>
        <a class="btn btn-danger" href="{{route('buscarCep')}}">
            Voltar
        </a>
    </div>

</form>
@endsection