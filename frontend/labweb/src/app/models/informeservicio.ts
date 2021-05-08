export class InformeServicioModel {
    id: number;
    NUM_HOJA_VIDA: number;
    Consecutivo_Orden: number;
    Codigo_Prestador: string;
    Servicio: string;
    Ubicacion: string;
    Fecha_Informe: string;
    Problema_Detectado: string;
    Actividades_Realizadas: string;
    Repuestos_Instalados: string;
    Accesorios_Instalados: string;
    Insumos_Instalados: string;
    Mediciones: string;
    Observaciones: string;
    Nombre_Responsable: string;
    Cargo_Responsable: string;
    Nombre_Responsable_Recibir: string;
    Cargo_Responsable_Recibir: string;
    constructor(
    ) {
        this.NUM_HOJA_VIDA = 1;
        this.Consecutivo_Orden = 1;
    }
}
