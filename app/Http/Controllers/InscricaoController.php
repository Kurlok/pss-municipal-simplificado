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
use Maatwebsite\Excel\Facades\Excel;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class InscricaoController extends Controller
{
    public function titulos()
    {
        return $this->belongsToMany('App\Titulo', 'inscricoes_titulos', 'fk_inscricoes_id', 'fk_titulo_id');

        //  return $this->hasMany('App\Titulo', 'fk_titulos_id');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'cpf' => 'required|string|min:14|max:14|cpf',
            'rg' => 'required|numeric',
            'ufRg' => 'required',
            'orgaoExpedidor' => 'required',
            'sexo' => 'required',
            'telefone' => 'required|min:14|max:15',
            'telefoneAlternativo' => '',
            'cep' => 'required|min:9|max:9',
            'uf' => 'required',
            'cidade' => 'required',
            'rua' => 'required',
            'numero' => 'required',
            'complemento' => '',
            'emprego' => 'required',
            'dataNascimento' => 'after_or_equal:8/1/1944',
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
        $inscricao->fk_vagas_id = $request->emprego;
        $inscricao->save();

        //Salvando os títulos na tabela associativa
        $titulo = new Titulo;
        for ($i=0; $i <= 3; $i++){
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

           $inscricaoEfetuada = Inscricao::find($inscricao->id);

           $emprego = Vaga::find($inscricaoEfetuada->fk_vagas_id);
            $to_email = 'felipe.augum@gmail.com';
           Mail::to($to_email)
           ->send(new ConfirmacaoInscricao($inscricaoEfetuada, $emprego));


        return redirect()->route('/')->with('mensagemSucessoInscricao', "Inscrição feita com sucesso!");
        //   }


    }
    public function exportarInscricoes()
    {
        return Excel::download(new InscricoesExport(), 'inscricoes.xlsx');
    }
    public function exportarInscricoesTitulos()
    {
        return Excel::download(new InscricaoTituloExport(), 'inscricoesTitulos.xlsx');
    }
}
