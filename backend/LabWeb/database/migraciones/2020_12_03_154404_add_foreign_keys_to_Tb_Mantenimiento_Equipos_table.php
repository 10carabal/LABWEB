<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTbMantenimientoEquiposTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Tb_Mantenimiento_Equipos', function(Blueprint $table)
		{
			$table->foreign('NUM_HOJA_VIDA', 'tb_mantenimiento_equipos_ibfk_1')->references('NUM_HOJA_VIDA')->on('Tb_equipos')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Tb_Mantenimiento_Equipos', function(Blueprint $table)
		{
			$table->dropForeign('tb_mantenimiento_equipos_ibfk_1');
		});
	}

}
