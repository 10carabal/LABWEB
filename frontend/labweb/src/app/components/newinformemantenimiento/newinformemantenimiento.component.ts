import { FormatosService } from './../../providers/formatos.services';
import { InformeMantenimientoModel } from './../../models/informemantenimiento';
import { Component, OnInit } from '@angular/core';
import { EquiposService } from './../../providers/equipos.service';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { Router } from '@angular/router';
import { Hist_Solicitudes_EquiposModel } from 'src/app/models/hist_solicitudes_equipos';

@Component({
  selector: 'app-newinformemantenimiento',
  templateUrl: './newinformemantenimiento.component.html',
  styleUrls: ['./newinformemantenimiento.component.css']
})
export class NewinformemantenimientoComponent implements OnInit {

  cargando = false;

  infomantenimiento: InformeMantenimientoModel[] = [];

  constructor(private _formatosService: FormatosService, private router: Router) { }



  ngOnInit(): void {
    this.cargando = true;
    this._formatosService.getRMA006()
      .then((data: any) => {
        console.log(data);
        this.infomantenimiento = data;
        this.cargando = false;
      },
        (errorServicio) => {

          console.log(errorServicio.statusText);
          console.log(errorServicio.message);

        });
    this.cargando = false;
  }


  borrarInfo(info: Hist_Solicitudes_EquiposModel) {

    Swal.fire({
      title: '¿Está seguro?',
      text: `Está seguro que desea borrar la información asociada a ${info.NUM_HOJA_VIDA}`,
      type: 'question',
      showConfirmButton: true,
      showCancelButton: true
    }).then(resp => {

      if (resp.value) {
        this.cargando = true;
        this._formatosService.borrarRMA006(info.id).subscribe(resp => {


          Swal.fire({
            title: 'Equipo Borrado',
            text: 'Se actualizó correctamente.',
            type: 'success'

          });
          this._formatosService.getRMA006()
            .then((data: any) => {
              console.log(data);
              this.infomantenimiento = data;
              this.cargando = false;
            },
              (errorServicio) => {

                console.log(errorServicio.statusText);
                console.log(errorServicio.message);

              });
        });
        this.router.navigate(['/newRMA006']);

      }

    });
  }
  download(info: InformeMantenimientoModel){
    this._formatosService.getPDFRMA006I(""+info.NUM_HOJA_VIDA);
  }
}

