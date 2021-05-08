export class Info_Tecnica_EquipoModel {
    id: number;
    NUM_HOJA_VIDA: number;
    Codigo_ECRI: string;
    Nomenclatura_Internacional: string;
    Nomenclatura: string;
    Tipo_Equipo: string;
    Firmware: string;
    Software: string;
    Rango_Voltaje: number;
    Corriente: number;
    Potencia: number;
    Frecuencia_HZ: number;
    Dimensiones_CM: number;
    Presion: number;
    Temperatura: number;
    Peso_KGS: number;
    Humedad: number;
    RPM: number;
    Descripcion_Equipo: string;
    Otras_Recomendaciones: string;
    constructor(
    ) {
        this.NUM_HOJA_VIDA = 1;
        this.Tipo_Equipo = "Móvil";
        this.Firmware = "Si";
        this.Software = "Si";

    }
}
