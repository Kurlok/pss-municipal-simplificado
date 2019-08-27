<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vaga;
use App\Inscricao;
use App\Mail\ConfirmacaoRecurso;
use Illuminate\Support\Facades\Mail;

class RecursoController extends Controller
{

    public function index()
    {

        $listaVagas = Vaga::all();

        return view(
            'recurso',
            [
                'listaVagas' => $listaVagas,
            ],
        );
    }


    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'cpf' => 'required|string|min:14|max:14|cpf',
            'rg' => 'required|numeric',
            'telefone' => 'required|min:14|max:15',
            'telefoneAlternativo' => 'required|min:15|max:15',
            'emprego' => 'required',
            'g-recaptcha-response' => 'required|recaptcha',
        ]);

        $recurso = new Recurso;
        $recurso->idInscricao = $request->idInscricao;
        $recurso->nome = $request->nome;
        $recurso->cpf = $request->cpf;
        $recurso->email = $request->email;
        $recurso->rg = $request->rg;
        $recurso->telefone = $request->telefone;
        $recurso->telefoneAlternativo = $request->telefoneAlternativo;
        $recurso->fundamentacao = $request->fundamentacao;


        $recurso->save();


        // if ($request->has("titulo1")) {
        //     $titulo->id = $request->titulo1;
        //     Inscricao::find($inscricao->id)->titulos()->attach($titulo->id);
        // }
        // if ($request->has("titulo2")) {
        //     $titulo->id = $request->titulo2;
        //     Inscricao::find($inscricao->id)->titulos()->attach($titulo->id);
        // }
        // if ($request->has("titulo3")) {
        //     $titulo->id = $request->titulo3;
        //     Inscricao::find($inscricao->id)->titulos()->attach($titulo->id);
        // }
        // if ($request->has("titulo4")) {
        //     $titulo->id = $request->titulo4;
        //     Inscricao::find($inscricao->id)->titulos()->attach($titulo->id);
        // }

        //Inscricao::find($inscricao->id)->titulos()->save($titulo);
        // $inscricaoTeste = Inscricao::find($inscricao->id)->titulos()->get();
        //   }

        //Envio de e-mail
        $recursoEfetuado = Recurso::find($recurso->id);
        $dataTempoSQL = $recursoEfetuado->created_at;
        $dataTempoBR = date('d/m/Y H:i:s', strtotime($dataTempoSQL));
        try {
            $destinatario = $recursoEfetuado->email;
            $comissao = 'comissao.pss.1.2019@palmeira.pr.gov.br';

            Mail::to($destinatario)
                ->send(new ConfirmacaoRecurso($recursoEfetuado));
            Mail::to($comissao)
                ->send(new ConfirmacaoRecurso($recursoEfetuado));
            return redirect()->route('consulta')->with([
                'recurso' => $recurso
            ]);
        } catch (Exception $ex) {
            return redirect()->route('consulta')->with([
                'recurso' => $recurso
            ]);
        } finally {
            return redirect()->route('consulta')->with([
                'recurso' => $recurso
            ]);
        }
    }
}
