<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbSolicitudServicioTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Tb_Solicitud_Servicio', function (Blueprint $table) {
			$table->integer('NUM_HOJA_VIDA', 10, 0);
			$table->integer('Consecutivo_Orden', 10, 0);
			$table->date('Fecha_Solicitud_Servicio');
			$table->time('Hora_Solicitud_Servicio');
			$table->string('Servicio', 110)->default('N/P');
			$table->string('Ubicacion', 110)->default('N/P');
			$table->string('Descripcion_Problema', 1100)->default('N/P');
			$table->string('Nombre_Responsable', 110)->default('N/P');
			$table->string('Cargo_Responsable', 110)->default('N/P');
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
		Schema::drop('Tb_Solicitud_Servicio');
	}
}