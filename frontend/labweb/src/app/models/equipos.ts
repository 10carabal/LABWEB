export class EquiposModel {
    NUM_HOJA_VIDA: number;
    Nombre: string;
    Imagen_Equipo: string;
    Marca: string;
    Modelo: string;
    Serial: string;
    Activo_Fijo: string;
    Area: string;
    Sub_Area: string;
    Registro_Sanitario: string;
    Permiso_Comercializacion: string;
    constructor() {
        this.Registro_Sanitario = "No";
        this.Permiso_Comercializacion = "No"
    }

}
