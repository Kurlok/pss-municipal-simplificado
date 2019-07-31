<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Inscricao;

class InscricaoTituloExport implements FromCollection, ShouldAutoSize, WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {

        return DB::table('inscricoes')
        ->join('inscricoes_titulos', 'inscricoes.id', '=', 'inscricoes_titulos.fk_inscricoes_id')
        ->join('titulos', 'titulos.id', '=', 'inscricoes_titulos.fk_titulos_id')
        ->join('vagas', 'vagas.id', '=', 'inscricoes.fk_vagas_id')
        ->select('inscricoes.id', 'inscricoes.nome', 'vagas.emprego', 'titulos.titulo', 'titulos.pontos')
        ->get();

        // return DB::table('inscricoes')
        // ->join('inscricoes_titulos', 'inscricoes.id', '=', 'inscricoes_titulos.fk_inscricoes_id')
        // ->join('titulos', 'titulos.id', '=', 'inscricoes_titulos.fk_titulos_id')
        // ->get();
        }

        public function headings(): array
        {
            return [
                'Número da inscrição',
                'Candidato',
                'Emprego Público',
                'Título',
                'Pontuação do título',
            ];
        }
}
