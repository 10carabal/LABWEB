<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbCronPlanMentoEquiposTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Tb_Cron_Plan_Mento_Equipos', function (Blueprint $table) {
			$table->integer('id', true);
			$table->integer('NUM_HOJA_VIDA', 10, 0)->index('tb_cron_plan_mento_equipos_fk1');
			$table->string('FREC_MENTO_PREVENTIVO', 2000)->default('12 Meses');
			$table->date('FECHA_EJECUCION');
			$table->string('ESTADO_EJECUCION', 2000)->nullable()->default('N/P');
			$table->string('RESPONSABLE_MANTENIMIENTO', 110)->nullable()->default('N/P');
			$table->string('OBSERVACIONES_EQUIPO', 1100)->nullable()->default('N/P');
			$table->integer('COSTO_MANTENIMIENTO', 10, 0)->nullable();
			$table->integer('Consecutivo_Orden', 10, 0)->index('tb_cron_plan_mento_equipos_fk2');
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
		Schema::drop('Tb_Cron_Plan_Mento_Equipos');
	}
}