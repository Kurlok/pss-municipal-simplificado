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
            'name'=> 'administrador',
            'email' => 'administrador@psspalmeira.com.br',
            'password' => '$2y$10$q0W6UPajaRCMGtmpOSd2susyjz/jg9OXNqr5i1oSslBZ4jYopNH5.',
            ]);
            }
}