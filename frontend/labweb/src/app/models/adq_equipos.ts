export class Adq_EquiposModel {
    id: number;
    NUM_HOJA_VIDA: number;
    Nombre: string;
    FECHA_COMPRA: string;
    FECHA_FABRICACION: string;
    FECHA_INSTALACION: string;
    FECHA_ACTA_RECIBOS: string;
    FECHA_INICIO_OPERACION: string;
    COSTO_EQUIPO: string;
    FORMA_ADQUISICION: string;
    GARANTIA_ANIOS: number;
    ESTADO_GARANTIA: string;
    FIN_GARANTIA: string;
    ESTADO_ACTUAL: string;
    ANIOS_USO: string;
    FACTURA: string;
    ORDEN_DE_COMPRA: string;
    VIDA_UTIL: string;
    RAZON_VIDA_UTIL: string;
    FECHA_INGRESO_INVENTARIO: string;
    EJECUTOR_HOJA_VIDA: string;
    LIDER_PROCESO: string;

    constructor(
    ) {
        this.NUM_HOJA_VIDA = 1;
        this.FORMA_ADQUISICION = "Compra Directa";

    }
}
