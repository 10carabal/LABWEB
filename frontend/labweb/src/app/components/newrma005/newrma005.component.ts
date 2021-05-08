import { PlanValidacionModel } from './../../models/planvalidacion';
import { Component, OnInit } from '@angular/core';
import { FormatosService } from './../../providers/formatos.services';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { Router } from '@angular/router';

@Component({
  selector: 'app-newrma005',
  templateUrl: './newrma005.component.html',
  styleUrls: ['./newrma005.component.css']
})
export class Newrma005Component implements OnInit {

  cargando = false;

  rma005: PlanValidacionModel[] = [];

  constructor(private _formatosService: FormatosService, private router: Router) { }



  ngOnInit(): void {
    this.cargando = true;
    //this.getInfo();
    this._formatosService.getRMA005()
      .then((data: any) => {
        console.log(data);
        this.rma005 = data;
        this.cargando = false;
      },
        (errorServicio) => {

          console.log(errorServicio.statusText);
          console.log(errorServicio.message);

        });
    this.cargando = false;
  }


  borrarInfo(rma005: PlanValidacionModel) {

    Swal.fire({
      title: '¿Está seguro?',
      text: `Está seguro que desea borrar la información de ${rma005.NUM_HOJA_VIDA}`,
      type: 'question',
      showConfirmButton: true,
      showCancelButton: true
    }).then(resp => {

      if (resp.value) {
        this.cargando = true;
        this._formatosService.borrarRMA005(rma005.NUM_HOJA_VIDA).subscribe(resp => {


          Swal.fire({
            title: 'Equipo Borrado',
            text: 'Se actualizó correctamente.',
            type: 'success'

          });
          this._formatosService.getRMA005()
            .then((data: any) => {
              console.log(data);
              this.rma005 = data;
              this.cargando = false;
            },
              (errorServicio) => {

                console.log(errorServicio.statusText);
                console.log(errorServicio.message);

              });
        });
        this.router.navigate(['/newRMA005']);

      }

    });
  }

}

