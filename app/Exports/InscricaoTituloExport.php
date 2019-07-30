<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class InscricaoTituloExport implements FromCollection
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
        }
}
