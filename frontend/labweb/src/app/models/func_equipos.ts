export class Func_EquiposModel {
    id: number;
    NUM_HOJA_VIDA: number;
    Consecutivo_Orden: number;
    Laboratorio: string;
    Fecha_Ejecucion: string;
    Nombre_Responsable: string;
    Cargo_Responsable: string;
    Funcionamiento_Equipo: string;
    Estado_Entorno: string;
    Estado_Accesorio_Consumibles: string;
    Estado_lineas_Alimentacion: string;
    Estado_Almacenamiento: string;
    Documentacion_Presente: string;
    constructor(
    ) {
        this.NUM_HOJA_VIDA = 1;
        this.Consecutivo_Orden = 1;
        this.Funcionamiento_Equipo = "BE Buen Estado";
        this.Estado_Entorno = "BE Buen Estado";
        this.Estado_Accesorio_Consumibles = "BE Buen Estado";
        this.Estado_lineas_Alimentacion = "BE Buen Estado";
        this.Estado_Almacenamiento = "BE Buen Estado";
        this.Documentacion_Presente = "BE Buen Estado";
    }
}
