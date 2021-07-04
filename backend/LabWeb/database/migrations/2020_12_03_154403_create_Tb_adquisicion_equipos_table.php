php<?php

	use Illuminate\Database\Migrations\Migration;
	use Illuminate\Database\Schema\Blueprint;
	use Illuminate\Support\Facades\Schema;

	class CreateTbAdquisicionEquiposTable extends Migration
	{

		/**
		 * Run the migrations.
		 *
		 * @return void
		 */
		public function up()
		{
			Schema::create('Tb_adquisicion_equipos', function (Blueprint $table) {
				$table->integer('id', true);
				$table->integer('NUM_HOJA_VIDA', 10, 0)->nullable()->index('tb_adquisicion_equipos_ibfk_1');
				$table->date('FECHA_COMPRA');
				$table->date('FECHA_FABRICACION');
				$table->date('FECHA_INSTALACION');
				$table->date('FECHA_INICIO_OPERACION');
				$table->decimal('COSTO_EQUIPO', 38, 0)->nullable()->default(0);
				$table->string('FORMA_ADQUISICION', 2000)->default('Compra Directa');
				$table->date('FECHA_ACTA_RECIBOS');
				$table->decimal('GARANTIA_ANIOS', 38, 0)->nullable()->default(0);
				$table->string('ESTADO_GARANTIA', 110)->nullable()->default('N/P');
				$table->date('FIN_GARANTIA')->nullable();
				$table->string('ESTADO_ACTUAL', 110)->nullable()->default('N/P');
				$table->decimal('ANIOS_USO', 38, 0)->nullable()->default(0);
				$table->string('FACTURA', 110)->nullable()->default('N/P');
				$table->string('ORDEN_DE_COMPRA', 1110)->default('N/P');
				$table->decimal('VIDA_UTIL', 38, 0)->nullable()->default(0);
				$table->string('RAZON_VIDA_UTIL', 110)->nullable()->default('N/P');
				$table->date('FECHA_INGRESO_INVENTARIO');
				$table->string('EJECUTOR_HOJA_VIDA', 110)->default('N/P');
				$table->string('LIDER_PROCESO', 110)->default('N/P');
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
			Schema::drop('Tb_adquisicion_equipos');
		}
	}
