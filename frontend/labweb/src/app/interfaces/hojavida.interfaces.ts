import { Adq_Equipos } from './adq_equipos.interfaces';
import { Info_Institucional } from './info_institucional.interfaces';
import { Fabricantes_Proveedores } from './fabricantes_proveedores.interfaces';
import { Info_Tecnica_Equipo } from './info_tecnica_equipo.interfaces';
import { Observaciones_Adicionales } from './observaciones_adicionales.interfaces';
import { Doc_Proveedor } from './doc_proveedor.interfaces';
import { Clasifi_Equipo } from './clasifi_equipo.interfaces';
import { Reactivos_Accesorios } from './reactivos_accesorios.interfaces';
import { InformeMantenimiento } from './informemantenimiento.interfaces';
import { Mantenimiento_Equipos } from './mantenimiento_equipos.interfaces';
import { Doc_AnexosHv } from './doc_anexoshv.interfaces';
import { Hist_Solicitudes_Equipos } from './hist_solicitudes_equipos.interfaces';
import { Equipos } from './equipos.interfaces';

export interface Hoja_Vida extends Equipos, Info_Institucional, Info_Tecnica_Equipo,
    Adq_Equipos, Fabricantes_Proveedores, Observaciones_Adicionales, Doc_Proveedor, Clasifi_Equipo,
    Reactivos_Accesorios, InformeMantenimiento, Mantenimiento_Equipos, Doc_AnexosHv, Hist_Solicitudes_Equipos {
}




