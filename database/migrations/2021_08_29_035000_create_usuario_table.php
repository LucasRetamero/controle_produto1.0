<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsuarioTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::create('usuarios', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedBigInteger('empresa_id')->nullable();
			$table->string('nome');
			$table->string('sobrenome');
			$table->string('email', 60)->unique();
			$table->string('login');
			$table->string('password');
			$table->string('nivel_acesso');
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
        Schema::dropIfExists('usuarios');
    }
}
