<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbInformacionInstitucionalTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Tb_Informacion_Institucional', function (Blueprint $table) {
			$table->integer('id', true);
			$table->integer('NUM_HOJA_VIDA', 10, 0)->index('tb_informacion_instit_fk');
			$table->string('Pais', 110)->nullable()->default('Colombia');
			$table->string('Ciudad', 1110)->nullable()->default('Cali');
			$table->string('Direccion', 1110)->nullable()->default('Calle 5 # 62-00 Barrio Pampalinda');
			$table->string('Nit_Universidad', 1110)->nullable()->default('890303787-1');
			$table->string('RUT', 1110)->nullable()->default('890303787-1');
			$table->string('Telefono', 1110)->nullable()->default('5183000 EXT');
			$table->string('Website', 1110)->nullable()->default('www.usc.edu.co');
			$table->string('Email_Laboratorio', 1110)->default('N/P');
			$table->date('Fecha_Ejecucion_Hoja_Vida');
			$table->string('Lider_Proceso', 1110)->default('N/P');
			$table->string('Cargo', 1110)->default('N/P');
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
		Schema::drop('Tb_Informacion_Institucional');
	}
}