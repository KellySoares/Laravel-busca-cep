@extends('app')

@section('content')
<h4 class="mb-5">
    Buscar por CEP
</h4>
<p>Para buscar um endereco basta digitar um CEP no formato de 8 dígitos deve ser fornecido, por exemplo: <b>"01001000"</b>.</p>
@if(session('erro'))
<div class="alert alert-danger" role="alert">
    {{session('erro')}}
</div>
@endif
<form action="{{route('adicionarCep')}}" method="GET">
    <div class="row g-3">
        <div class="col-md-6">
            <label>Cep</label>
            <input type="text" class="form-control" name="cep">
        </div>
    </div><br>
    <button type="submit" class="btn btn-primary">Enviar</button>
    <a class="btn btn-danger" href="{{route('listaEndereco')}}">
        Voltar
    </a>
</form>

@endsection