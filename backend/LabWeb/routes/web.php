<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
Route::group(['middleware' => ['cors']], function () {
    /* Route::resource('equipos', 'EquiposController');
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
    Route::resource('hojadevida', 'Hoja_VidaController'); //RMA003

    //RMA002
    Route::resource('RMA002', 'RMA002Controller');

    //RMA003
    Route::get('RMA003', 'InventarioController@inventario');
    Route::resource('inventario', 'InventarioController'); //RMA003


    //RMA004
    Route::get('RMA004', 'PlanMantenimientoController@getFormato');
    Route::resource('planmantenimiento', 'PlanMantenimientoController');


    //RMA005
    Route::get('RMA005', 'PlanValidacionController@getFormato');
    Route::resource('planvalidacion', 'PlanValidacionController');

    //RMA006 LISTOOOOOO
    Route::get('RMA006', 'InformeMantenimientoController@getFormato');
    Route::resource('informemantenimiento', 'InformeMantenimientoController');


    //RMA007
    //SUBIRLOOOOOO A FILEZILLA solicitudservicio.PHP .CONTROLLER WEB API
    Route::get('RMA007', 'Solicitud_ServicioController@getFormato');
    Route::resource('solicitudservicio', 'Solicitud_ServicioController');


    //RMA008 LISTO
    Route::get('RMA008', 'InformeServicioController@getFormato');
    Route::resource('informeservicio', 'InformeServicioController');


    //RMA009
    //SUBIRLOOOOOO A FILEZILLA INSPE.PHP .CONTROLLER WEB API
    Route::get('RMA009', 'Inspe_FuncionalidadController@getFormato');
    Route::resource('inspefuncionalidad', 'Inspe_FuncionalidadController');

    //SUBIRLO A FILEZILLA CON MATRIZ.PHP CONTROLLER WEB API

    //RMA0010
    Route::get('RMA010', 'Matriz_SolicitudesController@getFormato');
    Route::resource('matrizsolicitudes', 'Matriz_SolicitudesController');



    //ROUTES DE LOGIN
    Route::resource('usuarios', 'UsuariosController'); //RMA003

    Route::post('login', 'UsuariosController@login');
    Route::post('register', 'UsuariosController@register');
 */ });
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::post('register', 'Auth\RegisterController@storeUser');
Route::post('login', 'Auth\LoginController@authenticate');
