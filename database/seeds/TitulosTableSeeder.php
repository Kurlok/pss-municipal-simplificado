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
        //Títulos Agente comunitário e agente de dengue
        $idVaga = 1;
        for ( $i=0; $i<36; $i++){
            DB::table('titulos')->insert([
                'nome' => 'Ensino médio completo',
                'pontos' => '20',
                'fk_vagas_id' => $idVaga
            ]);
            DB::table('titulos')->insert([
                'nome' => 'Carteira de Habilitação B',
                'pontos' => '20',
                'fk_vagas_id' => $idVaga
            ]);
            DB::table('titulos')->insert([
                'nome' => 'Curso Superior (em qualquer área) registrado no MEC',
                'pontos' => '40',
                'fk_vagas_id' => $idVaga
            ]);
            DB::table('titulos')->insert([
                'nome' => 'Pós graduação (em qualquer área)',
                'pontos' => '20',
                'fk_vagas_id' => $idVaga
            ]);
            $idVaga++;
        }

        //Motorista II
        DB::table('titulos')->insert([
            'nome' => 'Ensino médio completo',
            'pontos' => '20',
            'fk_vagas_id' => '47'
        ]);
        DB::table('titulos')->insert([
            'nome' => 'Carteira de Habilitação D',
            'pontos' => '20',
            'fk_vagas_id' => '47'
        ]);
        DB::table('titulos')->insert([
            'nome' => 'Curso Superior (em qualquer área) registrado no MEC',
            'pontos' => '40',
            'fk_vagas_id' => '47'
        ]);
        DB::table('titulos')->insert([
            'nome' => 'Pós graduação (em qualquer área)',
            'pontos' => '20',
            'fk_vagas_id' => '47'
        ]);

        //Assistente de farmácia e técnicos
        //Assistente de farmácia
        DB::table('titulos')->insert([
            'nome' => 'Certificado de conclusão de curso para o emprego que concorre',
            'pontos' => '20',
            'fk_vagas_id' => '37'
        ]);
        DB::table('titulos')->insert([
            'nome' => 'Carteira de Habilitação B',
            'pontos' => '20',
            'fk_vagas_id' => '37'
        ]);
        DB::table('titulos')->insert([
            'nome' => 'Curso Superior (em qualquer área) registrado no MEC',
            'pontos' => '40',
            'fk_vagas_id' => '37'
        ]);
        DB::table('titulos')->insert([
            'nome' => 'Pós graduação (em qualquer área)',
            'pontos' => '20',
            'fk_vagas_id' => '37'
        ]);
        //Técnico em Higiene Dentária
        DB::table('titulos')->insert([
            'nome' => 'Certificado de conclusão de curso para o emprego que concorre',
            'pontos' => '20',
            'fk_vagas_id' => '50'
        ]);
        DB::table('titulos')->insert([
            'nome' => 'Carteira de Habilitação B',
            'pontos' => '20',
            'fk_vagas_id' => '50'
        ]);
        DB::table('titulos')->insert([
            'nome' => 'Curso Superior (em qualquer área) registrado no MEC',
            'pontos' => '40',
            'fk_vagas_id' => '50'
        ]);
        DB::table('titulos')->insert([
            'nome' => 'Pós graduação (em qualquer área)',
            'pontos' => '20',
            'fk_vagas_id' => '50'
        ]);
        //Técnico em Enfermagem
        DB::table('titulos')->insert([
            'nome' => 'Certificado de conclusão de curso para o emprego que concorre',
            'pontos' => '20',
            'fk_vagas_id' => '51'
        ]);
        DB::table('titulos')->insert([
            'nome' => 'Carteira de Habilitação B',
            'pontos' => '20',
            'fk_vagas_id' => '51'
        ]);
        DB::table('titulos')->insert([
            'nome' => 'Curso Superior (em qualquer área) registrado no MEC',
            'pontos' => '40',
            'fk_vagas_id' => '51'
        ]);
        DB::table('titulos')->insert([
            'nome' => 'Pós graduação (em qualquer área)',
            'pontos' => '20',
            'fk_vagas_id' => '51'
        ]);
        $idVaga = 38;
        for ( $i=0; $i<12; $i++){
            if ($idVaga != 47 ){
            DB::table('titulos')->insert([
                'nome' => 'Diploma de Curso Superior registrado no MEC',
                'pontos' => '20',
                'fk_vagas_id' => $idVaga
            ]);
            DB::table('titulos')->insert([
                'nome' => 'Pós-Graduação',
                'pontos' => '20',
                'fk_vagas_id' => $idVaga
            ]);
            DB::table('titulos')->insert([
                'nome' => 'Mestrado',
                'pontos' => '40',
                'fk_vagas_id' => $idVaga
            ]);
            DB::table('titulos')->insert([
                'nome' => 'Carteira Nacional de Habilitação',
                'pontos' => '20',
                'fk_vagas_id' => $idVaga
            ]);
            }
            $idVaga++;

        }
    }

    
}
