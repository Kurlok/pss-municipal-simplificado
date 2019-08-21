<?php

namespace App\Exports;

use App\Inscricao;
use App\Vaga;

use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class InscricoesExport implements WithHeadings, ShouldAutoSize, WithColumnFormatting, FromArray
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        // return DB::table('inscricoes')
        // ->select(
        //     DB::raw('
        //     inscricoes.id, 
        //     inscricoes.created_at,
        //     inscricoes.updated_at,
        //     inscricoes.nome, 
        //     inscricoes.dataNascimento, 
        //     inscricoes.cpf, 
        //     inscricoes.rg, 
        //     inscricoes.ufRg, 
        //     inscricoes.orgaoExpedidor, 
        //     inscricoes.sexo, 
        //     inscricoes.email, 
        //     inscricoes.telefone, 
        //     inscricoes.telefoneAlternativo, 
        //     inscricoes.cep,
        //     inscricoes.uf,
        //     inscricoes.cidade,
        //     inscricoes.rua,
        //     inscricoes.numero,
        //     inscricoes.complemento,
        //     vagas.emprego,
        //     vagas.cargaHoraria,
        //     vagas.formacao,
        //     vagas.vencimento,
        //     vagas.numVagas,
        //     vagas.pss,
        //     SUM(titulos.pontos)'
        //     )
        // )
        // ->join('inscricoes_titulos', 'inscricoes.id', '=', 'inscricoes_titulos.fk_inscricoes_id')
        // ->join('titulos', 'titulos.id', '=', 'inscricoes_titulos.fk_titulos_id')
        // ->join('vagas', 'vagas.id', '=', 'inscricoes.fk_vagas_id')
        // ->groupBy(
        //     'inscricoes.id', 
        //     'inscricoes.created_at', 
        //     'inscricoes.updated_at', 
        //     'inscricoes.nome',
        //     'inscricoes.dataNascimento', 
        //     'inscricoes.cpf', 
        //     'inscricoes.rg', 
        //     'inscricoes.ufRg', 
        //     'inscricoes.orgaoExpedidor', 
        //     'inscricoes.sexo', 
        //     'inscricoes.email', 

        //     'inscricoes.telefone', 
        //     'inscricoes.telefoneAlternativo', 
        //     'inscricoes.cep',
        //     'inscricoes.uf',
        //     'inscricoes.cidade',
        //     'inscricoes.rua',
        //     'inscricoes.numero',
        //     'inscricoes.complemento',
        //     'vagas.emprego',
        //     'vagas.cargaHoraria',
        //     'vagas.formacao',
        //     'vagas.vencimento',
        //     'vagas.numVagas',
        //     'vagas.pss',
        //     )
        // ->get();

        // return DB::table('inscricoes')
        // ->select(
        //     DB::raw('
        //     inscricoes.id, 
        //     inscricoes.created_at,
        //     inscricoes.nome, 
        //     inscricoes.dataNascimento, 
        //     inscricoes.cpf, 
        //     inscricoes.rg, 
        //     inscricoes.ufRg, 
        //     inscricoes.orgaoExpedidor, 
        //     inscricoes.sexo, 
        //     inscricoes.email, 
        //     inscricoes.telefone, 
        //     inscricoes.telefoneAlternativo, 
        //     inscricoes.cep,
        //     inscricoes.uf,
        //     inscricoes.cidade,
        //     inscricoes.rua,
        //     inscricoes.numero,
        //     inscricoes.complemento,
        //     vagas.emprego,
        //     titulos.titulo
        //     '
        //     )
        // )
        // ->join('inscricoes_titulos', 'inscricoes.id', '=', 'inscricoes_titulos.fk_inscricoes_id')
        // ->join('titulos', 'titulos.id', '=', 'inscricoes_titulos.fk_titulos_id')
        // ->join('vagas', 'vagas.id', '=', 'inscricoes.fk_vagas_id')
        // ->get();
        //$listaInscricao = Inscricao::all();

        // foreach ($listaInscricao as $inscricao) {
        //    foreach ($inscricao->titulos as $tit){

        //    }
        // }
        return [
            [1, 2, 3],
            [4, 5, 6]
        ];
    }

    public function array(): array
    {
        $arrayFinal = array();
        $listaInscricao = Inscricao::all();
        $listaVagas = Vaga::all();

        foreach ($listaInscricao as $inscricao) {
            $array = array();
            array_push($array, $inscricao->id);
            array_push($array, $inscricao->created_at);
            array_push($array, $inscricao->nome);
            array_push($array, $inscricao->dataNascimento);
            array_push($array, $inscricao->cpf);
            array_push($array, $inscricao->rg);
            array_push($array, $inscricao->ufRg);
            array_push($array, $inscricao->orgaoExpedidor);
            array_push($array, $inscricao->sexo);
            array_push($array, $inscricao->email);
            array_push($array, $inscricao->telefone);
            array_push($array, $inscricao->telefoneAlternativo);
            array_push($array, $inscricao->cep);
            array_push($array, $inscricao->uf);
            array_push($array, $inscricao->cidade);
            array_push($array, $inscricao->rua);
            array_push($array, $inscricao->numero);
            array_push($array, $inscricao->complemento); 
            $empregoBusca = Vaga::find($inscricao->fk_vagas_id);
            $empregoNome = $empregoBusca->emprego;
            array_push($array, $empregoNome);        
            $somaPontos = 0;  
            $i = 1;

            foreach ($inscricao->titulos as $tit) { 
                array_push($array, $tit->titulo);
                array_push($array, $tit->pontos);
                $somaPontos = $somaPontos + $tit->pontos;
                $i = $i+1;
            }

            while ($i <= 5){
                array_push($array, "");
                array_push($array, "");
                $i++;
            }
            array_push($array, $somaPontos);          

            array_push($arrayFinal, $array);
        }

        return [
            $arrayFinal
        ];
    }


    public function headings(): array
    {
        return [
            'Número da inscrição',
            'Criada em',
            'Candidato',
            'Data de Nascimento',
            'CPF',
            'RG',
            'RG - UF',
            'RG - Órgão Expedidor',
            'Sexo',
            'E-mail',
            'Telefone',
            'Telefone Alternativo',
            'CEP',
            'UF',
            'Cidade',
            'Logradouro',
            'Número',
            'Complemento',
            'Emprego Público',
            'Título 1',
            'Pontos Título 1',
            'Título 2',
            'Pontos Título 2',
            'Título 3',
            'Pontos Título 3',
            'Título 4',
            'Pontos Título 4',
            'Título 5',
            'Pontos Título 5',
            'Total de pontos'

        ];
    }

    public function columnFormats(): array
    {
        return [
            // 'B' => NumberFormat::FORMAT_DATE_DATETIME,
            //  'C' => NumberFormat::FORMAT_DATE_DATETIME,


            //'E' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            //  'G' => NumberFormat::FORMAT_TEXT
        ];
    }
}
