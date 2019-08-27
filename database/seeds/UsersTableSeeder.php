<?php

use Illuminate\Database\Seeder;

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
            'email' => 'pss@palmeira.pr.gov.br',
            'password' => '$2y$10$F1sN1I/7vJ.vYS4k/1GfK.FS9dgSkwTrtzB0aSrCqPuP1l.TZe26S',
        ]);
    }
}
