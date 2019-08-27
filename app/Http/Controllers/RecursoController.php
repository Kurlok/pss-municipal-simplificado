<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Vaga;
use App\Inscricao;

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
            'telefoneAlternativo' => '',
            'cep' => 'required|min:9|max:9',
            'emprego' => 'required',
            'dataNascimento' => 'after_or_equal:9/1/1944',
            'g-recaptcha-response' => 'required|recaptcha',
            'titulo' => 'required',

        ]);

        $inscricao = new Inscricao;
        $inscricao->nome = $request->nome;
        $inscricao->dataNascimento = $request->dataNascimento;
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
        $inscricao->deficiencia = $request->deficiencia;
        $inscricao->deficienciaDescricao = $request->deficienciaDescricao;

        $inscricao->fk_vagas_id = $request->emprego;
        $inscricao->save();

        //Salvando os títulos na tabela associativa
        $titulo = new Titulo;
        for ($i = 0; $i <= 4; $i++) {
            // if ($request->has("titulo[]")) {
            $titulo->id = $request->input("titulo.$i");

            Inscricao::find($inscricao->id)->titulos()->attach($titulo->id);
            //}
        }
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
        // $inscricaoEfetuada = Inscricao::find($inscricao->id);
        // $emprego = Vaga::find($inscricaoEfetuada->fk_vagas_id);
        // $dataTempoSQL = $inscricao->created_at;
        // $dataTempoBR = date('d/m/Y H:i:s', strtotime($dataTempoSQL));
        // try {
        //     $destinatario = $inscricaoEfetuada->email;
        //     Mail::to($destinatario)
        //         ->send(new ConfirmacaoInscricao($inscricaoEfetuada, $emprego));
        //     return redirect()->route('/')->with('mensagemSucessoInscricao', "Inscrição efetuada com sucesso em $dataTempoBR, anote seu número de inscrição: $inscricao->id. Com ele você pode conferir sua inscrição em 'Consulta' no canto superior direito da tela.");
        // } catch (Exception $ex) {
        //     return redirect()->route('/')->with('mensagemSucessoInscricao', "Inscrição efetuada com sucesso em $dataTempoBR, anote seu número de inscrição: $inscricao->id. Com ele você pode conferir sua inscrição em 'Consulta' no canto superior direito da tela.");
        // } finally {
        //     return redirect()->route('/')->with('mensagemSucessoInscricao', "Inscrição efetuada com sucesso em $dataTempoBR, anote seu número de inscrição: $inscricao->id. Com ele você pode conferir sua inscrição em 'Consulta' no canto superior direito da tela.");
        // }
    }
}
