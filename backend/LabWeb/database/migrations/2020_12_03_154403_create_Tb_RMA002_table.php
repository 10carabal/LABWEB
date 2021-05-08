<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbRMA002Table extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Tb_RMA002', function (Blueprint $table) {
			$table->integer('id', true);
			$table->integer('NUM_HOJA_VIDA', 10, 0)->index('tb_rma002_ibfk_1');
			$table->string('PARTES_EQUIPO', 1110)->default('N/P');
			$table->string('ACCESORIOS_EQUIPO', 1110)->default('N/P');
			$table->string('TECNOVIGILANCIA', 110)->default('N/P');
			$table->string('ANTES_USO', 1110)->default('N/P');
			$table->string('DESPUES_USO', 1110)->default('N/P');
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
		Schema::drop('Tb_RMA002');
	}
}
