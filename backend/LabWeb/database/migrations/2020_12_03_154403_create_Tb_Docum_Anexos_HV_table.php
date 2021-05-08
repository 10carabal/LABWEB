<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbDocumAnexosHVTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Tb_Docum_Anexos_HV', function (Blueprint $table) {
			$table->integer('id', true);
			$table->integer('NUM_HOJA_VIDA', 10, 0)->index('tb_docum_anexos_hv_ibfk_1');
			$table->string('COPIA_REGISTRO_SANITARIO', 2000)->default('No aplica');
			$table->string('COPIA_REGISTRO_IMPORTACION', 2000)->default('No aplica');
			$table->string('COPIA_PMISO_COMERCIALIZACION', 2000)->default('No aplica');
			$table->string('COPIA_FACTURA', 2000)->default('No aplica');
			$table->string('COPIA_INGRESO_ALMACEN', 2000)->default('No aplica');
			$table->string('CP_RBO_SATISFACCION_PRESTADOR', 2000)->default('No aplica');
			$table->string('CP_RBO_SATISFACCION_OPERADOR', 2000)->default('No aplica');
			$table->string('CAPACION_TEC_ASISTENCIAL', 2000)->default('No aplica');
			$table->string('HOJA_VIDA_PERSONAL_TECNICO', 2000)->default('No aplica');
			$table->string('GUIA_RAPIDA_OPERACION', 2000)->default('No aplica');
			$table->string('CERT_CALIB_VALID_CALPERSONAL', 2000)->default('No aplica');
			$table->string('RNES_FABRICANTE_CALIBRACION', 2000)->default('No aplica');
			$table->string('RNES_FABRICANTE_ACEOS_CBLES', 2000)->default('No aplica');
			$table->string('PROTOCOLO_PROVEEDOR', 2000)->default('No aplica');
			$table->string('CRONOGRAMA_MANTENIMIENTO_T_G', 2000)->default('No aplica');
			$table->string('OBSERVACIONES', 500)->nullable();
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
		Schema::drop('Tb_Docum_Anexos_HV');
	}
}