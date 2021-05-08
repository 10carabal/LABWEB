<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbInspFuncionalidadEquiposTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Tb_Insp_Funcionalidad_Equipos', function (Blueprint $table) {
			$table->integer('id', true);
			$table->integer('NUM_HOJA_VIDA', 10, 0)->index('tb_insp_func_equipos_ibfk_1');
			$table->integer('Consecutivo_Orden', 10, 0)->index('tb_insp_func_equipos_ibfk_2');
			$table->string('Laboratorio', 110)->default('N/P');
			$table->date('Fecha_Ejecucion');
			$table->string('Nombre_Responsable', 110)->default('N/P');
			$table->string('Cargo_Responsable', 110)->default('N/P');
			$table->string('Funcionamiento_Equipo', 2000)->default('BE Buen Estado');
			$table->string('Estado_Entorno', 2000)->default('BE Buen Estado');
			$table->string('Estado_Accesorio_Consumibles', 2000)->default('BE Buen Estado');
			$table->string('Estado_lineas_Alimentacion', 2000)->default('BE Buen Estado');
			$table->string('Estado_Almacenamiento', 2000)->default('BE Buen Estado');
			$table->string('Documentacion_Presente', 2000)->default('BE Buen Estado');
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
		Schema::drop('Tb_Insp_Funcionalidad_Equipos');
	}
}