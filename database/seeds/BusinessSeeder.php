<?php

use Illuminate\Database\Seeder;

class BusinessSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('empresa')->insert([
            'razao_social' => 'Testing',
            'fantasia'  => 'Testing',
            'cnpj' => '12154548-100',
            'email' => 'testing@coosuiponte.com.br',
            'contato' => '123456',
        ]);
    }
}
