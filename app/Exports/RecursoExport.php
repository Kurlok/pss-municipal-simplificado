<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;

class RecursoExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
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
