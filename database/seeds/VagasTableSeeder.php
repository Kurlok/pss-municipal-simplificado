<?php

use Illuminate\Database\Seeder;

class VagasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vagas')->insert(
            [
                'emprego' => 'Agente Comunitário de Saúde',
                'pss' => '1/2019 - Saúde',
                'formacao' => 'Ensino Médio',
                'cargaHoraria' => '40h semanais',
                'vencimento' => '1200.00',
                'numVagas' => '20',
            ]
        );
        DB::table('vagas')->insert(
            [
                'emprego' => 'Técnico em Enfermagem',
                'pss' => '1/2019 - Saúde',
                'formacao' => 'Ensino Médio',
                'cargaHoraria' => '40h semanais',
                'vencimento' => '2200.00',
                'numVagas' => '10',
            ],
        );
    }
}
