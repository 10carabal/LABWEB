export class PlanMantenimientoModel {
    id: number;
    NUM_HOJA_VIDA: number;
    Consecutivo_Orden: number;
    FREC_MENTO_PREVENTIVO: string;
    FECHA_EJECUCION: string;
    ESTADO_EJECUCION: string;
    RESPONSABLE_MANTENIMIENTO: string;
    OBSERVACIONES_EQUIPO: string;
    COSTO_MANTENIMIENTO: number;
    constructor() {

        this.NUM_HOJA_VIDA = 1;
        this.Consecutivo_Orden = 1;
        this.FREC_MENTO_PREVENTIVO = "12 Meses";
        this.ESTADO_EJECUCION = "N/P"
    }
}
