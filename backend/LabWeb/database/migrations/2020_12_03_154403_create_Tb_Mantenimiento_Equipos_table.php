<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbMantenimientoEquiposTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Tb_Mantenimiento_Equipos', function (Blueprint $table) {
			$table->integer('id', true);
			$table->integer('NUM_HOJA_VIDA', 10, 0)->index('tb_mantenimiento_equipos_fk_1');
			$table->string('Mantenimiento_Propio')->default('No');
			$table->string('Mantenimiento_Contratado')->default('No');
			$table->string('Por_Orden_Compra')->default('No');
			$table->string('Requiere_Calibracion')->default('No');
			$table->string('Requiere_Cal_Operacional')->default('No');
			$table->string('Requiere_Validacion')->default('No');
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
		Schema::drop('Tb_Mantenimiento_Equipos');
	}
}