<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class InscricoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // DB::table('inscricoes')->insert([
        //     'nome' => 'Felipe Augusto Barcelos',
        //     'dataNascimento' => '1990-02-16',
        //     'email' => 'felipe.augum@gmail.com',
        //     'cpf' => '111.111.111-11',
        //     'rg' => '11111111111',
        //     'ufRg' => 'PR',
        //     'orgaoExpedidor' => 'SSP',
        //     'sexo' => 'Masculino',
        //     'complemento' => 'Apartamento',
        //     'telefone' => '99999999999',
        //     'telefoneAlternativo' => '88888888888',
        //     'cep' => '84130-000',
        //     'uf' => 'PR',
        //     'cidade' => 'Palmeira',
        //     'rua' => 'Jesuino',
        //     'numero' => '1221',
        //     'deficiencia' => 'Auditiva',
        //     'deficienciaDescricao' => 'Não escuto nada.',

        //     'fk_vagas_id' => '1',

        // ]);

        $faker = Faker::create();
        for ($i = 0; $i < 10000; $i++) {
            DB::table('inscricoes')->insert([
                'nome' => $faker->name,
                'dataNascimento' => '1990-02-16',
                'email' => 'felipe.augum@gmail.com',
                'cpf' => Str::random(15),
                'rg' => Str::random(15),
                'ufRg' => 'PR',
                'orgaoExpedidor' => 'SSP',
                'sexo' => 'Masculino',
                'complemento' => 'Apartamento',
                'telefone' => '99999999999',
                'telefoneAlternativo' => '88888888888',
                'cep' => '84130-000',
                'uf' => 'PR',
                'cidade' => 'Palmeira',
                'rua' => 'Jesuino',
                'numero' => '1221',
                'deficiencia' => 'Auditiva',
                'deficienciaDescricao' => 'Não escuto nada.',
    
                'fk_vagas_id' => rand(1, 50),
    
            ]);
        }
    }
}
