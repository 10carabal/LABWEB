import { Func_EquiposModel } from './../../models/func_equipos';
import { Component, OnInit } from '@angular/core';
import { FormatosService } from './../../providers/formatos.services';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { Router } from '@angular/router';

@Component({
  selector: 'app-newfuncionalidad',
  templateUrl: './newfuncionalidad.component.html',
  styleUrls: ['./newfuncionalidad.component.css']
})
export class NewfuncionalidadComponent implements OnInit {

  cargando = false;

  rma009: Func_EquiposModel[] = [];

  constructor(private _formatosService: FormatosService, private router: Router) { }



  ngOnInit(): void {
    this.cargando = true;
    //this.getInfo();
    this._formatosService.getRMA009()
      .then((data: any) => {
        console.log(data);
        this.rma009 = data;
        this.cargando = false;
      },
        (errorServicio) => {

          console.log(errorServicio.statusText);
          console.log(errorServicio.message);

        });
    this.cargando = false;
  }


  borrarInfo(rma009: Func_EquiposModel) {

    Swal.fire({
      title: '¿Está seguro?',
      text: `Está seguro que desea borrar la información de ${rma009.NUM_HOJA_VIDA}`,
      type: 'question',
      showConfirmButton: true,
      showCancelButton: true
    }).then(resp => {

      if (resp.value) {
        this.cargando = true;
        this._formatosService.borrarRMA009(rma009.NUM_HOJA_VIDA).subscribe(resp => {


          Swal.fire({
            title: 'Equipo Borrado',
            text: 'Se actualizó correctamente.',
            type: 'success'

          });
          this._formatosService.getRMA009()
            .then((data: any) => {
              console.log(data);
              this.rma009 = data;
              this.cargando = false;
            },
              (errorServicio) => {

                console.log(errorServicio.statusText);
                console.log(errorServicio.message);

              });
        });
        this.router.navigate(['/newRMA009']);

      }

    });
  }
  download(info: Func_EquiposModel){
    this._formatosService.getPDFRMA009I(""+info.NUM_HOJA_VIDA);
  }
}

