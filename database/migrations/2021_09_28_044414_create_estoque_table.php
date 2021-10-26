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
			$table->string('codigo');
			$table->string('nome_produto');
			$table->string('ean');
			$table->string('fornecedor');
			$table->string('sub_especie');
			$table->string('lote');
			$table->string('endereco');
			$table->string('tipo_endereco');
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
