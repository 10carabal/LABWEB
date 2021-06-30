import { UserService } from './../providers/user/user.service';
import { Injectable } from '@angular/core';
import { CanActivate, ActivatedRouteSnapshot, RouterStateSnapshot, UrlTree } from '@angular/router';
import { Observable } from 'rxjs';
import { Router } from '@angular/router';

@Injectable({
  providedIn: 'root'
})
export class CanActivateViaAuthGuardGuard implements CanActivate {
  constructor(
    private userService: UserService
    , private router: Router
  ){}
  canActivate(
    route: ActivatedRouteSnapshot,
    state: RouterStateSnapshot): Observable<boolean | UrlTree> | Promise<boolean | UrlTree> | boolean | UrlTree {
      if(!this.userService.isLoggued()){
        console.log('No estás logueado');
        this.router.navigate(['/login']);
        return false;

      }
    return true;

  }

}
