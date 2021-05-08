import { Component, OnInit } from '@angular/core';
import { EquiposService } from './../../providers/equipos.service';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { Router } from '@angular/router';
import { Hist_Solicitudes_EquiposModel } from 'src/app/models/hist_solicitudes_equipos';

@Component({
  selector: 'app-newhistorico',
  templateUrl: './newhistorico.component.html',
  styleUrls: ['./newhistorico.component.css']
})
export class NewhistoricoComponent implements OnInit {

  cargando = false;

  historico: Hist_Solicitudes_EquiposModel[] = [];

  constructor(private _equiposService: EquiposService, private router: Router) { }



  ngOnInit(): void {
    this.cargando = true;
    this._equiposService.getHistorico()
      .then((data: any) => {
        console.log(data);
        this.historico = data;
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
        this._equiposService.borrarHistorico(info.id).subscribe(resp => {


          Swal.fire({
            title: 'Equipo Borrado',
            text: 'Se actualizó correctamente.',
            type: 'success'

          });
          this._equiposService.getHistorico()
            .then((data: any) => {
              console.log(data);
              this.historico = data;
              this.cargando = false;
            },
              (errorServicio) => {

                console.log(errorServicio.statusText);
                console.log(errorServicio.message);

              });
        });
        this.router.navigate(['/newhistorico']);

      }

    });
  }

}

