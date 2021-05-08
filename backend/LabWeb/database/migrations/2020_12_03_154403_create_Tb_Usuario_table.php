<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbUsuarioTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Tb_Usuario', function (Blueprint $table) {
			$table->integer('CODIGO', 10, 0);
			$table->integer('CLAVE', 10, 0);
			$table->integer('PERFIL', 10, 0)->index('PERFIL');
			$table->string('remember_token', 110);
			$table->timestamps(6);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('Tb_Usuario');
	}
}
