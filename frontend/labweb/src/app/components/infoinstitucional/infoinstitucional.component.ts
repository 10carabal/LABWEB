import Swal from 'sweetalert2/dist/sweetalert2.js';
import { Info_InstitucionalModel } from './../../models/info_institucional';
import { EquiposService } from './../../providers/equipos.service';
import { Component, OnInit } from '@angular/core';
import { EquiposModel } from 'src/app/models/equipos';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-infoinstitucional',
  templateUrl: './infoinstitucional.component.html',
  styleUrls: ['./infoinstitucional.component.css'],
})
export class InfoinstitucionalComponent implements OnInit {
  equipos: EquiposModel;
  newInfo = new Info_InstitucionalModel();
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
      this._equiposService.getInfoI(id).subscribe((resp: any) => {
        //this.newInfo = resp;
        this.newInfo.id = id;
        console.log(this.newInfo.id);
      });
    }
  }

  guardarInfo(form) {
    if (form.invalid) {
      console.log('Formulario no valído.');
      return;
    }
    Swal.fire({
      title: 'Espere',
      text: 'Guardando Información',
      type: 'Info',
      allowOutsideClick: false,
    });
    Swal.showLoading();

    /* if (this.newInfo.id !== '0') {
      this._equiposService.actualizarInfo(this.newInfo).subscribe((resp) => {
        console.log(resp);
      });
    } else {
     */ this._equiposService
      .createInfo(this.newInfo)
      .subscribe(
        (response) => {
          Swal.fire({
            title: 'El correo de Laboratorio: ' + this.newInfo.Email_Laboratorio,
            text: 'Se Actualizó correctamente.',
            type: 'success',
          });
          this.router.navigate(['/newinfo']);
          //console.log(this.newInfo);

          if (response.status == 'success') {
            this.newInfo = response;
            this.status = 'success';
          } else {
            this.status = 'error';
          }
        },
        (error) => {
          console.log(error);
          this.status = 'error';
          console.log(this.newInfo);
        }
      );
  }
}
