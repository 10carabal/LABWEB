import { UserService } from './user/user.service';
import { Observaciones_AdicionalesModel } from './../models/observaciones_adicionales';
import { Fabricantes_ProveedoresModel } from './../models/fabricantes_proveedores';
import { Doc_ProveedorModel } from './../models/doc_proveedor';
import { Doc_AnexosHvModel } from './../models/doc_anexoshv';
import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable()
export class ProveedoresService {


    //private url: string = 'http://labweb.usc.edu.co:8000/api';

    private url: string = "http://127.0.0.1:8000/api";
    headers = new HttpHeaders({
        'Content-Type': 'application/json',
        'Authorization': this.userService.getToken(),
        'Accept': 'application/json',
        //'Access-Control-Allow-Origin': '*',
        //'Access-Control-Allow-Methods': 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
        //'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token'
    });

    constructor(private http: HttpClient, private userService: UserService) {
        console.log(' servicio de equipos inicializado');

    }

    //SERVICIOS DE DOCUMENTOS ANEXOS HV
    createDocAnexos(anexos: Doc_AnexosHvModel): Observable<any> {
        let json = JSON.stringify(anexos);
        let params = 'json=' + json;
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Authorization': this.userService.getToken(),
            'Accept': 'application/json',
            //'Access-Control-Allow-Origin': '*',
            //'Access-Control-Allow-Methods': 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
            //'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token',
        });

        return this.http.post(`${this.url}/documentosanexoshv/`, params, {
            headers: headers1,
        });
    }
    updateDocAnexos(anexos: Doc_AnexosHvModel, id): Observable<any> {
        let json = JSON.stringify(anexos);
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
        return this.http.put(`${this.url}/documentosanexoshv/` + id, params, {
            headers: headers1
        });
    }
    getDocAnexosI(id): Observable<any> {
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Authorization': this.userService.getToken(),
            'Accept': 'application/json',

        });
        return this.http.get(`${this.url}/documentosanexoshv/${id}`, id);
    }
    getDocAnexos() {
        let headers = this.headers;
        return this.http
            .get(`${this.url}/documentosanexoshv`, { headers })
            .toPromise()
            .then((response: any) => response);
    }

    borrarDocAnexos(id: any) {
        return this.http.delete(`${this.url}/documentosanexoshv/${id}`);
    }

    //SERVICIOS DE DOCUMENTACIÓN PROVEEDOR ANEXOS HV
    createDocProveedor(proveedor: Doc_ProveedorModel): Observable<any> {
        let json = JSON.stringify(proveedor);
        let params = 'json=' + json;
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Authorization': this.userService.getToken(),
            'Accept': 'application/json',
            //'Access-Control-Allow-Origin': '*',
            //'Access-Control-Allow-Methods': 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
            //'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token',
        });

        return this.http.post(`${this.url}/documentosproveedor/`, params, {
            headers: headers1,
        });
    }
    updateDocProveedor(proveedor: Doc_ProveedorModel, id): Observable<any> {
        let json = JSON.stringify(proveedor);
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
        return this.http.put(`${this.url}/documentosproveedor/` + id, params, {
            headers: headers1
        });
    }
    getDocProveedorI(id): Observable<any> {
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Authorization': this.userService.getToken(),
            'Accept': 'application/json',

        });
        return this.http.get(`${this.url}/documentosproveedor/${id}`, id);
    }
    getDocProveedor() {
        let headers = this.headers;
        return this.http
            .get(`${this.url}/documentosproveedor`, { headers })
            .toPromise()
            .then((response: any) => response);
    }

    borrarDocProveedor(id: any) {
        return this.http.delete(`${this.url}/documentosproveedor/${id}`);
    }

    //SERVICIOS DE FABRICANTES Y PROVEEDORES
    createFabricantes(fabricantes: Fabricantes_ProveedoresModel): Observable<any> {
        let json = JSON.stringify(fabricantes);
        let params = 'json=' + json;
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Authorization': this.userService.getToken(),
            'Accept': 'application/json',
            //'Access-Control-Allow-Origin': '*',
            //'Access-Control-Allow-Methods': 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
            //'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token',
        });

        return this.http.post(`${this.url}/fabricantesyproveedores/`, params, {
            headers: headers1,
        });
    }
    updateFabricantes(fabricantes: Fabricantes_ProveedoresModel, id): Observable<any> {
        let json = JSON.stringify(fabricantes);
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
        return this.http.put(`${this.url}/fabricantesyproveedores/` + id, params, {
            headers: headers1
        });
    }

    getFabricantesI(id): Observable<any> {
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Authorization': this.userService.getToken(),
            'Accept': 'application/json',

        });
        return this.http.get(`${this.url}/fabricantesyproveedores/${id}`, id);
    }
    getFabricantes() {
        let headers = this.headers;
        return this.http
            .get(`${this.url}/fabricantesyproveedores`, { headers })
            .toPromise()
            .then((response: any) => response);
    }

    borrarFabricantes(id: any) {
        return this.http.delete(`${this.url}/fabricantesyproveedores/${id}`);
    }

    //SERVICIOS DE OBSERVACIONES ADICIONALES
    createObservaciones(observaciones: Observaciones_AdicionalesModel): Observable<any> {
        let json = JSON.stringify(observaciones);
        let params = 'json=' + json;
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Authorization': this.userService.getToken(),
            'Accept': 'application/json',
            //'Access-Control-Allow-Origin': '*',
            //'Access-Control-Allow-Methods': 'GET, POST, PATCH, PUT, DELETE, OPTIONS',
            //'Access-Control-Allow-Headers': 'Origin, Content-Type, X-Auth-Token',
        });

        return this.http.post(`${this.url}/observaciones/`, params, {
            headers: headers1,
        });
    }
    updateObservaciones(observaciones: Observaciones_AdicionalesModel, id): Observable<any> {
        let json = JSON.stringify(observaciones);
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
        return this.http.put(`${this.url}/observaciones/` + id, params, {
            headers: headers1
        });
    }
    getObservacionesI(id): Observable<any> {
        let headers1 = new HttpHeaders({
            'Content-Type': 'application/x-www-form-urlencoded',
            'Authorization': this.userService.getToken(),
            'Accept': 'application/json',

        });
        return this.http.get(`${this.url}/observaciones/${id}`, id);
    }
    getObservaciones() {
        let headers = this.headers;
        return this.http
            .get(`${this.url}/observaciones`, { headers })
            .toPromise()
            .then((response: any) => response);
    }

    borrarObservaciones(id: any) {
        return this.http.delete(`${this.url}/observaciones/${id}`);
    }
}
