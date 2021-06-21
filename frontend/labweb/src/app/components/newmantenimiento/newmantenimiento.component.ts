import { Mantenimiento_EquiposModel } from './../../models/mantenimiento_equipos';
import { Component, OnInit } from '@angular/core';
import { EquiposService } from './../../providers/equipos.service';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { Router } from '@angular/router';

@Component({
  selector: 'app-newmantenimiento',
  templateUrl: './newmantenimiento.component.html',
  styleUrls: ['./newmantenimiento.component.css']
})
export class NewmantenimientoComponent implements OnInit {

  num: any;
  cargando = false;
  mantenimiento: Mantenimiento_EquiposModel[] = [];

  constructor(private _equiposService: EquiposService, private router: Router) { }



  ngOnInit(): void {
    this.cargando = true;
    //this.getInfo();
    this._equiposService.getMantenimiento()
      .then((data: any) => {
        console.log(data);
        this.mantenimiento = data;
        this.cargando = false;
      },
        (errorServicio) => {

          console.log(errorServicio.statusText);
          console.log(errorServicio.message);

        });
    this.cargando = false;
  }


  borrarInfo(info: Mantenimiento_EquiposModel) {

    Swal.fire({
      title: '¿Está seguro?',
      text: `Está seguro que desea borrar la información asociada a la Hoja de vida #${info.NUM_HOJA_VIDA}`,
      type: 'question',
      showConfirmButton: true,
      showCancelButton: true
    }).then(resp => {

      if (resp.value) {
        this.cargando = true;
        this._equiposService.borrarMantenimiento(info.id).subscribe(resp => {


          Swal.fire({
            title: 'Equipo Borrado',
            text: 'Se actualizó correctamente.',
            type: 'success'

          });
          this._equiposService.getMantenimiento()
            .then((data: any) => {
              console.log(data);
              this.mantenimiento = data;
              this.cargando = false;

            },
              (errorServicio) => {

                console.log(errorServicio.statusText);
                console.log(errorServicio.message);

              });
        });
        this.router.navigate(['/newmantenimiento']);

      }

    });
  }
  
}

