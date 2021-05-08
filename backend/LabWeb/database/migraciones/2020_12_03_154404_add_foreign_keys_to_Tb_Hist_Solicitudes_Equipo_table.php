<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTbHistSolicitudesEquipoTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Tb_Hist_Solicitudes_Equipo', function(Blueprint $table)
		{
			$table->foreign('NUM_HOJA_VIDA', 'tb_hist_solicitudes_equipo_ibfk_1')->references('NUM_HOJA_VIDA')->on('Tb_equipos')->onUpdate('CASCADE')->onDelete('CASCADE');
			$table->foreign('Consecutivo_Orden', 'tb_hist_solicitudes_equipo_ibfk_2')->references('Consecutivo_Orden')->on('Tb_Solicitud_Servicio')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Tb_Hist_Solicitudes_Equipo', function(Blueprint $table)
		{
			$table->dropForeign('tb_hist_solicitudes_equipo_ibfk_1');
			$table->dropForeign('tb_hist_solicitudes_equipo_ibfk_2');
		});
	}

}
