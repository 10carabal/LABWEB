export class Hist_Solicitudes_EquiposModel {
    id: number;
    NUM_HOJA_VIDA: number;
    Consecutivo_Orden: number;
    Tipo_Servicio: string;
    Fecha: string;
    Costo: string;
    Repuestos: string;
    HH: number;
    HP: number;
    Observaciones: string;
    Nombre_Responsable: string;
    Cargo_Responsable: string;
    Nombre_Responsable_Reporte: string;
    constructor(
    ) {

        this.NUM_HOJA_VIDA = 1;
        this.Consecutivo_Orden = 1;
    }
}
