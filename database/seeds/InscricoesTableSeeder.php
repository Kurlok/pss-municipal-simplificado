<?php

use Illuminate\Database\Seeder;

class InscricoesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('inscricoes')->insert([
            'nome'=> 'Felipe Augusto Barcelos',
            'dataNascimento' => '1990-02-16',
            'email' => 'felipe.augum@gmail.com',
            'cpf' => '111.111.111-11',
            'rg' => '11111111111',
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

            'fk_vagas_id' => '1',

            ]);
        }
}
