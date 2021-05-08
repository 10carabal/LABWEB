export class Mantenimiento_EquiposModel {
    id: number;
    NUM_HOJA_VIDA: number;
    Mantenimiento_Propio: string;
    Mantenimiento_Contratado: string;
    Por_Orden_Compra: string;
    Requiere_Calibracion: string;
    Requiere_Cal_Operacional: string;
    Requiere_Validacion: string;
    constructor(
    ) {
        this.NUM_HOJA_VIDA = 1;
        this.Mantenimiento_Contratado = "No";
        this.Mantenimiento_Propio = "No";
        this.Por_Orden_Compra = "No";
        this.Requiere_Calibracion = "No";
        this.Requiere_Cal_Operacional = "No";
        this.Requiere_Validacion = "No";
    }
}
