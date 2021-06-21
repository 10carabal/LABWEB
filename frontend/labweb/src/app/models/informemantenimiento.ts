export class InformeMantenimientoModel {
    id: number;
    NUM_HOJA_VIDA: number;
    Consecutivo_Orden: number;
    Tipo_Mantenimiento: string;
    Imagen_Antes_Mantenimiento: File | string;
    Imagen_Despues_Mantenimiento: File | string;
    Fecha_Mantenimiento: string;
    Hora_Inicio: number;
    Hora_Fin: number;
    Tipo_Equipo: string;
    Actividades_Realizadas: string;
    Observacion_Mantenimiento: string;
    Estado_Equipo: string;
    Test_Funcionalidad: string;
    Limpieza: string;
    Reemplazo_Accesorios: string;
    Herramientas_Utilizadas: string;
    Equipo_Proteccion_Personal: string;
    Nombre_Responsable_Mento: string;
    Cargo_Responsable_Mento: string;
    Nombre_Responsable_Recibir: string;
    Cargo_Responsable_Recibir: string;
    constructor(
    ) {
        this.NUM_HOJA_VIDA = 1;
        this.Consecutivo_Orden = 1;
        this.Tipo_Equipo = "Médico";
        this.Limpieza = "N/P";
        this.Reemplazo_Accesorios = "N/P";

    }
}
