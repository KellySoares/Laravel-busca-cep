<?php

namespace App\Http\Controllers;

use App\Http\Requests\Endereco\SalvarRequest;
use App\Models\Endereco;
use App\Models\Estados;
use App\Models\Cidades;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


class EnderecoController extends Controller
{
    public function index()
    {
        return view('principal');
    }

    public function listaEndereco()
    {
        $enderecos = Endereco::all(); /// busca todas as linhas da tablea e retorna uma collection 
        return view('listaEndereco')->with(
            [
                'endereco' => $enderecos,
            ]
        );
    }

    public function buscarCEP()
    {
        return view('buscaCep');
    }

    public function buscarEndereco()
    {
        $estados = Estados::all();
        $cidades = Cidades::all();
        return view('buscaEndereco')->with(
            [
                'estados' => $estados,
                'cidades' => $cidades,
            ]
        );
    }

    public function adicionarCep(
        Request $request
    ) {
        $cep = $request->input('cep');

        //dd($cep); /// mata e nao executa nada alem 
        //// printa na tela o que está usando 
        $response = Http::get("viacep.com.br/ws/$cep/json/")->json();
        //dd(isset($response['erro']));
        if (!isset($response['erro'])) {
            return view('adicionarCep')->with(
                [
                    'cep' => $request->input('cep'),
                    'logradouro' => $response['logradouro'],
                    'bairro' => $response['bairro'],
                    'cidade' => $response['localidade'],
                    'estado' => $response['uf'],
                ]
            );
        } else {
            return redirect('/buscarCep')->withErro('O CEP nao existe!');
        }
    }
    public function resultadoEndereco(
        Request $request
    ) {
        $estado = $request->input('estado');
        $cidade = $request->input('cidade');
        $logradouro = $request->input('logradouro');

        //dd($cep); /// mata e nao executa nada alem 
        //// printa na tela o que está usando 
        $response = Http::get("https://viacep.com.br/ws/$estado/$cidade/$logradouro/json/")->json();

        // dd($response);

        if (!empty($response)) {
            return view('listaResultado')->with(
                [
                    'ResultEnd' => $response,
                ]
            );
        } else {
            return redirect('/buscarEndereco')->withErro('O Endereco nao existe!');
        }
    }

    ///salvando as ifnormações 
    public function salvar(
        SalvarRequest $request
    ) {
        //dd($request->input());
        //// so cria se nao existir , senao retorna o que jah existe 
        $endereco = Endereco::where('cep', $request->input('cep'))->where('numero', $request->input('numero'))->where('complemento', $request->input('complemento'))->first();

        if (!$endereco) {
            Endereco::create(
                [
                    'cep' => $request->input('cep'),
                    'logradouro' => $request->input('logradouro'),
                    'numero' => $request->input('numero'),
                    'complemento' => $request->input('complemento'),
                    'bairro' => $request->input('bairro'),
                    'cidade' => $request->input('cidade'),
                    'estado' => $request->input('estado'),
                ]
            );
            /// nome da sessao criada (sucesso )
            return redirect('/lista')->withSucesso('Endereço salvo com sucesso!');
        }

        return redirect('/lista')->withErro('O endereço já esta cadastrado!');
    }
}
