import { Adq_EquiposModel } from 'src/app/models/adq_equipos';
import { Component, OnInit } from '@angular/core';
import { EquiposService } from './../../providers/equipos.service';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { Router } from '@angular/router';

@Component({
  selector: 'app-newadquisicion',
  templateUrl: './newadquisicion.component.html',
  styleUrls: ['./newadquisicion.component.css']
})
export class NewadquisicionComponent implements OnInit {

  num: any;
  cargando = false;

  adquisicion: Adq_EquiposModel[] = [];

  constructor(private _equiposService: EquiposService, private router: Router) { }



  ngOnInit(): void {
    this.cargando = true;
    this._equiposService.getCompraEquipos()
      .then((data: any) => {
        console.log(data);
        this.adquisicion = data;
        this.cargando = false;
      },
        (errorServicio) => {

          console.log(errorServicio.statusText);
          console.log(errorServicio.message);

        });
    this.cargando = false;
  }


  borrarInfo(info: Adq_EquiposModel) {

    Swal.fire({
      title: '¿Está seguro?',
      text: `Está seguro que desea borrar la información asociada a ${info.ORDEN_DE_COMPRA}`,
      type: 'question',
      showConfirmButton: true,
      showCancelButton: true
    }).then(resp => {

      if (resp.value) {
        this.cargando = true;
        this._equiposService.borrarCompraEquipos(info.id).subscribe(resp => {


          Swal.fire({
            title: 'Equipo Borrado',
            text: 'Se actualizó correctamente.',
            type: 'success'

          });
          this._equiposService.getCompraEquipos()
            .then((data: any) => {
              console.log(data);
              this.adquisicion = data;
              this.cargando = false;
            },
              (errorServicio) => {

                console.log(errorServicio.statusText);
                console.log(errorServicio.message);

              });
        });
        this.router.navigate(['/newadquisicion']);

      }

    });
  }

}

