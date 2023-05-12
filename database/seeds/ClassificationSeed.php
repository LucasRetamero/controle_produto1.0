<?php

use Illuminate\Database\Seeder;

class ClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('classificacao')->insert([
            'empresa_id' => 1,
            'nome'       => 'baixo',
        ]);

        DB::table('classificacao')->insert([
            'empresa_id' => 1,
            'nome'       => 'medio',
        ]);

        DB::table('classificacao')->insert([
            'empresa_id' => 1,
            'nome'       => 'alta',
        ]);
    }
}
