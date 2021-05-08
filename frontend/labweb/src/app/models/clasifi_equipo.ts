export class Clasifi_EquipoModel {
    id: number;
    NUM_HOJA_VIDA: number;
    CLASIFICACION_DE_EQUIPO: string;
    CLASIFICACION_USO: string;
    CLASIFICACION_BIOMEDICA: string;
    TECNOLOGIA_PREDOMINANTE: string;
    CLASIFICACION_RIESGO: string;
    CLASE_RIESGO_ELECTRICO: string;
    TIPO_RIESGO_ELECTRICO: string;
    CLASES_SOFTWARE: string;
    COMPLEJIDAD_TECNOLOGICA_EQUIPO: string;
    FUENTES_ALIMENTACION: string;
    CICLO_MANTENIMIENTO: string;
    CICLO_CALIB_VALID_CALPERSONAL: string;
    constructor(

    ) {
        this.NUM_HOJA_VIDA = 1;
        this.CLASIFICACION_DE_EQUIPO = 'Médico';
        this.CLASIFICACION_USO = 'Médico';
        this.CLASIFICACION_BIOMEDICA = 'Diagnóstico';
        this.TECNOLOGIA_PREDOMINANTE = 'Mecánico';
        this.CLASIFICACION_RIESGO = 'Bajo Riesgo I';
        this.CLASES_SOFTWARE = 'Programación';
        this.FUENTES_ALIMENTACION = 'Electricidad';
        this.CICLO_MANTENIMIENTO = '12 Meses';
        this.CICLO_CALIB_VALID_CALPERSONAL = '12 Meses';
    }
}
