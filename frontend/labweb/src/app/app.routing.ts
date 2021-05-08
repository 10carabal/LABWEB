import { Newrma004Component } from './components/newrma004/newrma004.component';
import { Newrma005Component } from './components/newrma005/newrma005.component';
import { Editrma005Component } from './components/editrma005/editrma005.component';
import { Rma005Component } from './components/rma005/rma005.component';
import { Rma004Component } from './components/rma004/rma004.component';
import { GetmatrizsolicitudesComponent } from './components/getmatrizsolicitudes/getmatrizsolicitudes.component';
import { GetinformeservicioComponent } from './components/getinformeservicio/getinformeservicio.component';
import { GetsolicitudservicioComponent } from './components/getsolicitudservicio/getsolicitudservicio.component';
import { GetinformemantenimientoComponent } from './components/getinformemantenimiento/getinformemantenimiento.component';
import { GetreactivosComponent } from './components/getreactivos/getreactivos.component';
import { GetobservacionesComponent } from './components/getobservaciones/getobservaciones.component';
import { GetmantenimientoComponent } from './components/getmantenimiento/getmantenimiento.component';
import { GetinfotecnicaComponent } from './components/getinfotecnica/getinfotecnica.component';
import { GethistoricoComponent } from './components/gethistorico/gethistorico.component';
import { GetdocumentosproveedorComponent } from './components/getdocumentosproveedor/getdocumentosproveedor.component';
import { GetfabricantesproveedoresComponent } from './components/getfabricantesproveedores/getfabricantesproveedores.component';
import { GetdocumentosanexoshvComponent } from './components/getdocumentosanexoshv/getdocumentosanexoshv.component';
import { GetclasificacionComponent } from './components/getclasificacion/getclasificacion.component';
import { GetadquisicionComponent } from './components/getadquisicion/getadquisicion.component';
import { Getrma002Component } from './components/getrma002/getrma002.component';
import { NewsolicitudservicioComponent } from './components/newsolicitudservicio/newsolicitudservicio.component';
import { EditInfoInstitucionalComponent } from './components/edit-info-institucional/edit-info-institucional.component';
import { NewinfoinstitucionalComponent } from './components/newinfoinstitucional/newinfoinstitucional.component';
import { EquipocreadoComponent } from './components/equipocreado/equipocreado.component';
import { BuscadorComponent } from './components/buscador/buscador.component';
import { Component } from '@angular/core';
// Import necesarios.

import { ModuleWithProviders } from '@angular/core';
import { Routes, RouterModule } from '@angular/router';

// Importar los componentes.

import { LoginComponent } from './components/login/login.component';
import {
    CronogramaCalibracionCalificacionComponent
} from './components/cronograma-calibracion-calificacion/cronograma-calibracion-calificacion.component';
import {
    CronogramaMantenimientoComponent
} from './components/cronograma-mantenimiento/cronograma-mantenimiento.component';


import { MenuprincipalComponent } from './components/menuprincipal/menuprincipal.component';
import { EquipoComponent } from './components/equipo/equipo.component';
import { AdquisicionComponent } from './components/adquisicion/adquisicion.component';
import { ClasificacionComponent } from './components/clasificacion/clasificacion.component';
import { DocumentosanexosComponent } from './components/documentosanexos/documentosanexos.component';
import { DocumentosproveedorComponent } from './components/documentosproveedor/documentosproveedor.component';
import { FabricantesproveedoresComponent } from './components/fabricantesproveedores/fabricantesproveedores.component';
import { FuncionalidadequiposComponent } from './components/funcionalidadequipos/funcionalidadequipos.component';
import { HistoricoComponent } from './components/historico/historico.component';
import { HojavidaComponent } from './components/hojavida/hojavida.component';
import { InfoinstitucionalComponent } from './components/infoinstitucional/infoinstitucional.component';
import { InformemantenimientoComponent } from './components/informemantenimiento/informemantenimiento.component';
import { InformeservicioComponent } from './components/informeservicio/informeservicio.component';
import { InfotecnicaComponent } from './components/infotecnica/infotecnica.component';
import { InspefuncionalidadComponent } from './components/inspefuncionalidad/inspefuncionalidad.component';
import { InventarioComponent } from './components/inventario/inventario.component';
import { MantenimientoComponent } from './components/mantenimiento/mantenimiento.component';
import { MatrizsolicitudesComponent } from './components/matrizsolicitudes/matrizsolicitudes.component';
import { ObservacionesComponent } from './components/observaciones/observaciones.component';
import { ReactivosComponent } from './components/reactivos/reactivos.component';
import { Rma002Component } from './components/rma002/rma002.component';
import { SolicitudsevicioComponent } from './components/solicitudsevicio/solicitudsevicio.component';
import { NewequipoComponent } from './components/newequipo/newequipo.component';
import { GetinfoinstitucionalComponent } from './components/getinfoinstitucional/getinfoinstitucional.component';
import { EditEquipoComponent } from './components/edit-equipo/edit-equipo.component';
import { EditsolicitudservicioComponent } from './components/editsolicitudservicio/editsolicitudservicio.component';
import { NewadquisicionComponent } from './components/newadquisicion/newadquisicion.component';
import { EditadquisicionComponent } from './components/editadquisicion/editadquisicion.component';
import { NewclasificacionComponent } from './components/newclasificacion/newclasificacion.component';
import { EditclasificacionComponent } from './components/editclasificacion/editclasificacion.component';
import { NewdocumentosanexoshvComponent } from './components/newdocumentosanexoshv/newdocumentosanexoshv.component';
import { EditdocumentosanexoshvComponent } from './components/editdocumentosanexoshv/editdocumentosanexoshv.component';
import { NewdocumentosproveedorComponent } from './components/newdocumentosproveedor/newdocumentosproveedor.component';
import { EditdocumentosproveedorComponent } from './components/editdocumentosproveedor/editdocumentosproveedor.component';
import { NewfabricantesproveedoresComponent } from './components/newfabricantesproveedores/newfabricantesproveedores.component';
import { EditfabricantesproveedoresComponent } from './components/editfabricantesproveedores/editfabricantesproveedores.component';
import { NewfuncionalidadComponent } from './components/newfuncionalidad/newfuncionalidad.component';
import { EditfuncionalidadComponent } from './components/editfuncionalidad/editfuncionalidad.component';
import { NewhistoricoComponent } from './components/newhistorico/newhistorico.component';
import { EdithistoricoComponent } from './components/edithistorico/edithistorico.component';
import { NewinfotecnicaComponent } from './components/newinfotecnica/newinfotecnica.component';
import { EditinfotecnicaComponent } from './components/editinfotecnica/editinfotecnica.component';
import { NewmantenimientoComponent } from './components/newmantenimiento/newmantenimiento.component';
import { EditmantenimientoComponent } from './components/editmantenimiento/editmantenimiento.component';
import { NewobservacionesComponent } from './components/newobservaciones/newobservaciones.component';
import { EditobservacionesComponent } from './components/editobservaciones/editobservaciones.component';
import { NewreactivosComponent } from './components/newreactivos/newreactivos.component';
import { EditreactivosComponent } from './components/editreactivos/editreactivos.component';
import { NewRMA002Component } from './components/new-rma002/new-rma002.component';
import { EditRMA002Component } from './components/edit-rma002/edit-rma002.component';
import { NewinformemantenimientoComponent } from './components/newinformemantenimiento/newinformemantenimiento.component';
import { EditinformemantenimientoComponent } from './components/editinformemantenimiento/editinformemantenimiento.component';
import { NewinformeservicioComponent } from './components/newinformeservicio/newinformeservicio.component';
import { EditinformeservicioComponent } from './components/editinformeservicio/editinformeservicio.component';
import { NewmatrizsolicitudesComponent } from './components/newmatrizsolicitudes/newmatrizsolicitudes.component';
import { EditmatrizsolicitudesComponent } from './components/editmatrizsolicitudes/editmatrizsolicitudes.component';
import { Editrma004Component } from './components/editrma004/editrma004.component';


// DEFINIR RUTAS
const APP_ROUTES: Routes = [

    { path: '', component: EquipoComponent },
    { path: 'inicio', component: EquipoComponent },
    { path: 'login', component: LoginComponent },
    { path: 'buscar/:equipo_actual', component: BuscadorComponent },

    { path: 'menu', component: MenuprincipalComponent },

    { path: 'getadquisicion/:id', component: GetadquisicionComponent },
    { path: 'adquisicion/:id', component: AdquisicionComponent },
    { path: 'newadquisicion', component: NewadquisicionComponent },
    { path: 'editadqusicion/:id', component: EditadquisicionComponent },

    { path: 'getclasificacion/:id', component: GetclasificacionComponent },
    { path: 'clasificacion/:id', component: ClasificacionComponent },
    { path: 'newclasificacion', component: NewclasificacionComponent },
    { path: 'editclasificacion/:id', component: EditclasificacionComponent },

    { path: 'getdocumentosanexoshv/:id', component: GetdocumentosanexoshvComponent },
    { path: 'documentosanexoshv/:id', component: DocumentosanexosComponent },
    { path: 'newdocumentosanexoshv', component: NewdocumentosanexoshvComponent },
    { path: 'editdocumentosanexoshv/:id', component: EditdocumentosanexoshvComponent },

    { path: 'getdocumentosproveedor/:id', component: GetdocumentosproveedorComponent },
    { path: 'documentosproveedor/:id', component: DocumentosproveedorComponent },
    { path: 'newdocumentosproveedor', component: NewdocumentosproveedorComponent },
    { path: 'editdocumentosproveedor/:id', component: EditdocumentosproveedorComponent },

    { path: 'equipos', component: EquipoComponent },
    { path: 'newequipos', component: NewequipoComponent },
    { path: 'equipo/:id', component: EquipocreadoComponent },
    { path: 'editequipo/:id', component: EditEquipoComponent },

    { path: 'getfabricantesproveedores/:id', component: GetfabricantesproveedoresComponent },
    { path: 'fabricantesproveedores/:id', component: FabricantesproveedoresComponent },
    { path: 'newfabricantesproveedores', component: NewfabricantesproveedoresComponent },
    { path: 'editfabricantesproveedores/:id', component: EditfabricantesproveedoresComponent },


    { path: 'gethistorico/:id', component: GethistoricoComponent },
    { path: 'historico/:id', component: HistoricoComponent },
    { path: 'newhistorico', component: NewhistoricoComponent },
    { path: 'edithistorico/:id', component: EdithistoricoComponent },

    { path: 'getinfo/:id', component: GetinfoinstitucionalComponent },
    { path: 'infoinstitucional/:id', component: InfoinstitucionalComponent },
    { path: 'newinfo', component: NewinfoinstitucionalComponent },
    { path: 'editinfo/:id', component: EditInfoInstitucionalComponent },

    { path: 'getinfotecnica/:id', component: GetinfotecnicaComponent },
    { path: 'infotecnica/:id', component: InfotecnicaComponent },
    { path: 'newinfotecnica', component: NewinfotecnicaComponent },
    { path: 'editinfotecnica/:id', component: EditinfotecnicaComponent },

    { path: 'getmantenimiento/:id', component: GetmantenimientoComponent },
    { path: 'mantenimiento/:id', component: MantenimientoComponent },
    { path: 'newmantenimiento', component: NewmantenimientoComponent },
    { path: 'editmantenimiento/:id', component: EditmantenimientoComponent },

    { path: 'getobservaciones/:id', component: GetobservacionesComponent },
    { path: 'observaciones/:id', component: ObservacionesComponent },
    { path: 'newobservaciones', component: NewobservacionesComponent },
    { path: 'editobservaciones/:id', component: EditobservacionesComponent },

    { path: 'getreactivos/:id', component: GetreactivosComponent },
    { path: 'reactivos/:id', component: ReactivosComponent },
    { path: 'newreactivos', component: NewreactivosComponent },
    { path: 'editreactivos/:id', component: EditreactivosComponent },


    // formatos
    { path: 'hojavida/:id', component: HojavidaComponent },

    { path: 'getRMA002/:id', component: Getrma002Component },
    { path: 'RMA002/:id', component: Rma002Component },
    { path: 'newRMA002', component: NewRMA002Component },
    { path: 'editRMA002/:id', component: EditRMA002Component },

    { path: 'inventario/:id', component: InventarioComponent },

    { path: 'planmantenimiento/:id', component: CronogramaMantenimientoComponent },
    { path: 'RMA004/:id', component: Rma004Component },
    { path: 'newRMA004', component: Newrma004Component },
    { path: 'editRMA004/:id', component: Editrma004Component },

    { path: 'plancalibracion/:id', component: CronogramaCalibracionCalificacionComponent },
    { path: 'RMA005/:id', component: Rma005Component },
    { path: 'newRMA005', component: Newrma005Component },
    { path: 'editRMA005/:id', component: Editrma005Component },

    { path: 'getRMA006/:id', component: GetinformemantenimientoComponent },
    { path: 'RMA006/:id', component: InformemantenimientoComponent },
    { path: 'newRMA006', component: NewinformemantenimientoComponent },
    { path: 'editRMA006/:id', component: EditinformemantenimientoComponent },

    { path: 'getRMA007/:id', component: GetsolicitudservicioComponent },
    { path: 'RMA007/:id', component: SolicitudsevicioComponent },
    { path: 'newRMA007', component: NewsolicitudservicioComponent },
    { path: 'editRMA007/:id', component: EditsolicitudservicioComponent },

    { path: 'getRMA008/:id', component: GetinformeservicioComponent },
    { path: 'RMA008/:id', component: InformeservicioComponent },
    { path: 'newRMA008', component: NewinformeservicioComponent },
    { path: 'editRMA008/:id', component: EditinformeservicioComponent },

    { path: 'getRMA009/:id', component: InspefuncionalidadComponent },
    { path: 'RMA009/:id', component: FuncionalidadequiposComponent },
    { path: 'newRMA009', component: NewfuncionalidadComponent },
    { path: 'editRMA009/:id', component: EditfuncionalidadComponent },

    { path: 'getRMA010/:id', component: GetmatrizsolicitudesComponent },
    { path: 'RMA010/:id', component: MatrizsolicitudesComponent },
    { path: 'newRMA010', component: NewmatrizsolicitudesComponent },
    { path: 'editRMA010/:id', component: EditmatrizsolicitudesComponent },

    { path: '**', pathMatch: 'full', redirectTo: 'inicio' }
];

// EXPORTAR CONFIGURACIÓN
// export const appRoutingProviders: any[] = [];
export const APP_ROUTING = RouterModule.forRoot(APP_ROUTES);


