<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('usuarios')->insert([
            'empresa_id' => 1,
            'nome'       => 'Coosuiponte',
            'sobrenome'  => 'Coosuiponte',
            'email' => 'testing@testing.com',
            'login' => 'testing@testing.com',
            'password' => bcrypt('1234'),
            'nivel_acesso' => 'administrador',
        ]);
    }
}
