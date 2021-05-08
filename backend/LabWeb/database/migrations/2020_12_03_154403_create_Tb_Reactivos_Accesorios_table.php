<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbReactivosAccesoriosTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Tb_Reactivos_Accesorios', function (Blueprint $table) {
			$table->integer('id', true);
			$table->integer('NUM_HOJA_VIDA', 10, 0)->index('tb_reactivos_accesorios_ibfk_1');
			$table->string('LISTADO_REACTIVOS', 2000)->default('Sólidos');
			$table->string('ACCESORIO_1', 1100)->default('N/P');
			$table->string('MARCA_LICENCIA_ACCESORIO_1', 110)->default('N/P');
			$table->string('MODELO_VERSION_ACCESORIO_1', 110)->default('N/P');
			$table->string('SERIE_ACCESORIO_1', 1110);
			$table->string('ACCESORIO_2', 1110)->nullable()->default('N/P');
			$table->string('MARCA_LICENCIA_ACCESORIO_2', 1110)->nullable()->default('N/P');
			$table->string('MODELO_VERSION_ACCESORIO_2', 1110)->nullable()->default('N/P');
			$table->string('SERIE_ACCESORIO_2', 1110)->nullable()->default('N/P');
			$table->string('ACCESORIO_3', 1110)->nullable()->default('N/P');
			$table->string('MARCA_LICENCIA_ACCESORIO_3', 1110)->nullable()->default('N/P');
			$table->string('MODELO_VERSION_ACCESORIO_3', 1110)->nullable()->default('N/P');
			$table->string('SERIE_ACCESORIO_3', 1110)->nullable()->default('N/P');
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
		Schema::drop('Tb_Reactivos_Accesorios');
	}
}
