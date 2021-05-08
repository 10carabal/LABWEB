export class Solicitud_ServicioModel {
    NUM_HOJA_VIDA: number;
    Consecutivo_Orden: number;
    Fecha_Solicitud_Servicio: string;
    Hora_Solicitud_Servicio: number;
    Servicio: string;
    Ubicacion: string;
    Descripcion_Problema: string;
    Nombre_Responsable: string;
    Cargo_Responsable: string;
    constructor() {
        this.NUM_HOJA_VIDA = 1;
    }
}
