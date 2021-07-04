<?php
//header("Access-Control-Allow-Origin: *");
//header("Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization");
//header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
//header("Allow: GET, POST, OPTIONS, PUT, DELETE");
//$method = $_SERVER['REQUEST_METHOD'];
//if ($method == "OPTIONS") {
//    die();
//}

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::group(['middleware' => ['cors']], function () {
    //Login
    Route::resource('/users', "API\AuthController");
    Route::post('/tokens/create', "API\AuthController@create");
    Route::post('test/{id}', function($id){
        return response()->json(["message"=>"Exito"]);
    });
});
Route::group(['middleware' => ['cors', 'auth:sanctum']], function () {

    //JOINS INVENTARIO
    Route::get('datosprimariosinventario', 'EquiposController@getdatosprimarios');
    Route::get('adquisicioninventario', 'EquiposController@getadquisicion');
    Route::get('datosequipoinventario', 'EquiposController@getdatosequipo');
    Route::get('fabricanteyproveedorinventario', 'EquiposController@getfabricanteyproveedor');
    Route::get('documentacionproveedorinventario', 'EquiposController@getdocumentacionproveedor');
    Route::get('listareactivosaccesoriosinventario', 'EquiposController@getlistareactivosaccesorios');

    //JOINS HOJA DE VIDA
    Route::get('institucionalhojavida', 'Hoja_VidaController@getInfoInstitucional');
    Route::get('identificacionequipohojavida', 'Hoja_VidaController@getIdentificacion');
    Route::get('registrohistoricohojavida', 'Hoja_VidaController@getRegistroHistorico');
    Route::get('fechashojavida', 'Hoja_VidaController@getFechas');
    Route::get('proveedorhojavida', 'Hoja_VidaController@getfabricanteyproveedor');
    Route::get('descripcionequipohojavida', 'Hoja_VidaController@getDescricionEquipo');
    Route::get('tecnicahojavida', 'Hoja_VidaController@getInformacionTecnica');
    Route::get('apoyotecnicohojavida', 'Hoja_VidaController@getApoyoTecnico');
    Route::get('componenteshojavida', 'Hoja_VidaController@getComponentes');
    Route::get('generalidadesequipohojavida', 'Hoja_VidaController@getGeneralidadesEquipo');
    Route::get('mantenimientohojavida', 'Hoja_VidaController@getMantenimiento');
    Route::get('anexoshojavida', 'Hoja_VidaController@getAnexos');
    Route::get('historicomantenimiento', 'Hoja_VidaController@getHistoricoMantenimiento');
    Route::get('observacioneshojavida', 'Hoja_VidaController@getObservacionesAdicionales');

    //RUTAS BÁSICAS
    Route::resource('equipos', 'EquiposController');
    Route::resource('clasificacionequipos', 'Clasifi_EquipoController');
    Route::resource('compraequipos', 'Adq_EquiposController');
    Route::resource('documentosproveedor', 'Doc_ProveedorController');
    Route::resource('documentosanexoshv', 'Doc_AnexosHvController');
    Route::resource('fabricantesyproveedores', 'Fabricantes_ProveedoresController');
    Route::resource('infoinstitucional', 'Info_InstitucionalController'); //usado por hoja de vida
    Route::resource('infotecnicaequipo', 'Info_Tecnica_EquipoController'); //usado por hoja de vida
    Route::resource('funcionalidadequipos', 'Func_EquiposController'); // usado por rma009
    Route::resource('mantenimientoequipos', 'Mantenimiento_EquiposController'); //usado por hoja de vida
    Route::resource('observaciones', 'Observaciones_AdicionalesController'); //usado por hoja de vida
    Route::resource('perfil', 'PerfilController');
    Route::resource('reactivos', 'Reactivos_AccesoriosController'); //usado por hoja de vida
    Route::resource('historico', 'Hist_Solicitudes_EquiposController'); //usado por hoja de vida

    //FORMATOS

    //RMA001

    Route::get('RMA001/{id}', 'Hoja_VidaController@getHojavida');
    Route::resource('hojadevida', 'Hoja_VidaController'); //RMA001

    //RMA002
    Route::get('RMA002/{id}', 'RMA002Controller@getFormato');
    Route::resource('guiarapida', 'RMA002Controller');

    //RMA003
    Route::get('RMA003/{id}', 'InventarioController@inventario');
    Route::resource('inventario', 'InventarioController'); //RMA003

    //RMA004
    Route::get('RMA004', 'PlanMantenimientoController@getFormato');
    Route::resource('planmantenimiento', 'PlanMantenimientoController');
    Route::get('fechamantenimiento/{id}', 'PlanMantenimientoController@NuevaFecha');

    //RMA005
    Route::get('RMA005', 'PlanValidacionController@getFormato');
    Route::resource('planvalidacion', 'PlanValidacionController');
    Route::get('fechavalidacion/{id}', 'PlanValidacionController@NuevaFecha');

    //RMA006 LISTOOOOOO
    Route::get('RMA006/{id}', 'InformeMantenimientoController@getFormato');
    Route::resource('informemantenimiento', 'InformeMantenimientoController');

    //RMA007
    //SUBIRLOOOOOO A FILEZILLA solicitudservicio.PHP .CONTROLLER WEB API
    Route::get('RMA007/{id}', 'Solicitud_ServicioController@getFormato');
    Route::resource('solicitudservicio', 'Solicitud_ServicioController');

    //RMA008 LISTO
    Route::get('RMA008/{id}', 'InformeServicioController@getFormato');
    Route::resource('informeservicio', 'InformeServicioController');

    //RMA009
    //SUBIRLOOOOOO A FILEZILLA INSPE.PHP .CONTROLLER WEB API
    Route::get('RMA009/{id}', 'Inspe_FuncionalidadController@getFormato');
    Route::resource('funcionalidadequipos', 'Func_EquiposController');

    //SUBIRLO A FILEZILLA CON MATRIZ.PHP CONTROLLER WEB API

    //RMA0010
    Route::get('RMA010/{id}', 'Matriz_SolicitudesController@getFormato');
    Route::resource('matrizsolicitudes', 'Matriz_SolicitudesController');

    //IMAGENES
    Route::post('equipos/cargarimagen', 'EquiposController@subirImagen');
    Route::get('equipos/image/{filename}', 'EquiposController@getImage');
    Route::get('imagenes', 'EquiposController@sacarImagen');

    Route::post('informemantenimiento/cargarimagen', 'InformeMantenimientoController@subirImagen');
    Route::get('informemantenimiento/image/{filename}', 'InformeMantenimientoController@getImage');

    //STIKERSSSSSS


});
