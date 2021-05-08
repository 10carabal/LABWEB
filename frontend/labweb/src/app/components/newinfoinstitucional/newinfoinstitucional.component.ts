import { Info_InstitucionalModel } from './../../models/info_institucional';
import { Component, OnInit } from '@angular/core';
import { EquiposService } from './../../providers/equipos.service';

import Swal from 'sweetalert2/dist/sweetalert2.js';
import { Router } from '@angular/router';

@Component({
  selector: 'app-newinfoinstitucional',
  templateUrl: './newinfoinstitucional.component.html',
  styleUrls: ['./newinfoinstitucional.component.css']
})
export class NewinfoinstitucionalComponent implements OnInit {
  num: any;
  cargando = false;

  info: Info_InstitucionalModel[] = [];

  constructor(private _equiposService: EquiposService, private router: Router) { }



  ngOnInit(): void {
    this.cargando = true;
    //this.getInfo();
    this._equiposService.getInfo()
      .then((data: any) => {
        console.log(data);
        this.info = data;
        this.cargando = false;
      },
        (errorServicio) => {

          console.log(errorServicio.statusText);
          console.log(errorServicio.message);

        });
    this.cargando = false;
  }


  borrarInfo(info: Info_InstitucionalModel) {

    Swal.fire({
      title: '¿Está seguro?',
      text: `Está seguro que desea borrar la información asociada al ${info.Email_Laboratorio}`,
      type: 'question',
      showConfirmButton: true,
      showCancelButton: true
    }).then(resp => {

      if (resp.value) {
        this.cargando = true;
        this._equiposService.borrarInfo(info.id).subscribe(resp => {


          Swal.fire({
            title: 'Equipo Borrado',
            text: 'Se actualizó correctamente.',
            type: 'success'

          });
          this._equiposService.getInfo()
            .then((data: any) => {
              console.log(data);
              this.info = data;
              this.cargando = false;
            },
              (errorServicio) => {

                console.log(errorServicio.statusText);
                console.log(errorServicio.message);

              });
        });
        this.router.navigate(['/newinfo']);

      }

    });
  }

}

