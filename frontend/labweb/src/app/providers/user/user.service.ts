import { SessionToken } from './SessionTokenInterface';
import { Injectable } from '@angular/core';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class UserService {
  public token: string;
  private url: string = "http://127.0.0.1:8000/api";
  constructor(private http: HttpClient) {
    this.token = "";
  }
  login(form: any) : Observable<SessionToken>{
    return this.http.post<SessionToken>(`${this.url}/tokens/create/`, form);
  }
  getToken(): string{
    return "Bearer "+(localStorage.getItem("token_user") ? localStorage.getItem("token_user") : "");
  }
  test(): Observable<any>{
    return this.http.post(`${this.url}/test/1`, {});
  }
  isLoggued(): Boolean{
    return localStorage.getItem("token_user") && localStorage.getItem("token_user").length > 0;
  }
}
