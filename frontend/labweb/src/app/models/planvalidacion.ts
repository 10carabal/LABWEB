export class PlanValidacionModel {
    id: number;
    NUM_HOJA_VIDA: number;
    Consecutivo_Orden: number;
    FCIA_VACION_CALIB: string;
    FECHA_EJECUCION: string;
    ESTADO_EJECUCION: string;
    OBSERVACIONES_EQUIPO: string;

    constructor(
    ) {
        this.NUM_HOJA_VIDA = 1;
        this.Consecutivo_Orden = 1;
        this.FCIA_VACION_CALIB = "12 Meses";
        this.ESTADO_EJECUCION = "N/P";
    }
}
