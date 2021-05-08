<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbCronPlCalibValidCalPnalTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Tb_Plan_Validacion', function (Blueprint $table) {
			$table->integer('id', true);
			$table->integer('NUM_HOJA_VIDA', 10, 0)->index('tb_cron_pl_calib_valid_1');
			$table->string('FCIA_VACION_CALIB', 2000)->default('12 Meses');
			$table->date('FECHA_EJECUCION');
			$table->string('ESTADO_EJECUCION', 2000)->nullable()->default('N/P');
			$table->string('OBSERVACIONES_EQUIPO', 1100)->nullable()->default('N/P');
			$table->integer('Consecutivo_Orden', 10, 0)->index('tb_cron_pl_calib_valid_2');
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
		Schema::drop('Tb_Plan_Validacion');
	}
}
