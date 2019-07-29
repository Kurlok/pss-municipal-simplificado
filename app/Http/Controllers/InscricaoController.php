<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inscricao;

class InscricaoController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'cpf' => 'required|string|min:14|max:14',
            'rg' => 'required',
            'ufRg' => 'required',
            'orgaoExpedidor' => 'required',
            'sexo' => 'required',
            'telefone' => 'numeric|required',
            'telefoneAlternativo' => 'numeric',
            'cep' => 'required|min:9|max:9',
            'uf' => 'required',
            'cidade' => 'required',
            'rua' => 'required',
            'numero' => 'numeric|required',
            'complemento' => '',
            'dataNascimento'        => 'after_or_equal:8/1/1944',
            
        ]);

        $inscricao = new Inscricao;
        $inscricao->nome = $request->nome;
        $inscricao->cpf = $request->cpf;
        $inscricao->email = $request->email;
        $inscricao->rg = $request->rg;
        $inscricao->ufRg = $request->ufRg;
        $inscricao->orgaoExpedidor = $request->orgaoExpedidor;
        $inscricao->sexo = $request->sexo;
        $inscricao->telefone = $request->telefone;
        $inscricao->telefoneAlternativo = $request->telefoneAlternativo;
        $inscricao->cep = $request->cep;
        $inscricao->uf = $request->uf;
        $inscricao->cidade = $request->cidade;
        $inscricao->rua = $request->rua;
        $inscricao->numero = $request->numero;
        $inscricao->complemento = $request->complemento;
        $inscricao->fk_vagas_id = $request->cargoSelecionado;

        $inscricao->save();
      //  if ($validatedData->fails()){
     //       return redirect()->route('/')->with('mensagemErroInscricao', 'Inscrição falhou. Confira se você preencheu todos os dados corretamente.');
      //  }  
      //  else {
            return redirect()->route('/')->with('mensagemSucessoInscricao', 'Inscrição feita com sucesso!');
     //   }


    }

}
