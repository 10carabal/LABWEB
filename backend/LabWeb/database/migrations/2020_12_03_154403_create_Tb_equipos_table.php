<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbEquiposTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Tb_equipos', function (Blueprint $table) {
			$table->integer('NUM_HOJA_VIDA', 10, 0)
			//->unique('NUM_HOJA_VIDA')
			;
			$table->string('Nombre', 110)->default('N/P');
			$table->string('Imagen_Equipo', 2200)->default('N/P');
			$table->string('Marca', 110)->default('N/P');
			$table->string('Modelo', 110)->nullable()->default('N/P');
			$table->string('Serial', 110)->nullable()->default('N/P');
			$table->string('Activo_Fijo', 110)->nullable()->default('N/P');
			$table->string('Area', 110)->nullable()->default('N/P');
			$table->string('Sub_Area', 110)->nullable()->default('N/P');
			$table->string('Registro_Sanitario', 2000)->default('No');
			$table->string('Permiso_Comercializacion', 2000)->default('No');
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
		Schema::drop('Tb_equipos');
	}
}
