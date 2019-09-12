<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => 'comissao.pss.1.2019@palmeira.pr.gov.br',
            'password' => Hash::make('novaONDAplanet@66'),
        ]);
    }
}
