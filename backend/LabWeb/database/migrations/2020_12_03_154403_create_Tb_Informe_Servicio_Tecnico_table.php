<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbInformeServicioTecnicoTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Tb_Informe_Servicio_Tecnico', function (Blueprint $table) {
			$table->integer('id', true);
			$table->integer('NUM_HOJA_VIDA', 10, 0)->index('tb_inform_servicio_tecnico_fk1');
			$table->integer('Consecutivo_Orden', 10, 0)->index('tb_inform_servicio_tecnico_fk2');
			$table->string('Codigo_Prestador', 110)->default('N/P');
			$table->string('Servicio', 110)->default('N/P');
			$table->string('Ubicacion', 110)->default('N/P');
			$table->date('Fecha_Informe');
			$table->string('Problema_Detectado', 1110)->default('N/P');
			$table->string('Actividades_Realizadas', 1110)->nullable()->default('N/P');
			$table->string('Repuestos_Instalados', 1110)->nullable()->default('N/P');
			$table->string('Accesorios_Instalados', 1110)->nullable()->default('N/P');
			$table->string('Insumos_Instalados', 1110)->nullable()->default('N/P');
			$table->string('Mediciones', 110)->nullable()->default('N/P');
			$table->string('Observaciones', 1110)->nullable()->default('N/P');
			$table->string('Nombre_Responsable', 110)->default('N/P');
			$table->string('Cargo_Responsable', 110)->default('N/P');
			$table->string('Nombre_Responsable_Recibir', 110)->default('N/P');
			$table->string('Cargo_Responsable_Recibir', 110)->default('N/P');
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
		Schema::drop('Tb_Informe_Servicio_Tecnico');
	}
}