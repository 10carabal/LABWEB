import { FormatosService } from './../../providers/formatos.services';
import { Solicitud_ServicioModel } from './../../models/solicitud_servicio';
import { Component, OnInit } from '@angular/core';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { Router } from '@angular/router';

@Component({
  selector: 'app-newsolicitudservicio',
  templateUrl: './newsolicitudservicio.component.html',
  styleUrls: ['./newsolicitudservicio.component.css']
})
export class NewsolicitudservicioComponent implements OnInit {

  num: any;
  cargando = false;

  solicitudes: Solicitud_ServicioModel[] = [];

  constructor(private _formatosService: FormatosService, private router: Router) { }



  ngOnInit(): void {
    this.cargando = true;
    //this.getInfo();
    this._formatosService.getRMA007()
      .then((data: any) => {
        console.log(data);
        this.solicitudes = data;
        this.cargando = false;
      },
        (errorServicio) => {

          console.log(errorServicio.statusText);
          console.log(errorServicio.message);

        });
    this.cargando = false;
  }


  borrarInfo(solicitudes: Solicitud_ServicioModel) {

    Swal.fire({
      title: '¿Está seguro?',
      text: `Está seguro que desea borrar a ${solicitudes.NUM_HOJA_VIDA}`,
      type: 'question',
      showConfirmButton: true,
      showCancelButton: true
    }).then(resp => {

      if (resp.value) {
        this.cargando = true;
        this._formatosService.borrarRMA007(solicitudes.NUM_HOJA_VIDA).subscribe(resp => {


          Swal.fire({
            title: 'Equipo Borrado',
            text: 'Se actualizó correctamente.',
            type: 'success'

          });
          this._formatosService.getRMA007()
            .then((data: any) => {
              console.log(data);
              this.solicitudes = data;
              this.cargando = false;
            },
              (errorServicio) => {

                console.log(errorServicio.statusText);
                console.log(errorServicio.message);

              });
        });
        this.router.navigate(['/newRMA007']);

      }

    });
  }

}

