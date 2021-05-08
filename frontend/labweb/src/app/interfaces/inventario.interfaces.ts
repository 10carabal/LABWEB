import { Adq_Equipos } from './adq_equipos.interfaces';
import { Clasifi_Equipo } from './clasifi_equipo.interfaces';
import { Doc_AnexosHv } from './doc_anexoshv.interfaces';
import { Doc_Proveedor } from './doc_proveedor.interfaces';
import { Equipos } from './equipos.interfaces';
import { Fabricantes_Proveedores } from './fabricantes_proveedores.interfaces';
import { Hist_Solicitudes_Equipos } from './hist_solicitudes_equipos.interfaces';
import { InformeMantenimiento } from './informemantenimiento.interfaces';
import { Info_Institucional } from './info_institucional.interfaces';
import { Info_Tecnica_Equipo } from './info_tecnica_equipo.interfaces';
import { Mantenimiento_Equipos } from './mantenimiento_equipos.interfaces';
import { Observaciones_Adicionales } from './observaciones_adicionales.interfaces';
import { Reactivos_Accesorios } from './reactivos_accesorios.interfaces';

export interface Inventario extends Equipos, Info_Institucional, Info_Tecnica_Equipo,
  Adq_Equipos, Fabricantes_Proveedores, Observaciones_Adicionales, Doc_Proveedor, Clasifi_Equipo,
  Reactivos_Accesorios, InformeMantenimiento, Mantenimiento_Equipos, Doc_AnexosHv, Hist_Solicitudes_Equipos {
}
