import { Router } from '@angular/router';
import { EquiposModel } from 'src/app/models/equipos';
import { EquiposService } from './../../providers/equipos.service';
import { Component, OnInit } from '@angular/core';

import Swal from 'sweetalert2/dist/sweetalert2.js';

@Component({
  selector: 'app-newequipo',
  templateUrl: './newequipo.component.html',
  styleUrls: ['./newequipo.component.css']
})
export class NewequipoComponent implements OnInit {
  cargando = false;
  equipos: EquiposModel[] = [];

  constructor(private _equiposService: EquiposService, private router: Router) { }

  ngOnInit(): void {
    this.cargando = true;
    this._equiposService.getEquipos('equipos')
      .then((data: any) => {
        console.log(data);
        this.equipos = data;
        this.cargando = false;
      },
        (errorServicio) => {

          console.log(errorServicio.statusText);
          console.log(errorServicio.message);

        });
  }

  borrarEquipo(equipo: EquiposModel, i: number) {

    Swal.fire({
      title: '¿Está seguro?',
      text: `Está seguro que desea borrar a ${equipo.Nombre}`,
      type: 'question',
      showConfirmButton: true,
      showCancelButton: true
    }).then(resp => {

      if (resp.value) {
        this.cargando = true;
        this._equiposService.borrarEquipo(equipo.NUM_HOJA_VIDA).subscribe(resp => {


          Swal.fire({
            title: 'Equipo Borrado',
            text: 'Se actualizó correctamente.',
            type: 'success'

          });
          this._equiposService.getEquipos('equipos')
            .then((data: any) => {
              console.log(data);
              this.equipos = data;
              this.cargando = false;
            },
              (errorServicio) => {

                console.log(errorServicio.statusText);
                console.log(errorServicio.message);

              });
        });
        this.router.navigate(['/newequipos']);

      }

    });
  }
}
