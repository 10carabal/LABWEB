<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTbPerfilUsuarioTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Tb_Perfil_Usuario', function(Blueprint $table)
		{
			$table->foreign('NUM_PERFIL', 'tb_perfil_usuario_ibfk_1')->references('PERFIL')->on('Tb_Usuario')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Tb_Perfil_Usuario', function(Blueprint $table)
		{
			$table->dropForeign('tb_perfil_usuario_ibfk_1');
		});
	}

}
