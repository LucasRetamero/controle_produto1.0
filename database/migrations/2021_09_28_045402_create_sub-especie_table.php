<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubEspecieTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_especie', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('empresa_id')->nullable();
			$table->string('sub_especie');
            $table->rememberToken();
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
        Schema::dropIfExists('sub_especie');
    }
}
