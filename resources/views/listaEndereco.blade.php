@extends('app')

@section('content')
<h4 class="mb-5">
    Endereços Cadastrados
</h4>
<a class="btn btn-success" href="{{route('buscarCep')}}">
    Adicionar por CEP
</a>
<a class="btn btn-success" href="{{route('buscarEndereco')}}">
    Adicionar por Endereco
</a>
@if(session('sucesso'))
<div class="alert alert-success" role="alert" style="position: relative;">
    {{session('sucesso')}}
</div>
@endif
@if(session('erro'))
<div class="alert alert-danger" role="alert">
    {{session('erro')}}
</div>
@endif
<div class="table-responsive">
    <table class="table mt-5 table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">CEP</th>
                <th scope="col">Logradouro</th>
                <th scope="col">Numero</th>
                <th scope="col">Complemento</th>
                <th scope="col">Bairro</th>
                <th scope="col">Cidade</th>
                <th scope="col">Estado</th>
                <th scope="col">Data da Criação</th>
            </tr>
        </thead>
        <tbody>
            @foreach($endereco as $endereco)

            <tr>
                <td>{{$endereco->cep}}</td>
                <td>{{$endereco->logradouro}}</td>
                <td>{{$endereco->numero}}</td>
                <td>{{$endereco->complemento}}</td>
                <td>{{$endereco->bairro}}</td>
                <td>{{$endereco->cidade}}</td>
                <td>{{$endereco->estado}}</td>
                <td>{{(new DateTime($endereco->created_at))->format('d/m/Y H:i:s')}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection