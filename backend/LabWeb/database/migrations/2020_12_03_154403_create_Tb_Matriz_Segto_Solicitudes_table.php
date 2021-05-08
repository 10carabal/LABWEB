<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbMatrizSegtoSolicitudesTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Tb_Matriz_Segto_Solicitudes', function (Blueprint $table) {
			$table->integer('id', true);
			$table->integer('NUM_HOJA_VIDA', 10, 0)->index('tb_matriz_segto_solicitud_fk_2');
			$table->integer('Consecutivo_Orden', 10, 0)->index('tb_matriz_segto_solicitud_fk_1');
			$table->date('Fecha_Solicitud');
			$table->string('Descripcion_Solicitud', 1110)->nullable()->default('N/P');
			$table->integer('CDIS_Presupuesto', 10, 0)->default(0);
			$table->date('Fecha_Ejecucion');
			$table->integer('EJECUTADO', 10, 0)->default(0);
			$table->integer('NO_EJECUTADO', 10, 0)->default(0);
			$table->string('Personal_Encargado', 110)->default('N/P');
			$table->integer('Total_Solicitudes', 10, 0)->default(0);
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
		Schema::drop('Tb_Matriz_Segto_Solicitudes');
	}
}