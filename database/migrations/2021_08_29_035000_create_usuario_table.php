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
        Schema::create('usuario_table', function (Blueprint $table) {
            $table->increments('id_user');
			$table->string('nome');
			$table->string('sobrenome');
			$table->string('email')->unique();
			$table->string('login')->unique();
			$table->string('password');
		    $table->string('nivelAcesso');
      		$table->rememberToken();
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
        Schema::dropIfExists('usuario_table');
    }
}
