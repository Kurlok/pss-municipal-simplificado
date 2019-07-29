<?php

namespace App\Exports;

use App\Inscricao;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;

class InscricoesExport implements FromCollection, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('inscricoes')
        ->select(DB::raw('inscricoes.nome, vagas.emprego, SUM(titulos.pontos)'))
        ->join('inscricoes_titulos', 'inscricoes.id', '=', 'inscricoes_titulos.fk_inscricoes_id')
        ->join('titulos', 'titulos.id', '=', 'inscricoes_titulos.fk_titulos_id')
        ->join('vagas', 'vagas.id', '=', 'inscricoes.fk_vagas_id')
        ->groupBy('inscricoes.nome', 'vagas.emprego')
        ->get();
        

       // return Inscricao::all();

    }
    public function headings(): array
    {
        return [
            '#',
            'Name',
            'Email',
            'Created At',
            'Updated At',
        ];
    }
}
