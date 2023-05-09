<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTipoEnderecoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tipo_endereco', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('empresa_id')->nullable();
			$table->string('tipo_endereco');
            $table->timestamps();
            $table->foreign('empresa_id')->references('id')->on('empresa')->nullable()->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tipo_endereco');
    }
}
