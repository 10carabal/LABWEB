import { RMA002Model } from './../../models/rma002';
import { Component, OnInit } from '@angular/core';
import { FormatosService } from './../../providers/formatos.services';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { Router } from '@angular/router';


@Component({
  selector: 'app-new-rma002',
  templateUrl: './new-rma002.component.html',
  styleUrls: ['./new-rma002.component.css']
})
export class NewRMA002Component implements OnInit {

  num: any;
  cargando = false;

  rma002: RMA002Model[] = [];

  constructor(private _formatosService: FormatosService, private router: Router) { }



  ngOnInit(): void {
    this.cargando = true;
    //this.getInfo();
    this._formatosService.getRMA002()
      .then((data: any) => {
        console.log(data);
        this.rma002 = data;
        this.cargando = false;
      },
        (errorServicio) => {

          console.log(errorServicio.statusText);
          console.log(errorServicio.message);

        });
    this.cargando = false;
  }


  borrarInfo(rma002: RMA002Model) {

    Swal.fire({
      title: '¿Está seguro?',
      text: `Está seguro que desea borrar la información de ${rma002.NUM_HOJA_VIDA}`,
      type: 'question',
      showConfirmButton: true,
      showCancelButton: true
    }).then(resp => {

      if (resp.value) {
        this.cargando = true;
        this._formatosService.borrarRMA002(rma002.NUM_HOJA_VIDA).subscribe(resp => {


          Swal.fire({
            title: 'Equipo Borrado',
            text: 'Se actualizó correctamente.',
            type: 'success'

          });
          this._formatosService.getRMA002()
            .then((data: any) => {
              console.log(data);
              this.rma002 = data;
              this.cargando = false;
            },
              (errorServicio) => {

                console.log(errorServicio.statusText);
                console.log(errorServicio.message);

              });
        });
        this.router.navigate(['/newRMA002']);

      }

    });
  }

}

