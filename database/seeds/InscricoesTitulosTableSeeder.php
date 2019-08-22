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
        // DB::table('inscricoes_titulos')->insert([
        //     'fk_inscricoes_id' => '1',
        //     'fk_titulos_id' => '1',
        // ]);
        // DB::table('inscricoes_titulos')->insert([
        //     'fk_inscricoes_id' => '1',
        //     'fk_titulos_id' => '2',
        // ]);

        for ($i = 0; $i < 10000; $i++) {
            DB::table('inscricoes_titulos')->insert([
                'fk_inscricoes_id' => $i + 1,
                'fk_titulos_id' => rand(1, 50),
            ]);
            DB::table('inscricoes_titulos')->insert([
                'fk_inscricoes_id' => $i + 1,
                'fk_titulos_id' => rand(1, 50),
            ]);
            DB::table('inscricoes_titulos')->insert([
                'fk_inscricoes_id' => $i + 1,
                'fk_titulos_id' => rand(1, 50),
            ]);
            DB::table('inscricoes_titulos')->insert([
                'fk_inscricoes_id' => $i + 1,
                'fk_titulos_id' => rand(1, 50),
            ]);
        }
    }
}
