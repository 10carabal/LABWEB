<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
        $this->call(TbClasificacionEquipoTableSeeder::class);
        $this->call(TbCronPlCalibValidCalPnalTableSeeder::class);
        $this->call(TbCronPlanMentoEquiposTableSeeder::class);
        $this->call(TbDocumAnexosHVTableSeeder::class);
        $this->call(TbDocumentacionProveedorTableSeeder::class);
        $this->call(TbFabricantesProveedoresTableSeeder::class);
        $this->call(TbHistSolicitudesEquipoTableSeeder::class);
        $this->call(TbInformacionInstitucionalTableSeeder::class);
        $this->call(TbInformacionTecnicaEquipoTableSeeder::class);
        $this->call(TbInformeMantenimientoTableSeeder::class);
        $this->call(TbInformeServicioTecnicoTableSeeder::class);
        $this->call(TbInspFuncionalidadEquiposTableSeeder::class);
        $this->call(TbMantenimientoEquiposTableSeeder::class);
        $this->call(TbMatrizSegtoSolicitudesTableSeeder::class);
        $this->call(TbObservacionesAdicionalesTableSeeder::class);
        $this->call(TbPerfilUsuarioTableSeeder::class);
        $this->call(TbRMA002TableSeeder::class);
        $this->call(TbReactivosAccesoriosTableSeeder::class);
        $this->call(TbSolicitudServicioTableSeeder::class);
        $this->call(TbUsuarioTableSeeder::class);
        $this->call(TbAdquisicionEquiposTableSeeder::class);
        $this->call(TbEquiposTableSeeder::class);
        $this->call(MigrationsTableSeeder::class);
    }
}