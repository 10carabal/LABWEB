import { Component, OnInit } from '@angular/core';
import { Equipos } from '../../interfaces/equipos.interfaces';
import { EquiposService } from "../../providers/equipos.service";
import { CommonModule } from '@angular/common';

@Component({
  selector: 'app-equipo',
  templateUrl: './equipo.component.html',
  styleUrls: ['./equipo.component.css']
})
export class EquipoComponent implements OnInit {


  equipos: Equipos[] = [];
  image: any;
  numhojavida: any;
  constructor(private _equiposService: EquiposService,
  ) { }

  ngOnInit(): void {
    this._equiposService.getEquipos('equipos')
      .then((data: any) => {
        console.log(data);
        this.equipos = data;
      },
        (errorServicio) => {

          console.log(errorServicio.statusText);
          console.log(errorServicio.message);

        });

    /* this.image = this._equiposService.getImagenEquipo().then((data: any) => {
      console.log(data);
      //this.equipos = data;
    },
      (errorServicio) => {

        console.log(errorServicio.statusText);
        console.log(errorServicio.message);

      }); */
  }

  ActualizarEquipo(numhojavida) {
    /* this._equiposService.updateEquipos('equipos/', 'id').then((data: any) => {
      console.log(data);
      //this.equipos = data;
    },
      (errorServicio) => {

        console.log(errorServicio.statusText);
        console.log(errorServicio.message);

      }); */
  }

  /* imageEquipo() {
    this._equiposService.ObternerImagenEquipo('1603930301d11.jpg').then((data: any) => {
      console.log(data);
      //this.equipos = data;
    },
      (errorServicio) => {

        console.log(errorServicio.statusText);
        console.log(errorServicio.message);

      });
  } */


}
