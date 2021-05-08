<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbPerfilUsuarioTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Tb_Perfil_Usuario', function (Blueprint $table) {
			$table->integer('NUM_PERFIL', 10, 0)->nullable();
			$table->string('DESCRIPCION_PERFIL')->default('Empleado');
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
		Schema::drop('Tb_Perfil_Usuario');
	}
}