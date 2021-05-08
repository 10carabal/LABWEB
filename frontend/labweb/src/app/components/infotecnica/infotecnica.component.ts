import { Info_Tecnica_EquipoModel } from './../../models/info_tecnica_equipo';
import { Component, OnInit } from '@angular/core';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { EquiposService } from './../../providers/equipos.service';
import { EquiposModel } from 'src/app/models/equipos';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-infotecnica',
  templateUrl: './infotecnica.component.html',
  styleUrls: ['./infotecnica.component.css']
})
export class InfotecnicaComponent implements OnInit {

  equipos: EquiposModel;
  newtecnica = new Info_Tecnica_EquipoModel();
  status: string;
  constructor(
    private _equiposService: EquiposService,
    private route: ActivatedRoute,
    private router: Router
  ) { }

  ngOnInit(): void {
    this._equiposService.getEquipos('equipos').then(
      (data: any) => {
        // console.log(data);
        this.equipos = data;
      },
      (errorServicio) => {
        console.log(errorServicio.statusText);
        console.log(errorServicio.message);
      }
    );
    const id: any = this.route.snapshot.paramMap.get('id');
    if (id !== 'nuevo') {
      this._equiposService.getInfoTecnicaI(id).subscribe((resp: any) => {
        //this.newInfo = resp;
        this.newtecnica.id = id;
        console.log(this.newtecnica.id);
      });
    }
  }

  guardarInfo(form) {
    if (form.invalid) {
      console.log('Formulario no valído.');
      return;
    }
    /* Swal.fire({
      title: 'Espere',
      text: 'Guardando Información',
      type: 'Info',
      allowOutsideClick: false,
    });
    Swal.showLoading(); */

    this._equiposService
      .createInfoTecnica(this.newtecnica)
      .subscribe(
        (response) => {
          Swal.fire({
            title: 'Información técnica del equipo: ' + this.newtecnica.NUM_HOJA_VIDA,
            text: 'Se Actualizó correctamente.',
            type: 'success',
          });
          this.router.navigate(['/newinfotecnica']);
          //console.log(this.newtecnica);

          if (response.status == 'success') {
            this.newtecnica = response;
            this.status = 'success';
          } else {
            this.status = 'error';
          }
        },
        (error) => {
          console.log(error);
          this.status = 'error';
          console.log(this.newtecnica);
        }
      );
  }
}
