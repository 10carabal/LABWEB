import { Matriz_SolicitudesModel } from './../../models/matriz_solicitudes';
import { Component, OnInit } from '@angular/core';
import { FormatosService } from './../../providers/formatos.services';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { Router } from '@angular/router';

@Component({
  selector: 'app-newmatrizsolicitudes',
  templateUrl: './newmatrizsolicitudes.component.html',
  styleUrls: ['./newmatrizsolicitudes.component.css']
})
export class NewmatrizsolicitudesComponent implements OnInit {

  cargando = false;

  rma010: Matriz_SolicitudesModel[] = [];

  constructor(private _formatosService: FormatosService, private router: Router) { }



  ngOnInit(): void {
    this.cargando = true;
    //this.getInfo();
    this._formatosService.getRMA010()
      .then((data: any) => {
        console.log(data);
        this.rma010 = data;
        this.cargando = false;
      },
        (errorServicio) => {

          console.log(errorServicio.statusText);
          console.log(errorServicio.message);

        });
    this.cargando = false;
  }


  borrarInfo(rma010: Matriz_SolicitudesModel) {

    Swal.fire({
      title: '¿Está seguro?',
      text: `Está seguro que desea borrar la información de ${rma010.NUM_HOJA_VIDA}`,
      type: 'question',
      showConfirmButton: true,
      showCancelButton: true
    }).then(resp => {

      if (resp.value) {
        this.cargando = true;
        this._formatosService.borrarRMA010(rma010.NUM_HOJA_VIDA).subscribe(resp => {


          Swal.fire({
            title: 'Equipo Borrado',
            text: 'Se actualizó correctamente.',
            type: 'success'

          });
          this._formatosService.getRMA010()
            .then((data: any) => {
              console.log(data);
              this.rma010 = data;
              this.cargando = false;
            },
              (errorServicio) => {

                console.log(errorServicio.statusText);
                console.log(errorServicio.message);

              });
        });
        this.router.navigate(['/newRMA010']);

      }

    });
  }
  download(info: Matriz_SolicitudesModel){
    this._formatosService.getPDFRMA010I(""+info.NUM_HOJA_VIDA);
  }
}

