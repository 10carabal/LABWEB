import { UserService } from './user/user.service';
import { PlanValidacionModel } from './../models/planvalidacion';
import { PlanMantenimientoModel } from './../models/planmantenimiento';
import { RMA002Model } from './../models/rma002';
import { Matriz_SolicitudesModel } from './../models/matriz_solicitudes';
import { InformeServicioModel } from './../models/informeservicio';
import { InformeMantenimientoModel } from './../models/informemantenimiento';
import { Observable } from 'rxjs';
import { Solicitud_ServicioModel } from './../models/solicitud_servicio';
import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Func_EquiposModel } from '../models/func_equipos';

@Injectable()
export class FormatosService {

    private url: string = 'http://labweb.usc.edu.co:8000/api';

    private url: string = "http://127.0.0.1:8000/api";
    headers: HttpHeaders = new HttpHeaders({
    });

    constructor(private http: HttpClient, private userService: UserService) {
        console.log(' servicio de equipos inicializado');
        //this.headers.append('Authorization', this.userService.getToken());
        this.headers = this.headers.set('Authorization', this.userService.getToken());
    }

    //SERVICIOS DE CRONOGRAMA MANTENIMIENTO
    createRMA004(rma004: PlanMantenimientoModel): Observable<any> {
        let json = JSON.stringify(rma004);
        let params = 'json=' + json;
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Authorization': this.userService.getToken(),
            'Accept': 'application/json',
            //'Access-Control-Allow-Origin': '*',
            //'Access-Control-Allow-Methods': 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
            //'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token',
        });

        return this.http.post(`${this.url}/planmantenimiento/`, params, {
            headers: headers1,
        });
    }
    updateRMA004(rma004: PlanMantenimientoModel, id): Observable<any> {
        let json = JSON.stringify(rma004);
        let params = 'json=' + json;
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Authorization': this.userService.getToken(),
            'Accept': 'application/json',
            //'Access-Control-Allow-Origin': '*',
            //'Access-Control-Allow-Methods': 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
            //'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token',
        });
        console.log(params);
        return this.http.put(`${this.url}/planmantenimiento/` + id, params, {
            headers: headers1
        });
    }
    getRMA004I(id): Observable<any> {
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Authorization': this.userService.getToken(),
            'Accept': 'application/json',

        });
        return this.http.get(`${this.url}/RMA004/${id}`, id);
    }

    getRMA004() {
        let headers = this.headers;
        return this.http
            .get(`${this.url}/planmantenimiento`, { headers })
            .toPromise()
            .then((response: any) => response);
    }

    borrarRMA004(id: any) {
        return this.http.delete(`${this.url}/planmantenimiento/${id}`);
    }
    getPDFRMA004I(id: string, open: boolean = true): string {
        const route = "planmantenimiento";
        if (open) {
            window.open(`${this.url}/${route}/${id}?download=pdf`, "_blank");
        }
        return `${this.url}/${route}/${id}?download=pdf`;
    }
    getCronogramaMantenimiento(endpoint) {

        let headers = this.headers;
        return this.http.get(`${this.url}/${endpoint}`, { headers }).toPromise()
            .then((response: any) => response);


    }
    getFechaMantenimiento(endpoint, id) {

        let headers = this.headers;
        return this.http.get(`${this.url}/${endpoint}/${id}`, { headers }).toPromise()
            .then((response: any) => response);
    }

    //SERVICIOS DE CRONOGRAMA Validación
    createRMA005(rma005: PlanValidacionModel): Observable<any> {
        let json = JSON.stringify(rma005);
        let params = 'json=' + json;
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Authorization': this.userService.getToken(),
            'Accept': 'application/json',
            //'Access-Control-Allow-Origin': '*',
            //'Access-Control-Allow-Methods': 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
            //'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token',
        });

        return this.http.post(`${this.url}/planvalidacion/`, params, {
            headers: headers1,
        });
    }
    updateRMA005(rma005: PlanValidacionModel, id): Observable<any> {
        let json = JSON.stringify(rma005);
        let params = 'json=' + json;
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Authorization': this.userService.getToken(),
            'Accept': 'application/json',
            //'Access-Control-Allow-Origin': '*',
            //'Access-Control-Allow-Methods': 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
            //'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token',
        });
        console.log(params);
        return this.http.put(`${this.url}/planvalidacion/` + id, params, {
            headers: headers1
        });
    }
    getRMA005I(id): Observable<any> {
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Authorization': this.userService.getToken(),
            'Accept': 'application/json',

        });
        return this.http.get(`${this.url}/RMA005/${id}`, id);
    }

    getRMA005() {
        let headers = this.headers;
        return this.http
            .get(`${this.url}/planvalidacion`, { headers })
            .toPromise()
            .then((response: any) => response);
    }

    borrarRMA005(id: any) {
        return this.http.delete(`${this.url}/planvalidacion/${id}`);
    }
    getPDFRMA005I(id: string, open: boolean = true): string {
        const route = "planvalidacion";
        if (open) {
            window.open(`${this.url}/${route}/${id}?download=pdf`, "_blank");
        }
        return `${this.url}/${route}/${id}?download=pdf`;
    }

    getCronogramaValidacion(endpoint) {

        let headers = this.headers;
        return this.http.get(`${this.url}/${endpoint}`, { headers }).toPromise()
            .then((response: any) => response);


    }
    getFechaValidacion(endpoint, id) {

        let headers = this.headers;
        return this.http.get(`${this.url}/${endpoint}/${id}`, { headers }).toPromise()
            .then((response: any) => response);
    }
    //SEVICIOS DE HOJA DE VIDA

    getRMA001I(id): Observable<any> {
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Authorization': this.userService.getToken(),
            'Accept': 'application/json',

        });
        return this.http.get(`${this.url}/RMA001/${id}`, id);
    }
    getRMA001() {
        let headers = this.headers;
        return this.http
            .get(`${this.url}/RMA001`, { headers })
            .toPromise()
            .then((response: any) => response);
    }

    //SEVICIOS DE INVENTARIO

    getRMA003I(id): Observable<any> {
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Authorization': this.userService.getToken(),
            'Accept': 'application/json',

        });
        return this.http.get(`${this.url}/RMA003/${id}`, id);
    }
    getRMA003() {
        let headers = this.headers;
        return this.http
            .get(`${this.url}/RMA003`, { headers })
            .toPromise()
            .then((response: any) => response);
    }
    getPDFRMA003I(id: string, open: boolean = true): string {
        const route = "inventario";
        if (open) {
            window.open(`${this.url}/${route}/${id}?download=pdf`, "_blank");
        }
        return `${this.url}/${route}/${id}?download=pdf`;
    }

    //SERVICIOS DE INFORME MANTENIMIENTO RMA006
    createRMA006(rma006: InformeMantenimientoModel): Observable<any> {
        let json = JSON.stringify(rma006);
        const formData = new FormData();
        Object.keys(rma006).map((key) => {
            formData.append(key, rma006[key]);
        });
        console.log(formData, rma006.Imagen_Antes_Mantenimiento);
        let params = 'json=' + json;
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Authorization': this.userService.getToken(),
            'Accept': 'application/json',
            //'Access-Control-Allow-Origin': '*',
            //'Access-Control-Allow-Methods': 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
            //'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token',
        });

        return this.http.post(`${this.url}/informemantenimiento/`, formData);
    }
    updateRMA006(rma006: InformeMantenimientoModel, id): Observable<any> {
        let json = JSON.stringify(rma006);
        let params = 'json=' + json;
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Authorization': this.userService.getToken(),
            'Accept': 'application/json',
            //'Access-Control-Allow-Origin': '*',
            //'Access-Control-Allow-Methods': 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
            //'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token',
        });
        console.log(params);
        return this.http.put(`${this.url}/informemantenimiento/` + id, params, {
            headers: headers1
        });
    }
    getRMA006I(id): Observable<any> {
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Authorization': this.userService.getToken(),
            'Accept': 'application/json',

        });
        return this.http.get(`${this.url}/RMA006/${id}`, id);
    }
    getRMA006() {
        let headers = this.headers;
        return this.http
            .get(`${this.url}/informemantenimiento`, { headers })
            .toPromise()
            .then((response: any) => response);
    }
    /* getFormatoRMA006() {
        let headers = this.headers;
        return this.http
            .get(`${this.url}/RMA006`, { headers })
            .toPromise()
            .then((response: any) => response);
    } */

    borrarRMA006(id: any) {
        return this.http.delete(`${this.url}/informemantenimiento/${id}`);
    }
    getPDFRMA006I(id: string, open: boolean = true): string {
        const route = "informemantenimiento";
        if (open) {
            window.open(`${this.url}/${route}/${id}?download=pdf`, "_blank");
        }
        return `${this.url}/${route}/${id}?download=pdf`;
    }
    //SERVICIOS DE SOLICITUD DE SERVICIO RMA007
    createRMA007(rma007: Solicitud_ServicioModel): Observable<any> {
        let json = JSON.stringify(rma007);
        let params = 'json=' + json;
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Authorization': this.userService.getToken(),
            'Accept': 'application/json',
            //'Access-Control-Allow-Origin': '*',
            //'Access-Control-Allow-Methods': 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
            //'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token',
        });

        return this.http.post(`${this.url}/solicitudservicio/`, params, {
            headers: headers1,
        });
    }
    updateRMA007(rma007: Solicitud_ServicioModel, id): Observable<any> {
        let json = JSON.stringify(rma007);
        let params = 'json=' + json;
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Authorization': this.userService.getToken(),
            'Accept': 'application/json',
            //'Access-Control-Allow-Origin': '*',
            //'Access-Control-Allow-Methods': 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
            //'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token',
        });
        console.log(params);
        return this.http.put(`${this.url}/solicitudservicio/` + id, params, {
            headers: headers1
        });
    }
    getRMA007I(id): Observable<any> {
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Authorization': this.userService.getToken(),
            'Accept': 'application/json',

        });
        return this.http.get(`${this.url}/RMA007/${id}`, id);
    }
    getRMA007() {
        let headers = this.headers;
        return this.http
            .get(`${this.url}/solicitudservicio`, { headers })
            .toPromise()
            .then((response: any) => response);
    }
    /* getFormatoRMA007() {
        let headers = this.headers;
        return this.http
            .get(`${this.url}/RMA007`, { headers })
            .toPromise()
            .then((response: any) => response);
    } */

    borrarRMA007(id: any) {
        return this.http.delete(`${this.url}/solicitudservicio/${id}`);
    }

    //SERVICIOS DE INFORME DE SERVICIO RMA008
    createRMA008(rma008: InformeServicioModel): Observable<any> {
        let json = JSON.stringify(rma008);
        let params = 'json=' + json;
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Authorization': this.userService.getToken(),
            'Accept': 'application/json',
            //'Access-Control-Allow-Origin': '*',
            //'Access-Control-Allow-Methods': 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
            //'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token',
        });

        return this.http.post(`${this.url}/informeservicio/`, params, {
            headers: headers1,
        });
    }
    updateRMA008(rma008: InformeServicioModel, id): Observable<any> {
        let json = JSON.stringify(rma008);
        let params = 'json=' + json;
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Authorization': this.userService.getToken(),
            'Accept': 'application/json',
            //'Access-Control-Allow-Origin': '*',
            //'Access-Control-Allow-Methods': 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
            //'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token',
        });
        console.log(params);
        return this.http.put(`${this.url}/informeservicio/` + id, params, {
            headers: headers1
        });
    }
    getRMA008I(id): Observable<any> {
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Authorization': this.userService.getToken(),
            'Accept': 'application/json',

        });
        return this.http.get(`${this.url}/RMA008/${id}`, id);
    }
    getRMA008() {
        let headers = this.headers;
        return this.http
            .get(`${this.url}/informeservicio`, { headers })
            .toPromise()
            .then((response: any) => response);
    }
    /* getFormatoRMA008() {
        let headers = this.headers;
        return this.http
            .get(`${this.url}/RMA008`, { headers })
            .toPromise()
            .then((response: any) => response);
    } */

    borrarRMA008(id: any) {
        return this.http.delete(`${this.url}/informeservicio/${id}`);
    }
    getPDFRMA008I(id: string, open: boolean = true): string {
        const route = "informeservicio";
        if (open) {
            window.open(`${this.url}/${route}/${id}?download=pdf`, "_blank");
        }
        return `${this.url}/${route}/${id}?download=pdf`;
    }

    //SERVICIOS DE FUNCIONALIDAD DE EQUIPOS e INSPECCIÓN FUNCIONALIDAD
    createRMA009(funcionalidad: Func_EquiposModel): Observable<any> {
        let json = JSON.stringify(funcionalidad);
        let params = 'json=' + json;
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Authorization': this.userService.getToken(),
            'Accept': 'application/json',
            //'Access-Control-Allow-Origin': '*',
            //'Access-Control-Allow-Methods': 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
            //'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token',
        });

        return this.http.post(`${this.url}/funcionalidadequipos/`, params, {
            headers: headers1,
        });
    }
    updateRMA009(funcionalidad: Func_EquiposModel, id): Observable<any> {
        let json = JSON.stringify(funcionalidad);
        let params = 'json=' + json;
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Authorization': this.userService.getToken(),
            'Accept': 'application/json',
            //'Access-Control-Allow-Origin': '*',
            //'Access-Control-Allow-Methods': 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
            //'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token',
        });
        console.log(params);
        return this.http.put(`${this.url}/funcionalidadequipos/` + id, params, {
            headers: headers1
        });
    }
    getRMA009I(id): Observable<any> {
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Authorization': this.userService.getToken(),
            'Accept': 'application/json',

        });
        return this.http.get(`${this.url}/RMA009/${id}`, id);
    }
    getRMA009() {
        let headers = this.headers;
        return this.http
            .get(`${this.url}/funcionalidadequipos`, { headers })
            .toPromise()
            .then((response: any) => response);
    }
    //SERVICIOS DE FORMATO DE INSPECCION FUNCIONALIDAD EQUIPOS
    /* getFormatoRMA009() {
        let headers = this.headers;
        return this.http
            .get(`${this.url}/RMA009`, { headers })
            .toPromise()
            .then((response: any) => response);
    } */

    borrarRMA009(id: any) {
        return this.http.delete(`${this.url}/funcionalidadequipos/${id}`);
    }
    getPDFRMA009I(id: string, open: boolean = true): string {
        const route = "funcionalidadequipos";
        if (open) {
            window.open(`${this.url}/${route}/${id}?download=pdf`, "_blank");
        }
        return `${this.url}/${route}/${id}?download=pdf`;
    }
    //SERVICIOS DE MATRIZ DE SOLICITUDES RMA010
    createRMA010(rma010: Matriz_SolicitudesModel): Observable<any> {
        let json = JSON.stringify(rma010);
        let params = 'json=' + json;
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Authorization': this.userService.getToken(),
            'Accept': 'application/json',
            //'Access-Control-Allow-Origin': '*',
            //'Access-Control-Allow-Methods': 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
            //'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token',
        });

        return this.http.post(`${this.url}/matrizsolicitudes/`, params, {
            headers: headers1,
        });
    }
    updateRMA010(rma010: Matriz_SolicitudesModel, id): Observable<any> {
        let json = JSON.stringify(rma010);
        let params = 'json=' + json;
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Authorization': this.userService.getToken(),
            'Accept': 'application/json',
            //'Access-Control-Allow-Origin': '*',
            //'Access-Control-Allow-Methods': 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
            //'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token',
        });
        console.log(params);
        return this.http.put(`${this.url}/matrizsolicitudes/` + id, params, {
            headers: headers1
        });
    }
    getRMA010I(id): Observable<any> {
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Authorization': this.userService.getToken(),
            'Accept': 'application/json',

        });
        return this.http.get(`${this.url}/RMA010/${id}`, id);
    }
    getRMA010() {
        let headers = this.headers;
        return this.http
            .get(`${this.url}/matrizsolicitudes`, { headers })
            .toPromise()
            .then((response: any) => response);
    }
    /* getFormatoRMA010() {
        let headers = this.headers;
        return this.http
            .get(`${this.url}/RMA010`, { headers })
            .toPromise()
            .then((response: any) => response);
    } */

    borrarRMA010(id: any) {
        return this.http.delete(`${this.url}/matrizsolicitudes/${id}`);
    }
    getPDFRMA010I(id: string, open: boolean = true): string {
        const route = "matrizsolicitudes";
        if (open) {
            window.open(`${this.url}/${route}/${id}?download=pdf`, "_blank");
        }
        return `${this.url}/${route}/${id}?download=pdf`;
    }
    //SERVICIOS DE GUIA RAPIDA PARA LOS EQUIPOS RMA002
    createRMA002(rma002: RMA002Model): Observable<any> {
        let json = JSON.stringify(rma002);
        let params = 'json=' + json;
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Authorization': this.userService.getToken(),
            'Accept': 'application/json',
            //'Access-Control-Allow-Origin': '*',
            //'Access-Control-Allow-Methods': 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
            //'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token',
        });

        return this.http.post(`${this.url}/guiarapida/`, params, {
            headers: headers1,
        });
    }
    updateRMA002(rma002: RMA002Model, id): Observable<any> {
        let json = JSON.stringify(rma002);
        let params = 'json=' + json;
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Authorization': this.userService.getToken(),
            'Accept': 'application/json',
            //'Access-Control-Allow-Origin': '*',
            //'Access-Control-Allow-Methods': 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
            //'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token',
        });
        console.log(params);
        return this.http.put(`${this.url}/guiarapida/` + id, params, {
            headers: headers1
        });
    }
    getRMA002I(id): Observable<any> {
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Authorization': this.userService.getToken(),
            'Accept': 'application/json',

        });
        return this.http.get(`${this.url}/RMA002/${id}`, id);
    }
    getPDFRMA002I(id: string): Observable<any> {
      let headers1 = new HttpHeaders({
          'Content-Type': 'application/x-www-form-urlencoded',
          'Authorization': this.userService.getToken(),
          'Accept': 'application/json',


        });
        window.open(`${this.url}/guiarapida/${id}?download=pdf`, "_blank");
        return this.http.get(`${this.url}/guiarapida/${id}?download=pdf`);
    }

    getRMA002() {
        let headers = this.headers;
        return this.http
            .get(`${this.url}/guiarapida`, { headers })
            .toPromise()
            .then((response: any) => response);
    }

    borrarRMA002(id: any) {
        return this.http.delete(`${this.url}/guiarapida/${id}`);
    }


}
