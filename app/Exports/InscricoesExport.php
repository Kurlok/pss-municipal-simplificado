<?php

namespace App\Exports;

use App\Inscricao;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Support\Facades\DB;

class InscricoesExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return DB::table('inscricoes')
        ->join('vagas', 'vagas.id', '=', 'inscricoes.fk_vagas_id')
        ->get();
    }
}
