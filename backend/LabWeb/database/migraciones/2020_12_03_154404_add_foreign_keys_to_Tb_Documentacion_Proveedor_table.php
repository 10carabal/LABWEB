<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToTbDocumentacionProveedorTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::table('Tb_Documentacion_Proveedor', function(Blueprint $table)
		{
			$table->foreign('NUM_HOJA_VIDA', 'tb_documentacion_proveedor_ibfk_1')->references('NUM_HOJA_VIDA')->on('Tb_equipos')->onUpdate('CASCADE')->onDelete('CASCADE');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::table('Tb_Documentacion_Proveedor', function(Blueprint $table)
		{
			$table->dropForeign('tb_documentacion_proveedor_ibfk_1');
		});
	}

}
