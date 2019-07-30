<?php

namespace App\Exports;

use App\Inscricao;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class InscricoesExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('inscricoes')
        ->select(DB::raw('inscricoes.id, inscricoes.nome, inscricoes.dataNascimento, vagas.emprego, SUM(titulos.pontos)'))
        ->join('inscricoes_titulos', 'inscricoes.id', '=', 'inscricoes_titulos.fk_inscricoes_id')
        ->join('titulos', 'titulos.id', '=', 'inscricoes_titulos.fk_titulos_id')
        ->join('vagas', 'vagas.id', '=', 'inscricoes.fk_vagas_id')
        ->groupBy('inscricoes.id', 'inscricoes.nome', 'inscricoes.dataNascimento', 'vagas.emprego')
        ->get();
        

       // return Inscricao::all();

    }
    public function headings(): array
    {
        return [
            'Número da inscrição',
            'Candidato',
            'Data de Nascimento',
            'Emprego Público',
            'Pontuação Total',
        ];
    }
}
