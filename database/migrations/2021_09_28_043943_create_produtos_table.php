<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->increments('id');
			$table->string('ean');
			$table->string('nome');
			$table->string('data_fabricacao')->nullable();
			$table->string('data_vencimento')->nullable();
			$table->string('quant_atual')->nullable();
			$table->string('quant_minimo')->nullable();
			$table->string('localizacao')->nullable();
			$table->string('sub_especie')->nullable();
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
        Schema::dropIfExists('produtos');
    }
}
