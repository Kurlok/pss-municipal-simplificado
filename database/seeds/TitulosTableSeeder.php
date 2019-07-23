<?php

use Illuminate\Database\Seeder;

class TitulosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('titulos')->insert([
            'nome' => 'Pós Graduação',
            'pontos' => '20',
            'fk_vagas_id' => '1'
        ]);
        DB::table('titulos')->insert([
            'nome' => 'Carteira de Motorista B',
            'pontos' => '10',
            'fk_vagas_id' => '1'
        ]);
    
    }
}
