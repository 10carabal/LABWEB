<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbInformeMantenimientoTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Tb_Informe_Mantenimiento', function (Blueprint $table) {
			$table->integer('id', true);
			$table->integer('NUM_HOJA_VIDA', 10, 0)->index('tb_informe_mantenimiento_fk_1');
			$table->integer('Consecutivo_Orden', 10, 0)->index('tb_informe_mantenimiento_fk_2');
			$table->string('Tipo_Mantenimiento', 110)->default('N/P');
			$table->longText('Imagen_Antes_Mantenimiento')->nullable();
			$table->longText('Imagen_Despues_Mantenimiento')->nullable();
			$table->date('Fecha_Mantenimiento')->nullable();
			$table->time('Hora_Inicio')->nullable();
			$table->time('Hora_Fin')->nullable();
			$table->string('Tipo_Equipo', 2000)->default('Médico');
			$table->string('Actividades_Realizadas', 1110)->default('N/P');
			$table->string('Observacion_Mantenimiento', 1110)->nullable()->default('N/P');
			$table->string('Estado_Equipo', 1110)->nullable()->default('N/P');
			$table->string('Test_Funcionalidad', 1110)->nullable()->default('N/P');
			$table->string('Limpieza', 2000)->default('N/P');
			$table->string('Reemplazo_Accesorios', 2000)->default('N/P');
			$table->string('Herramientas_Utilizadas', 1110)->nullable()->default('N/P');
			$table->string('Equipo_Proteccion_Personal', 1110)->nullable()->default('N/P');
			$table->string('Nombre_Responsable_Mento', 110)->default('N/P');
			$table->string('Cargo_Responsable_Mento', 110)->default('N/P');
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
		Schema::drop('Tb_Informe_Mantenimiento');
	}
}
