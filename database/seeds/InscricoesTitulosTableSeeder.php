<?php

use Illuminate\Database\Seeder;

class InscricoesTitulosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inscricoes_titulos')->insert([
            'fk_inscricoes_id' => '1',
            'fk_titulos_id' => '1',
        ]);
        DB::table('inscricoes_titulos')->insert([
            'fk_inscricoes_id' => '1',
            'fk_titulos_id' => '2',
        ]);
    }
}
