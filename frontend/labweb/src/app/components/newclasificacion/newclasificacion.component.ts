import { Clasifi_EquipoModel } from './../../models/clasifi_equipo';
import { Component, OnInit } from '@angular/core';
import { EquiposService } from './../../providers/equipos.service';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { Router } from '@angular/router';

@Component({
  selector: 'app-newclasificacion',
  templateUrl: './newclasificacion.component.html',
  styleUrls: ['./newclasificacion.component.css']
})
export class NewclasificacionComponent implements OnInit {

  num: any;
  cargando = false;

  clasificacion: Clasifi_EquipoModel[] = [];

  constructor(private _equiposService: EquiposService, private router: Router) { }



  ngOnInit(): void {
    this.cargando = true;
    //this.getInfo();
    this._equiposService.getClasificacionEquipos()
      .then((data: any) => {
        console.log(data);
        this.clasificacion = data;
        this.cargando = false;
      },
        (errorServicio) => {

          console.log(errorServicio.statusText);
          console.log(errorServicio.message);

        });
    this.cargando = false;
  }


  borrarInfo(info: Clasifi_EquipoModel) {

    Swal.fire({
      title: '¿Está seguro?',
      text: `Está seguro que desea borrar la clasificación asociada a la Hoja de vida #${info.NUM_HOJA_VIDA}`,
      type: 'question',
      showConfirmButton: true,
      showCancelButton: true
    }).then(resp => {

      if (resp.value) {
        this.cargando = true;
        this._equiposService.borrarClasificacionEquipos(info.id).subscribe(resp => {


          Swal.fire({
            title: 'Equipo Borrado',
            text: 'Se actualizó correctamente.',
            type: 'success'

          });
          this._equiposService.getClasificacionEquipos()
            .then((data: any) => {
              console.log(data);
              this.clasificacion = data;
              this.cargando = false;
            },
              (errorServicio) => {

                console.log(errorServicio.statusText);
                console.log(errorServicio.message);

              });
        });
        this.router.navigate(['/newclasificacion']);

      }

    });
  }

}

