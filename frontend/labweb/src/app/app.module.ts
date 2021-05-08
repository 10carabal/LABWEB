import { PintarDirective } from './directives/pintar.directive';
import { BrowserModule, } from '@angular/platform-browser';
import { CUSTOM_ELEMENTS_SCHEMA, NgModule } from '@angular/core';
import { FormsModule } from '@angular/forms';

import { AppComponent } from './app.component';
import { LoginComponent } from './components/login/login.component';
import { CronogramaMantenimientoComponent } from './components/cronograma-mantenimiento/cronograma-mantenimiento.component';
import { CronogramaCalibracionCalificacionComponent } from './components/cronograma-calibracion-calificacion/cronograma-calibracion-calificacion.component';
// ROUTES
import { APP_ROUTING } from './app.routing';
import { MenuprincipalComponent } from './components/menuprincipal/menuprincipal.component';
import { EquipoComponent } from './components/equipo/equipo.component';
import { FooterComponent } from './components/shared/footer/footer.component';
import { NavBarComponent } from './components/shared/nav-bar/nav-bar.component';

// SERVICES
import { HttpClientModule } from '@angular/common/http';

import { EquiposService } from './providers/equipos.service';
import { FormatosService } from './providers/formatos.services';
import { ProveedoresService } from './providers/proveedores.service';
import { CommonModule } from '@angular/common';
import { AdquisicionComponent } from './components/adquisicion/adquisicion.component';
import { ClasificacionComponent } from './components/clasificacion/clasificacion.component';
import { DocumentosanexosComponent } from './components/documentosanexos/documentosanexos.component';
import { DocumentosproveedorComponent } from './components/documentosproveedor/documentosproveedor.component';
import { FabricantesproveedoresComponent } from './components/fabricantesproveedores/fabricantesproveedores.component';
import { FuncionalidadequiposComponent } from './components/funcionalidadequipos/funcionalidadequipos.component';
import { HistoricoComponent } from './components/historico/historico.component';
import { HojavidaComponent } from './components/hojavida/hojavida.component';
import { InfoinstitucionalComponent } from './components/infoinstitucional/infoinstitucional.component';
import { InfotecnicaComponent } from './components/infotecnica/infotecnica.component';
import { InformemantenimientoComponent } from './components/informemantenimiento/informemantenimiento.component';
import { InformeservicioComponent } from './components/informeservicio/informeservicio.component';
import { InspefuncionalidadComponent } from './components/inspefuncionalidad/inspefuncionalidad.component';
import { InventarioComponent } from './components/inventario/inventario.component';
import { MantenimientoComponent } from './components/mantenimiento/mantenimiento.component';
import { MatrizsolicitudesComponent } from './components/matrizsolicitudes/matrizsolicitudes.component';
import { ObservacionesComponent } from './components/observaciones/observaciones.component';
import { ReactivosComponent } from './components/reactivos/reactivos.component';
import { Rma002Component } from './components/rma002/rma002.component';
import { SolicitudsevicioComponent } from './components/solicitudsevicio/solicitudsevicio.component';
import { NewequipoComponent } from './components/newequipo/newequipo.component';
import { EquipocreadoComponent } from './components/equipocreado/equipocreado.component';
import { NewinfoinstitucionalComponent } from './components/newinfoinstitucional/newinfoinstitucional.component';
import { EditInfoInstitucionalComponent } from './components/edit-info-institucional/edit-info-institucional.component';
import { GetinfoinstitucionalComponent } from './components/getinfoinstitucional/getinfoinstitucional.component';
import { EditEquipoComponent } from './components/edit-equipo/edit-equipo.component';
import { NewsolicitudservicioComponent } from './components/newsolicitudservicio/newsolicitudservicio.component';
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
import { ColorearDirective } from './directives/colorear.directive';
import { Getrma002Component } from './components/getrma002/getrma002.component';
import { GetadquisicionComponent } from './components/getadquisicion/getadquisicion.component';
import { GetclasificacionComponent } from './components/getclasificacion/getclasificacion.component';
import { GetdocumentosanexoshvComponent } from './components/getdocumentosanexoshv/getdocumentosanexoshv.component';
import { GetfabricantesproveedoresComponent } from './components/getfabricantesproveedores/getfabricantesproveedores.component';
import { GetdocumentosproveedorComponent } from './components/getdocumentosproveedor/getdocumentosproveedor.component';
import { GethistoricoComponent } from './components/gethistorico/gethistorico.component';
import { GetinfotecnicaComponent } from './components/getinfotecnica/getinfotecnica.component';
import { GetmantenimientoComponent } from './components/getmantenimiento/getmantenimiento.component';
import { GetobservacionesComponent } from './components/getobservaciones/getobservaciones.component';
import { GetreactivosComponent } from './components/getreactivos/getreactivos.component';
import { GetinformemantenimientoComponent } from './components/getinformemantenimiento/getinformemantenimiento.component';
import { GetsolicitudservicioComponent } from './components/getsolicitudservicio/getsolicitudservicio.component';
import { GetinformeservicioComponent } from './components/getinformeservicio/getinformeservicio.component';
import { GetmatrizsolicitudesComponent } from './components/getmatrizsolicitudes/getmatrizsolicitudes.component';
import { Rma004Component } from './components/rma004/rma004.component';
import { Rma005Component } from './components/rma005/rma005.component';
import { Editrma005Component } from './components/editrma005/editrma005.component';
import { Editrma004Component } from './components/editrma004/editrma004.component';
import { Newrma004Component } from './components/newrma004/newrma004.component';
import { Newrma005Component } from './components/newrma005/newrma005.component';
import { BuscadorComponent } from './components/buscador/buscador.component';


@NgModule({
  declarations: [
    AppComponent,
    LoginComponent,
    CronogramaMantenimientoComponent,
    CronogramaCalibracionCalificacionComponent,
    MenuprincipalComponent,
    EquipoComponent,
    FooterComponent,
    NavBarComponent,
    AdquisicionComponent,
    ClasificacionComponent,
    DocumentosanexosComponent,
    DocumentosproveedorComponent,
    FabricantesproveedoresComponent,
    FuncionalidadequiposComponent,
    HistoricoComponent,
    HojavidaComponent,
    InfoinstitucionalComponent,
    InfotecnicaComponent,
    InformemantenimientoComponent,
    InformeservicioComponent,
    InspefuncionalidadComponent,
    InventarioComponent,
    MantenimientoComponent,
    MatrizsolicitudesComponent,
    ObservacionesComponent,
    ReactivosComponent,
    Rma002Component,
    SolicitudsevicioComponent,
    NewequipoComponent,
    EquipocreadoComponent,
    NewinfoinstitucionalComponent,
    EditInfoInstitucionalComponent,
    GetinfoinstitucionalComponent,
    EditEquipoComponent,
    NewsolicitudservicioComponent,
    EditsolicitudservicioComponent,
    NewadquisicionComponent,
    EditadquisicionComponent,
    NewclasificacionComponent,
    EditclasificacionComponent,
    NewdocumentosanexoshvComponent,
    EditdocumentosanexoshvComponent,
    NewdocumentosproveedorComponent,
    EditdocumentosproveedorComponent,
    NewfabricantesproveedoresComponent,
    EditfabricantesproveedoresComponent,
    NewfuncionalidadComponent,
    EditfuncionalidadComponent,
    NewhistoricoComponent,
    EdithistoricoComponent,
    NewinfotecnicaComponent,
    EditinfotecnicaComponent,
    NewmantenimientoComponent,
    EditmantenimientoComponent,
    NewobservacionesComponent,
    EditobservacionesComponent,
    NewreactivosComponent,
    EditreactivosComponent,
    NewRMA002Component,
    EditRMA002Component,
    NewinformemantenimientoComponent,
    EditinformemantenimientoComponent,
    NewinformeservicioComponent,
    EditinformeservicioComponent,
    NewmatrizsolicitudesComponent,
    EditmatrizsolicitudesComponent,
    ColorearDirective,
    PintarDirective,
    Getrma002Component,
    GetadquisicionComponent,
    GetclasificacionComponent,
    GetdocumentosanexoshvComponent,
    GetfabricantesproveedoresComponent,
    GetdocumentosproveedorComponent,
    GethistoricoComponent,
    GetinfotecnicaComponent,
    GetmantenimientoComponent,
    GetobservacionesComponent,
    GetreactivosComponent,
    GetinformemantenimientoComponent,
    GetsolicitudservicioComponent,
    GetinformeservicioComponent,
    GetmatrizsolicitudesComponent,
    Rma004Component,
    Rma005Component,
    Editrma005Component,
    Editrma004Component,
    Newrma004Component,
    Newrma005Component,
    BuscadorComponent
  ],
  imports: [
    BrowserModule, CommonModule,
    APP_ROUTING,
    FormsModule, HttpClientModule
  ],
  providers: [
    EquiposService, FormatosService, ProveedoresService
  ],
  bootstrap: [AppComponent],
  schemas: [CUSTOM_ELEMENTS_SCHEMA]
})
export class AppModule { }
