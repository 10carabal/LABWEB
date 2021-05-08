import { Info_Tecnica_EquipoModel } from './../../models/info_tecnica_equipo';
import { Component, OnInit } from '@angular/core';
import { EquiposService } from './../../providers/equipos.service';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { Router } from '@angular/router';

@Component({
  selector: 'app-newinfotecnica',
  templateUrl: './newinfotecnica.component.html',
  styleUrls: ['./newinfotecnica.component.css']
})
export class NewinfotecnicaComponent implements OnInit {

  num: any;
  cargando = false;

  tecnica: Info_Tecnica_EquipoModel[] = [];

  constructor(private _equiposService: EquiposService, private router: Router) { }



  ngOnInit(): void {
    this.cargando = true;
    //this.getInfo();
    this._equiposService.getInfoTecnica()
      .then((data: any) => {
        console.log(data);
        this.tecnica = data;
        this.cargando = false;
      },
        (errorServicio) => {

          console.log(errorServicio.statusText);
          console.log(errorServicio.message);

        });
    this.cargando = false;
  }


  borrarInfo(info: Info_Tecnica_EquipoModel) {

    Swal.fire({
      title: '¿Está seguro?',
      text: `Está seguro que desea borrar la información asociada a la Hoja de vida #${info.NUM_HOJA_VIDA}`,
      type: 'question',
      showConfirmButton: true,
      showCancelButton: true
    }).then(resp => {

      if (resp.value) {
        this.cargando = true;
        this._equiposService.borrarInfoTecnica(info.id).subscribe(resp => {


          Swal.fire({
            title: 'Equipo Borrado',
            text: 'Se actualizó correctamente.',
            type: 'success'

          });
          this._equiposService.getInfoTecnica()
            .then((data: any) => {
              console.log(data);
              this.tecnica = data;
              this.cargando = false;
            },
              (errorServicio) => {

                console.log(errorServicio.statusText);
                console.log(errorServicio.message);

              });
        });
        this.router.navigate(['/newinfotecnica']);

      }

    });
  }

}

