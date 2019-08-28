<?php

namespace App\Exports;

use App\Recurso;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\FromArray;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use Maatwebsite\Excel\Facades\Excel;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class RecursoExport implements FromCollection, WithHeadings, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Recurso::all();
    }

    public function headings(): array
    {

        return [
            'Número do recurso',

            'Número da inscrição',
            'Fundamentação',
            'Nome',
            'Emprego',
            'E-mail',
            'RG',
            'CPF',
            'Telefone',
            'Celular',
            'Criado em',
            'Atualizado em',
        ];
    }
}
