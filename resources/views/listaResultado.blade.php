@extends('app')

@section('content')
<h4 class="mb-5">
    Endereços Encontrados
</h4>


<div class="table-responsive ">
    <table class="table mt-5 table-hover">
        <thead class="table-dark">
            <tr>
                <th scope="col">CEP</th>
                <th scope="col">Logradouro</th>
                <th scope="col">Bairro</th>
                <th scope="col">Cidade</th>
                <th scope="col">Estado</th>
                <th scope="col">Acao</th>
            </tr>
        </thead>
        <tbody>
            @foreach($ResultEnd as $endereco)
            <form action="{{route('adicionarCep')}}" method="GET">
                <tr>
                    <td>{{$endereco['cep']}}</td>
                    <td>{{$endereco['logradouro']}}</td>
                    <td>{{$endereco['bairro']}}</td>
                    <td>{{$endereco['localidade']}}</td>
                    <td>{{$endereco['uf']}}</td>
                    <td><input type="hidden" class="form-control" name="cep" value="{{$endereco['cep']}}">
                        <button type="submit" class="btn btn-primary">Cadastrar</button>
                    </td>
                </tr>

            </form>
            @endforeach
        </tbody>
    </table>
    <a class="btn btn-danger" href="{{route('buscarEndereco')}}">
        Voltar
    </a><br><br>
</div>

@endsection