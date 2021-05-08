import { Component, OnInit } from '@angular/core';
import { Router } from "@angular/router";
import { EquiposModel } from 'src/app/models/equipos';
@Component({
  selector: 'app-nav-bar',
  templateUrl: './nav-bar.component.html',
  styleUrls: ['./nav-bar.component.css']
})
export class NavBarComponent implements OnInit {

  constructor(private router: Router) { }
  equipos: EquiposModel[] = [];
  ngOnInit(): void {
  }

  buscarEquipo(buscarequipo: string) {
    //console.log(buscarequipo);
    this.router.navigate(['/buscar', buscarequipo]);
  }

}