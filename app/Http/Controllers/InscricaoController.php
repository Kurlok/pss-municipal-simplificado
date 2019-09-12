<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Inscricao;
use App\Titulo;
use App\Vaga;

use Illuminate\Support\Facades\Mail;
use App\Exports\InscricoesExport;
use App\Exports\InscricaoTituloExport;
use App\Mail\ConfirmacaoInscricao;
use App\Rules\PalavrasMinimas;
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class InscricaoController extends Controller
{
    public function titulos()
    {
        return $this->belongsToMany('App\Titulo', 'inscricoes_titulos', 'fk_inscricoes_id', 'fk_titulo_id');

        //  return $this->hasMany('App\Titulo', 'fk_titulos_id');
    }

    public function telaConsulta()
    {
        return view(
            'consulta',
        );
    }

    public function consultaInscricao(Request $request)
    {
        $validatedData = $request->validate([
            'cpf' => 'required|string|min:14|max:14|cpf',
            'rg' => 'required|numeric',
            'dataNascimento' => 'required',
            'g-recaptcha-response' => 'required|recaptcha',
        ]);

        $inscricaoBusca = new Inscricao;
        $inscricaoBusca->id = $request->id;
        $inscricaoBusca->dataNascimento = $request->dataNascimento;
        $inscricaoBusca->cpf = $request->cpf;
        $inscricaoBusca->rg = $request->rg;

        $inscricao =  Inscricao::find($inscricaoBusca->id);
        if ((isset($inscricao)) && ($inscricaoBusca->dataNascimento == $inscricao->dataNascimento) && ($inscricaoBusca->cpf == $inscricao->cpf) && ($inscricaoBusca->rg == $inscricao->rg)) {
            $emprego = Vaga::find($inscricao->fk_vagas_id);

            return redirect()->route('consulta')->with([
                'inscricao' => $inscricao,
                'emprego' => $emprego
            ]);
        } else {
            return redirect()->route('consulta')->with('mensagemErroConsulta', "Não foi encontrada nenhuma inscrição com os dados inseridos.");
        }
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => ['required', 'string', 'max:255', new PalavrasMinimas],
            'bairro' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'cpf' => 'required|string|min:14|max:14|cpf',
            'rg' => 'required|numeric',
            // 'ufRg' => 'required',
            // 'orgaoExpedidor' => 'required',
            'sexo' => 'required',
            'telefone' => 'required|min:14|max:15',
            'telefoneAlternativo' => 'required|min:15|max:15',
            'cep' => 'required|min:9|max:9',
            'uf' => 'required',
            'cidade' => 'required',
            'rua' => 'required',
            'numero' => 'required',
            'complemento' => '',
            'emprego' => 'required',
            'dataNascimento' => 'required|after_or_equal:9/1/1944',
            'g-recaptcha-response' => 'required|recaptcha',
            'titulo' => 'required',

        ]);

        $inscricao = new Inscricao;
        $inscricao->nome = $request->nome;
        $inscricao->bairro = $request->bairro;

        $inscricao->dataNascimento = $request->dataNascimento;
        $inscricao->cpf = $request->cpf;
        $inscricao->email = $request->email;
        $inscricao->rg = $request->rg;
        // $inscricao->ufRg = $request->ufRg;
        // $inscricao->orgaoExpedidor = $request->orgaoExpedidor;
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
        $inscricaoEfetuada = Inscricao::find($inscricao->id);
        $emprego = Vaga::find($inscricaoEfetuada->fk_vagas_id);
        $dataTempoSQL = $inscricao->created_at;
        $dataTempoBR = date('d/m/Y H:i:s', strtotime($dataTempoSQL));
        try {
            $destinatario = $inscricaoEfetuada->email;
            Mail::to($destinatario)
                ->send(new ConfirmacaoInscricao($inscricaoEfetuada, $emprego));
            return redirect()->route('/')->with('mensagemSucessoInscricao', "Inscrição efetuada com sucesso em $dataTempoBR, anote seu número de inscrição: $inscricao->id. Com ele você pode conferir sua inscrição em 'Consulta' no canto superior direito da tela.");
        } catch (Exception $ex) {
            return redirect()->route('/')->with('mensagemSucessoInscricao', "Inscrição efetuada com sucesso em $dataTempoBR, anote seu número de inscrição: $inscricao->id. Com ele você pode conferir sua inscrição em 'Consulta' no canto superior direito da tela.");
        } finally {
            return redirect()->route('/')->with('mensagemSucessoInscricao', "Inscrição efetuada com sucesso em $dataTempoBR, anote seu número de inscrição: $inscricao->id. Com ele você pode conferir sua inscrição em 'Consulta' no canto superior direito da tela.");
        }
    }

    public function exportarInscricoes()
    {
        return Excel::download(new InscricoesExport(), 'Inscrições PSS nº 1-2019.xlsx');
    }
    public function exportarInscricoesTitulos()
    {
        return Excel::download(new InscricaoTituloExport(), 'inscricoesTitulos.xlsx');
    }
}
