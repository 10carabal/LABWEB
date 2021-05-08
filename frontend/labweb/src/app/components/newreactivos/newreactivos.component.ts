import { Reactivos_AccesoriosModel } from './../../models/reactivos_accesorios';
import { Component, OnInit } from '@angular/core';
import { Clasifi_EquipoModel } from './../../models/clasifi_equipo';
import { EquiposService } from './../../providers/equipos.service';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { Router } from '@angular/router';

@Component({
  selector: 'app-newreactivos',
  templateUrl: './newreactivos.component.html',
  styleUrls: ['./newreactivos.component.css']
})
export class NewreactivosComponent implements OnInit {

  num: any;
  cargando = false;

  reactivos: Reactivos_AccesoriosModel[] = [];

  constructor(private _equiposService: EquiposService, private router: Router) { }



  ngOnInit(): void {
    this.cargando = true;
    //this.getInfo();
    this._equiposService.getReactivosAccesorios()
      .then((data: any) => {
        console.log(data);
        this.reactivos = data;
        this.cargando = false;
      },
        (errorServicio) => {

          console.log(errorServicio.statusText);
          console.log(errorServicio.message);

        });
    this.cargando = false;
  }


  borrarInfo(info: Reactivos_AccesoriosModel) {

    Swal.fire({
      title: '¿Está seguro?',
      text: `Está seguro que desea borrar la clasificación asociada a la Hoja de vida #${info.NUM_HOJA_VIDA}`,
      type: 'question',
      showConfirmButton: true,
      showCancelButton: true
    }).then(resp => {

      if (resp.value) {
        this.cargando = true;
        this._equiposService.borrarReactivosAccesorios(info.id).subscribe(resp => {


          Swal.fire({
            title: 'Equipo Borrado',
            text: 'Se actualizó correctamente.',
            type: 'success'

          });
          this._equiposService.getReactivosAccesorios()
            .then((data: any) => {
              console.log(data);
              this.reactivos = data;
              this.cargando = false;
            },
              (errorServicio) => {

                console.log(errorServicio.statusText);
                console.log(errorServicio.message);

              });
        });
        this.router.navigate(['/newreactivos']);

      }

    });
  }

}

