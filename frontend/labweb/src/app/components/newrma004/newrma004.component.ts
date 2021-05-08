import { PlanMantenimientoModel } from './../../models/planmantenimiento';
import { Component, OnInit } from '@angular/core';
import { FormatosService } from './../../providers/formatos.services';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { Router } from '@angular/router';

@Component({
  selector: 'app-newrma004',
  templateUrl: './newrma004.component.html',
  styleUrls: ['./newrma004.component.css']
})
export class Newrma004Component implements OnInit {

  cargando = false;

  rma004: PlanMantenimientoModel[] = [];

  constructor(private _formatosService: FormatosService, private router: Router) { }



  ngOnInit(): void {
    this.cargando = true;
    //this.getInfo();
    this._formatosService.getRMA004()
      .then((data: any) => {
        console.log(data);
        this.rma004 = data;
        this.cargando = false;
      },
        (errorServicio) => {

          console.log(errorServicio.statusText);
          console.log(errorServicio.message);

        });
    this.cargando = false;
  }


  borrarInfo(rma004: PlanMantenimientoModel) {

    Swal.fire({
      title: '¿Está seguro?',
      text: `Está seguro que desea borrar la información de ${rma004.NUM_HOJA_VIDA}`,
      type: 'question',
      showConfirmButton: true,
      showCancelButton: true
    }).then(resp => {

      if (resp.value) {
        this.cargando = true;
        this._formatosService.borrarRMA004(rma004.NUM_HOJA_VIDA).subscribe(resp => {


          Swal.fire({
            title: 'Equipo Borrado',
            text: 'Se actualizó correctamente.',
            type: 'success'

          });
          this._formatosService.getRMA004()
            .then((data: any) => {
              console.log(data);
              this.rma004 = data;
              this.cargando = false;
            },
              (errorServicio) => {

                console.log(errorServicio.statusText);
                console.log(errorServicio.message);

              });
        });
        this.router.navigate(['/newRMA004']);

      }

    });
  }

}

