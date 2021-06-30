import { CanActivateViaAuthGuardGuard } from './guards/can-activate-via-auth-guard.guard';
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
  {
    path: 'buscar/:equipo_actual', component: BuscadorComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },

  {
    path: 'menu', component: MenuprincipalComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },

  {
    path: 'getadquisicion/:id', component: GetadquisicionComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'adquisicion/:id', component: AdquisicionComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'newadquisicion', component: NewadquisicionComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'editadqusicion/:id', component: EditadquisicionComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },

  {
    path: 'getclasificacion/:id', component: GetclasificacionComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'clasificacion/:id', component: ClasificacionComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'newclasificacion', component: NewclasificacionComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'editclasificacion/:id', component: EditclasificacionComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },

  {
    path: 'getdocumentosanexoshv/:id', component: GetdocumentosanexoshvComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'documentosanexoshv/:id', component: DocumentosanexosComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'newdocumentosanexoshv', component: NewdocumentosanexoshvComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'editdocumentosanexoshv/:id', component: EditdocumentosanexoshvComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },

  {
    path: 'getdocumentosproveedor/:id', component: GetdocumentosproveedorComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'documentosproveedor/:id', component: DocumentosproveedorComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'newdocumentosproveedor', component: NewdocumentosproveedorComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'editdocumentosproveedor/:id', component: EditdocumentosproveedorComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },

  {
    path: 'equipos', component: EquipoComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'newequipos', component: NewequipoComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'equipo/:id', component: EquipocreadoComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'editequipo/:id', component: EditEquipoComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },

  {
    path: 'getfabricantesproveedores/:id', component: GetfabricantesproveedoresComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'fabricantesproveedores/:id', component: FabricantesproveedoresComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'newfabricantesproveedores', component: NewfabricantesproveedoresComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'editfabricantesproveedores/:id', component: EditfabricantesproveedoresComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },


  {
    path: 'gethistorico/:id', component: GethistoricoComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'historico/:id', component: HistoricoComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'newhistorico', component: NewhistoricoComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'edithistorico/:id', component: EdithistoricoComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },

  {
    path: 'getinfo/:id', component: GetinfoinstitucionalComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'infoinstitucional/:id', component: InfoinstitucionalComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'newinfo', component: NewinfoinstitucionalComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'editinfo/:id', component: EditInfoInstitucionalComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },

  {
    path: 'getinfotecnica/:id', component: GetinfotecnicaComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'infotecnica/:id', component: InfotecnicaComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'newinfotecnica', component: NewinfotecnicaComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'editinfotecnica/:id', component: EditinfotecnicaComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },

  {
    path: 'getmantenimiento/:id', component: GetmantenimientoComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'mantenimiento/:id', component: MantenimientoComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'newmantenimiento', component: NewmantenimientoComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'editmantenimiento/:id', component: EditmantenimientoComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },

  {
    path: 'getobservaciones/:id', component: GetobservacionesComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'observaciones/:id', component: ObservacionesComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'newobservaciones', component: NewobservacionesComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'editobservaciones/:id', component: EditobservacionesComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },

  {
    path: 'getreactivos/:id', component: GetreactivosComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'reactivos/:id', component: ReactivosComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'newreactivos', component: NewreactivosComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'editreactivos/:id', component: EditreactivosComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },


  // formatos
  {
    path: 'hojavida/:id', component: HojavidaComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },

  {
    path: 'getRMA002/:id', component: Getrma002Component,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'RMA002/:id', component: Rma002Component,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'newRMA002', component: NewRMA002Component,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'editRMA002/:id', component: EditRMA002Component,
    canActivate: [CanActivateViaAuthGuardGuard]
  },

  {
    path: 'inventario/:id', component: InventarioComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },

  {
    path: 'planmantenimiento/:id', component: CronogramaMantenimientoComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'RMA004/:id', component: Rma004Component,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'newRMA004', component: Newrma004Component,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'editRMA004/:id', component: Editrma004Component,
    canActivate: [CanActivateViaAuthGuardGuard]
  },

  {
    path: 'plancalibracion/:id', component: CronogramaCalibracionCalificacionComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'RMA005/:id', component: Rma005Component,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'newRMA005', component: Newrma005Component,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'editRMA005/:id', component: Editrma005Component,
    canActivate: [CanActivateViaAuthGuardGuard]
  },

  {
    path: 'getRMA006/:id', component: GetinformemantenimientoComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'RMA006/:id', component: InformemantenimientoComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'newRMA006', component: NewinformemantenimientoComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'editRMA006/:id', component: EditinformemantenimientoComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },

  {
    path: 'getRMA007/:id', component: GetsolicitudservicioComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'RMA007/:id', component: SolicitudsevicioComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'newRMA007', component: NewsolicitudservicioComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'editRMA007/:id', component: EditsolicitudservicioComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },

  {
    path: 'getRMA008/:id', component: GetinformeservicioComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'RMA008/:id', component: InformeservicioComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'newRMA008', component: NewinformeservicioComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'editRMA008/:id', component: EditinformeservicioComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },

  {
    path: 'getRMA009/:id', component: InspefuncionalidadComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'RMA009/:id', component: FuncionalidadequiposComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'newRMA009', component: NewfuncionalidadComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'editRMA009/:id', component: EditfuncionalidadComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },

  {
    path: 'getRMA010/:id', component: GetmatrizsolicitudesComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'RMA010/:id', component: MatrizsolicitudesComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'newRMA010', component: NewmatrizsolicitudesComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },
  {
    path: 'editRMA010/:id', component: EditmatrizsolicitudesComponent,
    canActivate: [CanActivateViaAuthGuardGuard]
  },

  { path: '**', pathMatch: 'full', redirectTo: 'inicio' }
];

// EXPORTAR CONFIGURACIÓN
// export const appRoutingProviders: any[] = [];
export const APP_ROUTING = RouterModule.forRoot(APP_ROUTES);


