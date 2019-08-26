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
        for ($i = 0; $i < 36; $i++) {
            DB::table('titulos')->insert([
                'titulo' => 'Carteira de Habilitação B',
                'pontos' => '10',
                'fk_vagas_id' => $idVaga
            ]);
            DB::table('titulos')->insert([
                'titulo' => 'Curso de Endemias',
                'pontos' => '15',
                'fk_vagas_id' => $idVaga
            ]);
            DB::table('titulos')->insert([
                'titulo' => 'Curso de Agente Comunitário da Saúde',
                'pontos' => '15',
                'fk_vagas_id' => $idVaga
            ]);
            DB::table('titulos')->insert([
                'titulo' => 'Curso Técnico em Enfermagem',
                'pontos' => '25',
                'fk_vagas_id' => $idVaga
            ]);
            DB::table('titulos')->insert([
                'titulo' => 'Curso Nível Superior',
                'pontos' => '35',
                'fk_vagas_id' => $idVaga
            ]);
            $idVaga++;
        }

        //Assistente de farmácia
        DB::table('titulos')->insert([
            'titulo' => 'Carteira de Habilitação B',
            'pontos' => '10',
            'fk_vagas_id' => '37'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso Técnico em Enfermagem',
            'pontos' => '10',
            'fk_vagas_id' => '37'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso em Gestão Pública',
            'pontos' => '10',
            'fk_vagas_id' => '37'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso Nível Superior',
            'pontos' => '20',
            'fk_vagas_id' => '37'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso de Atendente de Farmácia',
            'pontos' => '50',
            'fk_vagas_id' => '37'
        ]);

        //Assistente Social
        DB::table('titulos')->insert([
            'titulo' => 'Carteira de Habilitação B',
            'pontos' => '10',
            'fk_vagas_id' => '38'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Graduação em Serviço Social',
            'pontos' => '10',
            'fk_vagas_id' => '38'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação na área de serviço social',
            'pontos' => '20',
            'fk_vagas_id' => '38'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso em Gestão Pública',
            'pontos' => '30',
            'fk_vagas_id' => '38'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação em Gestão de Serviço Social',
            'pontos' => '30',
            'fk_vagas_id' => '38'
        ]);

        //Cirurgião Dentista
        DB::table('titulos')->insert([
            'titulo' => 'Carteira de Habilitação B',
            'pontos' => '10',
            'fk_vagas_id' => '39'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Graduação em Odontologia',
            'pontos' => '20',
            'fk_vagas_id' => '39'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso em Gestão Pública',
            'pontos' => '20',
            'fk_vagas_id' => '39'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação em Odontologia',
            'pontos' => '25',
            'fk_vagas_id' => '39'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação em Odontopediatria',
            'pontos' => '25',
            'fk_vagas_id' => '39'
        ]);

        //Cirurgião Dentista - ESF
        DB::table('titulos')->insert([
            'titulo' => 'Carteira de Habilitação B',
            'pontos' => '10',
            'fk_vagas_id' => '40'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Graduação em Odontologia',
            'pontos' => '20',
            'fk_vagas_id' => '40'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso em Gestão Pública',
            'pontos' => '20',
            'fk_vagas_id' => '40'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação na Área de Odontologia',
            'pontos' => '25',
            'fk_vagas_id' => '40'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação em Saúde da Família',
            'pontos' => '25',
            'fk_vagas_id' => '40'
        ]);

        //Enfermeiro
        DB::table('titulos')->insert([
            'titulo' => 'Carteira de Habilitação B',
            'pontos' => '10',
            'fk_vagas_id' => '41'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Graduação em Enfermagem',
            'pontos' => '15',
            'fk_vagas_id' => '41'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso em Gestão Pública',
            'pontos' => '25',
            'fk_vagas_id' => '41'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação em Saúde da Família',
            'pontos' => '25',
            'fk_vagas_id' => '41'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação em outra área de enfermagem',
            'pontos' => '25',
            'fk_vagas_id' => '41'
        ]);

        //Enfermeiro - ESF
        DB::table('titulos')->insert([
            'titulo' => 'Carteira de Habilitação B',
            'pontos' => '10',
            'fk_vagas_id' => '42'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Graduação em Enfermagem',
            'pontos' => '15',
            'fk_vagas_id' => '42'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso em Gestão Pública',
            'pontos' => '25',
            'fk_vagas_id' => '42'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação em Saúde da Família',
            'pontos' => '25',
            'fk_vagas_id' => '42'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação em outra área de enfermagem',
            'pontos' => '25',
            'fk_vagas_id' => '42'
        ]);

        //Farmacêutico
        DB::table('titulos')->insert([
            'titulo' => 'Carteira de Habilitação B',
            'pontos' => '10',
            'fk_vagas_id' => '43'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso superior em Farmácia',
            'pontos' => '15',
            'fk_vagas_id' => '43'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso em Gestão Pública',
            'pontos' => '25',
            'fk_vagas_id' => '43'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação em Saúde da Família',
            'pontos' => '25',
            'fk_vagas_id' => '43'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação em outra área',
            'pontos' => '25',
            'fk_vagas_id' => '43'
        ]);

        //Fisioterapeuta
        DB::table('titulos')->insert([
            'titulo' => 'Carteira de Habilitação B',
            'pontos' => '10',
            'fk_vagas_id' => '44'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Graduação em Fisioterapia',
            'pontos' => '15',
            'fk_vagas_id' => '44'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso em Gestão Pública',
            'pontos' => '25',
            'fk_vagas_id' => '44'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação Saúde da Família',
            'pontos' => '25',
            'fk_vagas_id' => '44'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação em Fisioterapia ou Saúde da Mulher',
            'pontos' => '25',
            'fk_vagas_id' => '44'
        ]);

        //Médico - ESF
        DB::table('titulos')->insert([
            'titulo' => 'Carteira de Habilitação B',
            'pontos' => '10',
            'fk_vagas_id' => '45'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso em Gestão Pública',
            'pontos' => '15',
            'fk_vagas_id' => '45'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso ACLS – Suporte Avançado de Vida em Cardiologia – carga horária mínimo 16hs',
            'pontos' => '25',
            'fk_vagas_id' => '45'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação em Saúde da Família',
            'pontos' => '25',
            'fk_vagas_id' => '45'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação em Saúde da Mulher, da Criança e do Adolescente',
            'pontos' => '25',
            'fk_vagas_id' => '45'
        ]);

        //Médico Clínico Geral
        DB::table('titulos')->insert([
            'titulo' => 'Carteira de Habilitação B',
            'pontos' => '10',
            'fk_vagas_id' => '46'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso em Gestão Pública',
            'pontos' => '15',
            'fk_vagas_id' => '46'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso ACLS – Suporte Avançado de Vida em Cardiologia – carga horária mínimo 16hs',
            'pontos' => '25',
            'fk_vagas_id' => '46'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação em medicina',
            'pontos' => '25',
            'fk_vagas_id' => '46'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação em Saúde da Mulher, da Criança e do Adolescente',
            'pontos' => '25',
            'fk_vagas_id' => '46'
        ]);

        //Motorista II
        DB::table('titulos')->insert([
            'titulo' => 'Carteira de Habilitação D ou E',
            'pontos' => '20',
            'fk_vagas_id' => '47'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso em Gestão Pública',
            'pontos' => '10',
            'fk_vagas_id' => '47'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso de Primeiros Socorros',
            'pontos' => '20',
            'fk_vagas_id' => '47'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso de Direção Defensiva',
            'pontos' => '25',
            'fk_vagas_id' => '47'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso Condutores de Veículos de Emergência/Condutor de Ambulância',
            'pontos' => '25',
            'fk_vagas_id' => '47'
        ]);

        //Nutricionista
        DB::table('titulos')->insert([
            'titulo' => 'Carteira de Habilitação B',
            'pontos' => '10',
            'fk_vagas_id' => '48'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Graduação em Nutrição',
            'pontos' => '10',
            'fk_vagas_id' => '48'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso em Gestão Pública',
            'pontos' => '20',
            'fk_vagas_id' => '48'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação em Nutrição Clínica',
            'pontos' => '25',
            'fk_vagas_id' => '48'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação em Nutrição Materno Infantil',
            'pontos' => '35',
            'fk_vagas_id' => '48'
        ]);

        //Psicólogo
        DB::table('titulos')->insert([
            'titulo' => 'Carteira de Habilitação B',
            'pontos' => '10',
            'fk_vagas_id' => '49'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Graduação em Psicologia',
            'pontos' => '10',
            'fk_vagas_id' => '49'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso em Gestão Pública',
            'pontos' => '20',
            'fk_vagas_id' => '49'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação na área de Saúde Mental',
            'pontos' => '25',
            'fk_vagas_id' => '49'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação em psicologia na área de infância e juventude',
            'pontos' => '35',
            'fk_vagas_id' => '49'
        ]);

        //Técnico em Higiene Dentária
        DB::table('titulos')->insert([
            'titulo' => 'Carteira de Habilitação B',
            'pontos' => '10',
            'fk_vagas_id' => '50'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso em Técnico de Higiene Dentária',
            'pontos' => '15',
            'fk_vagas_id' => '50'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso em Gestão Pública',
            'pontos' => '25',
            'fk_vagas_id' => '50'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso Superior na área de saúde',
            'pontos' => '25',
            'fk_vagas_id' => '50'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação na área de saúde',
            'pontos' => '25',
            'fk_vagas_id' => '50'
        ]);

        //Técnico em Enfermagem
        DB::table('titulos')->insert([
            'titulo' => 'Carteira de Habilitação B',
            'pontos' => '10',
            'fk_vagas_id' => '51'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso Técnico de Enfermagem',
            'pontos' => '20',
            'fk_vagas_id' => '51'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso em Gestão Pública',
            'pontos' => '20',
            'fk_vagas_id' => '51'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Graduação em Enfermagem',
            'pontos' => '20',
            'fk_vagas_id' => '51'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação em Saúde Pública',
            'pontos' => '30',
            'fk_vagas_id' => '51'
        ]);
    }
}
