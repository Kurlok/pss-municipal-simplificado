<?php

namespace App\Exports;

use App\Inscricao;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class InscricoesExport implements FromCollection, WithHeadings, ShouldAutoSize, WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('inscricoes')
        ->select(
            DB::raw('
            inscricoes.id, 
            inscricoes.created_at,
            inscricoes.updated_at,
            inscricoes.nome, 
            inscricoes.dataNascimento, 
            inscricoes.cpf, 
            inscricoes.rg, 
            inscricoes.ufRg, 
            inscricoes.orgaoExpedidor, 
            inscricoes.sexo, 
            inscricoes.email, 
            inscricoes.telefone, 
            inscricoes.telefoneAlternativo, 
            inscricoes.cep,
            inscricoes.uf,
            inscricoes.cidade,
            inscricoes.rua,
            inscricoes.numero,
            inscricoes.complemento,
            vagas.emprego,
            vagas.cargaHoraria,
            vagas.formacao,
            vagas.vencimento,
            vagas.numVagas,
            vagas.pss,
            SUM(titulos.pontos)'
            )
        )
        ->join('inscricoes_titulos', 'inscricoes.id', '=', 'inscricoes_titulos.fk_inscricoes_id')
        ->join('titulos', 'titulos.id', '=', 'inscricoes_titulos.fk_titulos_id')
        ->join('vagas', 'vagas.id', '=', 'inscricoes.fk_vagas_id')
        ->groupBy(
            'inscricoes.id', 
            'inscricoes.created_at', 
            'inscricoes.updated_at', 
            'inscricoes.nome',
            'inscricoes.dataNascimento', 
            'inscricoes.cpf', 
            'inscricoes.rg', 
            'inscricoes.ufRg', 
            'inscricoes.orgaoExpedidor', 
            'inscricoes.sexo', 
            'inscricoes.email', 

            'inscricoes.telefone', 
            'inscricoes.telefoneAlternativo', 
            'inscricoes.cep',
            'inscricoes.uf',
            'inscricoes.cidade',
            'inscricoes.rua',
            'inscricoes.numero',
            'inscricoes.complemento',
            'vagas.emprego',
            'vagas.cargaHoraria',
            'vagas.formacao',
            'vagas.vencimento',
            'vagas.numVagas',
            'vagas.pss',
            )
        ->get();
        

       // return Inscricao::all();

    }
    public function headings(): array
    {
        return [
            'Número da inscrição',
            'Criada em',
            'Modificada em',
            'Candidato',
            'Data de Nascimento',
            'CPF',
            'RG',
            'UF-RG',
            'Órgão Expedidor',
            'Sexo',
            'E-mail',
            'Telefone',
            'Telefone Alternativo',
            'CEP',
            'UF',
            'Cidade',
            'Rua',
            'Número',
            'Complemento',
            'Emprego Público',
            'Carga Horária',
            'Formação',
            'Vencimento',
            'Vagas',
            'PSS',
            'Pontuação Total',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'B' => NumberFormat::FORMAT_DATE_DATETIME,
            'C' => NumberFormat::FORMAT_DATE_DATETIME,

            
            'E' => NumberFormat::FORMAT_DATE_DDMMYYYY,
            'G' => NumberFormat::FORMAT_TEXT
        ];
    }
}
