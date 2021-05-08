export class Matriz_SolicitudesModel {
    id: number;
    NUM_HOJA_VIDA: number;
    Consecutivo_Orden: number;
    Fecha_Solicitud: string;
    Descripcion_Solicitud: string;
    CDIS_Presupuesto: number;
    Fecha_Ejecucion: string;
    EJECUTADO: number;
    NO_EJECUTADO: number;
    Personal_Encargado: string;
    Total_Solicitudes: number;
    constructor(
    ) {
        this.NUM_HOJA_VIDA = 1;
        this.Consecutivo_Orden = 1;

    }
}
