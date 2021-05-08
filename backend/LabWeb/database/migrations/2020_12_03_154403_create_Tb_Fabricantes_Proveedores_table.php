<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbFabricantesProveedoresTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Tb_Fabricantes_Proveedores', function (Blueprint $table) {
			$table->integer('id', true);
			$table->integer('NUM_HOJA_VIDA', 10, 0)->index('tb_fabricantes_proveedores_fk1');
			$table->string('FABRICANTE', 110)->default('N/P');
			$table->string('PAIS_ORIGEN', 110)->nullable()->default('N/P');
			$table->string('WEB_FABRICANTE', 110)->nullable()->default('N/P');
			$table->string('REPRESENTANTE', 110)->nullable()->default('N/P');
			$table->string('PROVEEDOR', 110)->default('N/P');
			$table->string('CIUDAD_PROVEEDOR', 110)->nullable()->default('N/P');
			$table->string('DIRECCION_PROVEEDOR', 110)->nullable()->default('N/P');
			$table->integer('TELEFONO_PROVEEDOR', 10, 0)->nullable();
			$table->string('CORREO_PROVEEDOR', 110)->nullable()->default('N/P');
			$table->string('WEB_PROVEEDOR', 110)->nullable()->default('N/P');
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
		Schema::drop('Tb_Fabricantes_Proveedores');
	}
}