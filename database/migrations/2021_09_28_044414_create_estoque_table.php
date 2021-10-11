<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEstoqueTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('estoque', function (Blueprint $table) {
            $table->increments('id');
			$table->string('nome_produto');
			$table->string('lote');
			$table->string('tipo_endereco');
			$table->string('area');
			$table->string('rua');
			$table->string('predio');
			$table->string('nivel');
			$table->string('apto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('estoque');
    }
}
