<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbInformacionTecnicaEquipoTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Tb_Informacion_Tecnica_Equipo', function (Blueprint $table) {
			$table->integer('id', true);
			$table->integer('NUM_HOJA_VIDA', 10, 0)->index('tb_info_tecnica_equipo_idx');
			$table->string('Codigo_ECRI', 110)->default('N/P');
			$table->string('Nomenclatura_Internacional', 1110)->default('N/P');
			$table->string('Nomenclatura', 1110)->default('N/P');
			$table->string('Tipo_Equipo', 2000)->default('Móvil');
			$table->string('Firmware', 2000)->default('No');
			$table->string('Software', 2000)->default('No');
			$table->integer('Rango_Voltaje', 10, 0)->nullable()->default(0);
			$table->integer('Corriente', 10, 0)->nullable()->default(0);
			$table->integer('Potencia', 10, 0)->nullable()->default(0);
			$table->integer('Frecuencia_HZ', 10, 0)->nullable()->default(0);
			$table->integer('Dimensiones_CM', 10, 0)->nullable()->default(0);
			$table->integer('Presion', 10, 0)->nullable()->default(0);
			$table->integer('Temperatura', 10, 0)->nullable()->default(0);
			$table->integer('Peso_KGS', 10, 0)->nullable()->default(0);
			$table->integer('Humedad', 10, 0)->nullable()->default(0);
			$table->integer('RPM', 10, 0)->nullable()->default(0);
			$table->string('Descripcion_Equipo', 1110)->nullable()->default('N/P');
			$table->string('Otras_Recomendaciones', 1110)->nullable()->default('N/P');
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
		Schema::drop('Tb_Informacion_Tecnica_Equipo');
	}
}