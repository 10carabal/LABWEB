<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbHistSolicitudesEquipoTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Tb_Hist_Solicitudes_Equipo', function (Blueprint $table) {
			$table->integer('id', true);
			$table->integer('NUM_HOJA_VIDA', 10, 0)->index('tb_hist_solicitudes_equipo_fk1');
			$table->integer('Consecutivo_Orden', 10, 0)->index('tb_hist_solicitudes_equipo_fk2');
			$table->string('Tipo_Servicio', 1110)->default('N/P');
			$table->date('Fecha')->nullable();
			$table->string('Costo', 1110)->nullable()->default('N/P');
			$table->string('Repuestos', 1110)->nullable()->default('N/P');
			$table->integer('HH')->default(0);
			$table->integer('HP')->default(0);
			$table->string('Observaciones', 1110)->nullable()->default('N/P');
			$table->string('Nombre_Responsable', 1110)->nullable()->default('N/P');
			$table->string('Cargo_Responsable', 1110)->nullable()->default('N/P');
			$table->string('Nombre_Responsable_Reporte', 1110)->nullable()->default('N/P');
			$table->string('Satisfaccion_Usuario', 1110)->nullable()->default('N/P');
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
		Schema::drop('Tb_Hist_Solicitudes_Equipo');
	}
}