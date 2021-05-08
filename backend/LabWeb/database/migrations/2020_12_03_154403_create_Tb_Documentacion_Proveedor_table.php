<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTbDocumentacionProveedorTable extends Migration
{

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('Tb_Documentacion_Proveedor', function (Blueprint $table) {
			$table->integer('id', true);
			$table->integer('NUM_HOJA_VIDA', 10, 0)->index('tb_documentacion_proveedor_fk1');
			$table->string('MANUAL_USUARIO', 2000)->default('N/P');
			$table->string('MANUAL_SERVICIO', 2000)->default('N/P');
			$table->string('GUIA_USO', 2000)->default('N/P');
			$table->string('MANUAL_PARTES', 2000)->default('N/P');
			$table->string('MANUAL_DESPIECE', 2000)->default('N/P');
			$table->string('PLANOS', 2000)->default('N/P');
			$table->string('CARTA_GARANTIA', 2000)->default('N/P');
			$table->string('REGISTRO_SANITARIO_PROVEEDOR', 2000)->default('N/P');
			$table->string('DECLARACION_IMPORTACION', 2000)->default('N/P');
			$table->string('CHECKLIST_FABRICACION', 2000)->default('N/P');
			$table->string('HOJAS_VIDA_PERSONAL_TECNICO', 2000)->default('N/P');
			$table->string('CRONOGRAMA_VISITAS', 2000)->default('N/P');
			$table->string('REPUESTOS_DISPONIBLES', 2000)->default('N/P');
			$table->string('CERT_CALIB_VALID_CALPERSONAL', 2000)->default('N/P');
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
		Schema::drop('Tb_Documentacion_Proveedor');
	}
}