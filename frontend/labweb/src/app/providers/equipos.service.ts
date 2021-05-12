import { Mantenimiento_EquiposModel } from './../models/mantenimiento_equipos';
import { Info_Tecnica_EquipoModel } from './../models/info_tecnica_equipo';
import { Reactivos_AccesoriosModel } from './../models/reactivos_accesorios';
import { Clasifi_EquipoModel } from './../models/clasifi_equipo';
import { Adq_EquiposModel } from './../models/adq_equipos';
import { Info_InstitucionalModel } from './../models/info_institucional';
import { EquiposModel } from './../models/equipos';
import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';
import { Hist_Solicitudes_EquiposModel } from '../models/hist_solicitudes_equipos';

@Injectable()
export class EquiposService {

    private url: string = 'http://labweb.usc.edu.co:8000/api';
    //private url: string = 'http://127.0.0.1:8000/api';

    headers = new HttpHeaders({
        'Content-Type': 'application/json',
        'Access-Control-Allow-Methods': 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
        'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token',
    });

    constructor(private http: HttpClient) {
        console.log(' servicio de equipos inicializado');
    }
    //SERVICIOS DE INFORMACIÓN INSTITUCIONAL
    createInfo(info: Info_InstitucionalModel): Observable<any> {
        let json = JSON.stringify(info);
        let params = 'json=' + json;
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Access-Control-Allow-Methods': 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
            'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token',
        });

        return this.http.post(`${this.url}/infoinstitucional/`, params, {
            headers: headers1,
        });
    }
    updateInfo(info: Info_InstitucionalModel, id): Observable<any> {
        let json = JSON.stringify(info);
        let params = 'json=' + json;
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',

            'Access-Control-Allow-Methods': 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
            'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token',
        });
        console.log(params);
        return this.http.put(`${this.url}/infoinstitucional/` + id, params, {
            headers: headers1
        });
    }
    getInfoI(id): Observable<any> {
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',

        });
        return this.http.get(`${this.url}/infoinstitucional/${id}`, id);
    }
    getInfo() {
        let headers = this.headers;
        return this.http
            .get(`${this.url}/infoinstitucional`, { headers })
            .toPromise()
            .then((response: any) => response);
    }

    borrarInfo(id: any) {
        return this.http.delete(`${this.url}/infoinstitucional/${id}`);
    }

    //SERVICIOS  DE EQUIPOS
    getEquipos(endpoint) {
        let headers = this.headers;
        return this.http
            .get(`${this.url}/${endpoint}`, { headers })
            .toPromise()
            .then((response: any) => response);
    }
    borrarEquipo(id: any) {
        return this.http.delete(`${this.url}/equipos/${id}`);
    }
    createEquipo(equipo: EquiposModel): Observable<any> {
        let json = JSON.stringify(equipo);
        let params = 'json=' + json;
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',

            'Access-Control-Allow-Methods': 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
            'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token',
        });

        return this.http.post(`${this.url}/equipos/`, params, {
            headers: headers1,
        });
    }
    updateEquipo(equipo: EquiposModel, id): Observable<any> {
        let json = JSON.stringify(equipo);
        let params = 'json=' + json;
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',

            'Access-Control-Allow-Methods': 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
            'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token',
        });
        console.log(params);
        return this.http.put(`${this.url}/equipos/` + id, params, {
            headers: headers1
        });
    }

    getEquipo(num) {
        return this.http.get(`${this.url}/equipos/${num}`, num);
    }

    ObternerImagenEquipo(imagen) {
        let headers = new HttpHeaders({
            'Content-Type': 'application/json',
            Accept: 'text/javascript',
        });
        return this.http
            .get(`${this.url} / imagenes / `, { headers })
            .toPromise()
            .then((response: any) => {
                console.log('API Response : ', response.json());
            })
            .catch((error) => {
                console.error('API Error : ', error.status);
                console.error('API Error : ', JSON.stringify(error));
            });
    }

    getImagenEquipo() {
        let headers = new HttpHeaders({
            'Content-Type': 'application/json',
            Accept: 'text/javascript',
        });
        return this.http
            .get(`${this.url} / imagenes`, { headers })
            .toPromise()
            .then((response: any) => {
                console.log('API Response : ', response.json());
            })
            .catch((error) => {
                console.error('API Error : ', error.status);
                console.error('API Error : ', JSON.stringify(error));
            });
    }

    //SERVICIOS DE ADQUISICION DE EQUIPOS
    createCompraEquipos(compra: Adq_EquiposModel): Observable<any> {
        let json = JSON.stringify(compra);
        let params = 'json=' + json;
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',

            'Access-Control-Allow-Methods': 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
            'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token',
        });

        return this.http.post(`${this.url}/compraequipos/`, params, {
            headers: headers1,
        });
    }
    updateCompraEquipos(compra: Adq_EquiposModel, id): Observable<any> {
        let json = JSON.stringify(compra);
        let params = 'json=' + json;
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',

            'Access-Control-Allow-Methods': 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
            'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token',
        });
        console.log(params);
        return this.http.put(`${this.url}/compraequipos/` + id, params, {
            headers: headers1
        });
    }
    getCompraEquiposI(id): Observable<any> {
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',

        });
        return this.http.get(`${this.url}/compraequipos/${id}`, id);
    }
    getCompraEquipos() {
        let headers = this.headers;
        return this.http
            .get(`${this.url}/compraequipos`, { headers })
            .toPromise()
            .then((response: any) => response);
    }

    borrarCompraEquipos(id: any) {
        return this.http.delete(`${this.url}/compraequipos/${id}`);
    }
    //SERVICIOS DE CLASIFICACIÓN DE EQUIPOS
    createClasificacionEquipos(clasificacion: Clasifi_EquipoModel): Observable<any> {
        let json = JSON.stringify(clasificacion);
        let params = 'json=' + json;
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',

            'Access-Control-Allow-Methods': 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
            'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token',
        });

        return this.http.post(`${this.url}/clasificacionequipos/`, params, {
            headers: headers1,
        });
    }
    updateClasificacionEquipos(clasificacion: Clasifi_EquipoModel, id): Observable<any> {
        let json = JSON.stringify(clasificacion);
        let params = 'json=' + json;
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',

            'Access-Control-Allow-Methods': 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
            'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token',
        });
        console.log(params);
        return this.http.put(`${this.url}/clasificacionequipos/` + id, params, {
            headers: headers1
        });
    }
    getClasificacionEquiposI(id): Observable<any> {
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',

        });
        return this.http.get(`${this.url}/clasificacionequipos/${id}`, id);
    }
    getClasificacionEquipos() {
        let headers = this.headers;
        return this.http
            .get(`${this.url}/clasificacionequipos`, { headers })
            .toPromise()
            .then((response: any) => response);
    }

    borrarClasificacionEquipos(id: any) {
        return this.http.delete(`${this.url}/clasificacionequipos/${id}`);
    }


    //SERVICIOS DE REACTIVOS ACCESORIOS 
    createReactivosAccesorios(reactivos: Reactivos_AccesoriosModel): Observable<any> {
        let json = JSON.stringify(reactivos);
        let params = 'json=' + json;
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',

            'Access-Control-Allow-Methods': 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
            'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token',
        });

        return this.http.post(`${this.url}/reactivos/`, params, {
            headers: headers1,
        });
    }
    updateReactivosAccesorios(reactivos: Reactivos_AccesoriosModel, id): Observable<any> {
        let json = JSON.stringify(reactivos);
        let params = 'json=' + json;
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Access-Control-Allow-Methods': 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
            'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token',
        });
        console.log(params);
        return this.http.put(`${this.url}/reactivos/` + id, params, {
            headers: headers1
        });
    }
    getReactivosAccesoriosI(id): Observable<any> {
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',

        });
        return this.http.get(`${this.url}/reactivos/${id}`, id);
    }
    getReactivosAccesorios() {
        let headers = this.headers;
        return this.http
            .get(`${this.url}/reactivos`, { headers })
            .toPromise()
            .then((response: any) => response);
    }

    borrarReactivosAccesorios(id: any) {
        return this.http.delete(`${this.url}/reactivos/${id}`);
    }
    //SERVICIOS DE INFORMACIÓN TECNICA EQUIPO
    createInfoTecnica(tecnica: Info_Tecnica_EquipoModel): Observable<any> {
        let json = JSON.stringify(tecnica);
        let params = 'json=' + json;
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Access-Control-Allow-Methods': 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
            'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token',
        });

        return this.http.post(`${this.url}/infotecnicaequipo/`, params, {
            headers: headers1,
        });
    }
    updateInfoTecnica(tecnica: Info_Tecnica_EquipoModel, id): Observable<any> {
        let json = JSON.stringify(tecnica);
        let params = 'json=' + json;
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Access-Control-Allow-Methods': 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
            'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token',
        });
        console.log(params);
        return this.http.put(`${this.url}/infotecnicaequipo/` + id, params, {
            headers: headers1
        });
    }
    getInfoTecnicaI(id): Observable<any> {
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',

        });
        return this.http.get(`${this.url}/infotecnicaequipo/${id}`, id);
    }
    getInfoTecnica() {
        let headers = this.headers;
        return this.http
            .get(`${this.url}/infotecnicaequipo`, { headers })
            .toPromise()
            .then((response: any) => response);
    }

    borrarInfoTecnica(id: any) {
        return this.http.delete(`${this.url}/infotecnicaequipo/${id}`);
    }

    //SERVICIOS DE HISTORICO DE SOLICITUDES
    createHistorico(historico: Hist_Solicitudes_EquiposModel): Observable<any> {
        let json = JSON.stringify(historico);
        let params = 'json=' + json;
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Access-Control-Allow-Methods': 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
            'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token',
        });

        return this.http.post(`${this.url}/historico/`, params, {
            headers: headers1,
        });
    }
    updateHistorico(historico: Hist_Solicitudes_EquiposModel, id): Observable<any> {
        let json = JSON.stringify(historico);
        let params = 'json=' + json;
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Access-Control-Allow-Methods': 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
            'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token',
        });
        console.log(params);
        return this.http.put(`${this.url}/historico/` + id, params, {
            headers: headers1
        });
    }
    getHistoricoI(id): Observable<any> {
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',

        });
        return this.http.get(`${this.url}/historico/${id}`, id);
    }
    getHistorico() {
        let headers = this.headers;
        return this.http
            .get(`${this.url}/historico`, { headers })
            .toPromise()
            .then((response: any) => response);
    }

    borrarHistorico(id: any) {
        return this.http.delete(`${this.url}/historico/${id}`);
    }

    //SERVICIOS DE MANTENIMIENTO DE EQUIPO
    createMantenimiento(mantenimiento: Mantenimiento_EquiposModel): Observable<any> {
        let json = JSON.stringify(mantenimiento);
        let params = 'json=' + json;
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Access-Control-Allow-Methods': 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
            'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token',
        });

        return this.http.post(`${this.url}/mantenimientoequipos/`, params, {
            headers: headers1,
        });
    }
    updateMantenimiento(mantenimiento: Mantenimiento_EquiposModel, id): Observable<any> {
        let json = JSON.stringify(mantenimiento);
        let params = 'json=' + json;
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Access-Control-Allow-Methods': 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
            'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token',
        });
        console.log(params);
        return this.http.put(`${this.url}/mantenimientoequipos/` + id, params, {
            headers: headers1
        });
    }
    getMantenimientoI(id): Observable<any> {
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',

        });
        return this.http.get(`${this.url}/mantenimientoequipos/${id}`, id);
    }
    getMantenimiento() {
        let headers = this.headers;
        return this.http
            .get(`${this.url}/mantenimientoequipos`, { headers })
            .toPromise()
            .then((response: any) => response);
    }

    borrarMantenimiento(id: any) {
        return this.http.delete(`${this.url}/mantenimientoequipos/${id}`);
    }

    /* buscarEquipos(equipo_actual: string) {
        equipos: EquiposModel[] = [];

        let equiposArr: EquiposModel[] = [];
        equipo_actual = equipo_actual.toLowerCase();

        for (let equipo of this.equipos) {
            let nombre = equipo.Nombre.toLowerCase();

            if (nombre.indexOf(equipo_actual) >= 0) {
                equiposArr.push(equipo)
            }
        }

        return equiposArr;
    } */
}

//Subir 
//git add . 
// git commit -m "";
//git push origin master
//Descargar servidor
//git pull origin master