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
        for ($i = 0; $i < 39; $i++) {
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
                'titulo' => 'Curso Superior na Área de Saúde',
                'pontos' => '35',
                'fk_vagas_id' => $idVaga
            ]);
            $idVaga++;
        }

        //Motorista II
        DB::table('titulos')->insert([
            'titulo' => 'Carteira de Habilitação D ou E',
            'pontos' => '20',
            'fk_vagas_id' => '50'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso de Primeiros Socorros',
            'pontos' => '25',
            'fk_vagas_id' => '50'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso de Direção Defensiva',
            'pontos' => '20',
            'fk_vagas_id' => '50'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso Condutores de Veículos de Emergência/Condutor de Ambulância',
            'pontos' => '35',
            'fk_vagas_id' => '50'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Carteira de Habilitação D ou E',
            'pontos' => '20',
            'fk_vagas_id' => '50'
        ]);

        //Assistente de farmácia e técnicos
        //Assistente de farmácia
        DB::table('titulos')->insert([
            'titulo' => 'Carteira de Habilitação B',
            'pontos' => '10',
            'fk_vagas_id' => '40'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso de Assistente/Atendente de Farmácia',
            'pontos' => '20',
            'fk_vagas_id' => '40'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso em Gestão Pública',
            'pontos' => '20',
            'fk_vagas_id' => '40'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso Superior',
            'pontos' => '25',
            'fk_vagas_id' => '40'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação na Área de Farmácia',
            'pontos' => '25',
            'fk_vagas_id' => '40'
        ]);
        //Técnico em Higiene Dentária
        DB::table('titulos')->insert([
            'titulo' => 'Carteira de Habilitação B',
            'pontos' => '10',
            'fk_vagas_id' => '53'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Ensino médio completo',
            'pontos' => '10',
            'fk_vagas_id' => '53'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso de Técnico em Saúde Bucal',
            'pontos' => '10',
            'fk_vagas_id' => '53'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso em Gestão Pública',
            'pontos' => '35',
            'fk_vagas_id' => '53'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Graduação em Curso Superior (qualquer área).',
            'pontos' => '35',
            'fk_vagas_id' => '53'
        ]);
        //Técnico em Enfermagem
        DB::table('titulos')->insert([
            'titulo' => 'Carteira de Habilitação B',
            'pontos' => '10',
            'fk_vagas_id' => '54'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso de Enfermagem',
            'pontos' => '20',
            'fk_vagas_id' => '54'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso em Gestão Pública',
            'pontos' => '20',
            'fk_vagas_id' => '54'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Graduação em Enfermagem',
            'pontos' => '20',
            'fk_vagas_id' => '54'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação em Saúde Pública',
            'pontos' => '30',
            'fk_vagas_id' => '54'
        ]);

        //Assistente Social
        DB::table('titulos')->insert([
            'titulo' => 'Carteira de Habilitação B',
            'pontos' => '10',
            'fk_vagas_id' => '41'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Graduação em Serviço Social',
            'pontos' => '10',
            'fk_vagas_id' => '41'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação na área de serviço social',
            'pontos' => '20',
            'fk_vagas_id' => '41'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso em Gestão Pública',
            'pontos' => '30',
            'fk_vagas_id' => '41'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação em Gestão de Serviço Social',
            'pontos' => '30',
            'fk_vagas_id' => '41'
        ]);

        //Cirurgião Dentista
        DB::table('titulos')->insert([
            'titulo' => 'Carteira de Habilitação B',
            'pontos' => '10',
            'fk_vagas_id' => '42'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Graduação em Odontologia',
            'pontos' => '10',
            'fk_vagas_id' => '42'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso em Gestão Pública',
            'pontos' => '20',
            'fk_vagas_id' => '42'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação na Área de Odontologia',
            'pontos' => '25',
            'fk_vagas_id' => '42'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação em Cirurgia e Traumatologia Buco Maxilo Faciais',
            'pontos' => '35',
            'fk_vagas_id' => '42'
        ]);

        //Cirurgião Dentista - ESF
        DB::table('titulos')->insert([
            'titulo' => 'Carteira de Habilitação B',
            'pontos' => '10',
            'fk_vagas_id' => '43'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Graduação em Odontologia',
            'pontos' => '10',
            'fk_vagas_id' => '43'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso em Gestão Pública',
            'pontos' => '20',
            'fk_vagas_id' => '43'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação na Área de Odontologia',
            'pontos' => '25',
            'fk_vagas_id' => '43'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação em Cirurgia e Traumatologia Buco Maxilo Faciais',
            'pontos' => '35',
            'fk_vagas_id' => '43'
        ]);

        //Enfermeiro
        DB::table('titulos')->insert([
            'titulo' => 'Carteira de Habilitação B',
            'pontos' => '10',
            'fk_vagas_id' => '44'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Graduação em Enfermagem',
            'pontos' => '10',
            'fk_vagas_id' => '44'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso em Gestão Pública',
            'pontos' => '20',
            'fk_vagas_id' => '44'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso em Saúde da Família',
            'pontos' => '20',
            'fk_vagas_id' => '44'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação em Auditoria em enfermagem',
            'pontos' => '40',
            'fk_vagas_id' => '44'
        ]);

        //Enfermeiro - ESF
        DB::table('titulos')->insert([
            'titulo' => 'Carteira de Habilitação B',
            'pontos' => '10',
            'fk_vagas_id' => '45'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Graduação em Enfermagem',
            'pontos' => '10',
            'fk_vagas_id' => '45'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso em Gestão Pública',
            'pontos' => '20',
            'fk_vagas_id' => '45'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso em Saúde da Família',
            'pontos' => '20',
            'fk_vagas_id' => '45'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação em Auditoria em enfermagem',
            'pontos' => '40',
            'fk_vagas_id' => '45'
        ]);

        //Farmacêutico
        DB::table('titulos')->insert([
            'titulo' => 'Carteira de Habilitação B',
            'pontos' => '10',
            'fk_vagas_id' => '46'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Graduação em Farmácia',
            'pontos' => '10',
            'fk_vagas_id' => '46'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso em Gestão Pública',
            'pontos' => '20',
            'fk_vagas_id' => '46'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação na Área de Farmácia',
            'pontos' => '30',
            'fk_vagas_id' => '46'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação em farmácia clínica e prescrição farmacêutica',
            'pontos' => '30',
            'fk_vagas_id' => '46'
        ]);

        //Farmacêutico
        DB::table('titulos')->insert([
            'titulo' => 'Carteira de Habilitação B',
            'pontos' => '10',
            'fk_vagas_id' => '47'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Graduação em Fisioterapia',
            'pontos' => '10',
            'fk_vagas_id' => '47'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso em Gestão Pública',
            'pontos' => '20',
            'fk_vagas_id' => '47'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação em LER e DORT',
            'pontos' => '25',
            'fk_vagas_id' => '47'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação em Saúde da mulher',
            'pontos' => '35',
            'fk_vagas_id' => '47'
        ]);

        //Médico - ESF
        DB::table('titulos')->insert([
            'titulo' => 'Carteira de Habilitação B',
            'pontos' => '10',
            'fk_vagas_id' => '48'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Graduação em Medicina',
            'pontos' => '10',
            'fk_vagas_id' => '48'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso em Gestão Pública',
            'pontos' => '20',
            'fk_vagas_id' => '48'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação em Saúde da Mulher, da criança e do Adolescente.',
            'pontos' => '25',
            'fk_vagas_id' => '48'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação em Saúde Mental',
            'pontos' => '35',
            'fk_vagas_id' => '48'
        ]);

        //Médico Clínico Geral
        DB::table('titulos')->insert([
            'titulo' => 'Carteira de Habilitação B',
            'pontos' => '10',
            'fk_vagas_id' => '49'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Graduação em Medicina',
            'pontos' => '10',
            'fk_vagas_id' => '49'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso em Gestão Pública',
            'pontos' => '20',
            'fk_vagas_id' => '49'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação em Saúde da Mulher, da criança e do Adolescente.',
            'pontos' => '25',
            'fk_vagas_id' => '49'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação em Saúde Mental',
            'pontos' => '35',
            'fk_vagas_id' => '49'
        ]);

        //Nutricionista
        DB::table('titulos')->insert([
            'titulo' => 'Carteira de Habilitação B',
            'pontos' => '10',
            'fk_vagas_id' => '51'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Graduação em Nutrição',
            'pontos' => '10',
            'fk_vagas_id' => '51'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso em Gestão Pública',
            'pontos' => '20',
            'fk_vagas_id' => '51'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação em Nutrição Clínica',
            'pontos' => '25',
            'fk_vagas_id' => '51'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação em Nutrição Materno Infantil',
            'pontos' => '35',
            'fk_vagas_id' => '51'
        ]);        

        //Psicólogo
        DB::table('titulos')->insert([
            'titulo' => 'Carteira de Habilitação B',
            'pontos' => '10',
            'fk_vagas_id' => '52'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Graduação em Psicologia',
            'pontos' => '10',
            'fk_vagas_id' => '52'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Curso em Gestão Pública',
            'pontos' => '20',
            'fk_vagas_id' => '52'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação na área de Saúde Mental',
            'pontos' => '25',
            'fk_vagas_id' => '52'
        ]);
        DB::table('titulos')->insert([
            'titulo' => 'Pós-graduação em psicologia na área de infância e juventude',
            'pontos' => '35',
            'fk_vagas_id' => '52'
        ]);           
    }

    
}
