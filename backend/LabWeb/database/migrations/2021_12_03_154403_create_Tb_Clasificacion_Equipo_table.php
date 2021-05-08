<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbClasificacionEquipoTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Tb_Clasificacion_Equipo', function (Blueprint $table) {
			$table->integer('id', true);
			$table->integer('NUM_HOJA_VIDA', 10, 0)->nullable()->index('tb_clasificacion_equipo_ibfk_1');
			$table->string('CLASIFICACION_DE_EQUIPO', 600)->default('Médico');
			$table->string('CLASIFICACION_USO', 600)->default('Médico');
			$table->string('CLASIFICACION_BIOMEDICA', 600)->default('Diagnóstico');
			$table->string('TECNOLOGIA_PREDOMINANTE', 600)->default('Mecánico');
			$table->string('CLASIFICACION_RIESGO', 600)->default('Bajo Riesgo I');
			$table->string('CLASE_RIESGO_ELECTRICO', 110)->nullable()->default('N/P');
			$table->string('TIPO_RIESGO_ELECTRICO', 110)->nullable()->default('N/P');
			$table->string('CLASES_SOFTWARE', 600)->default('Programación');
			$table->string('COMPLEJIDAD_TECNOLOGICA_EQUIPO', 110)->nullable()->default('N/P');
			$table->string('FUENTES_ALIMENTACION', 600)->default('Electricidad');
			$table->string('CICLO_MANTENIMIENTO', 600)->default('12 Meses');
			$table->string('CICLO_CALIB_VALID_CALPERSONAL', 600)->default('12 Meses');
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
		Schema::drop('Tb_Clasificacion_Equipo');
	}
}