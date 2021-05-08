import { Mantenimiento_EquiposModel } from './../../models/mantenimiento_equipos';
import { Component, OnInit } from '@angular/core';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { EquiposService } from './../../providers/equipos.service';
import { EquiposModel } from 'src/app/models/equipos';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-mantenimiento',
  templateUrl: './mantenimiento.component.html',
  styleUrls: ['./mantenimiento.component.css']
})
export class MantenimientoComponent implements OnInit {

  equipos: EquiposModel;
  newmantenimiento = new Mantenimiento_EquiposModel();
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
      this._equiposService.getMantenimientoI(id).subscribe((resp: any) => {
        //this.newInfo = resp;
        this.newmantenimiento.id = id;
        console.log(this.newmantenimiento.id);
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

    /* if (this.newmantenimiento.id !== '0') {
      this._equiposService.actualizarInfo(this.newmantenimiento).subscribe((resp) => {
        console.log(resp);
      });
    } else {
     */ this._equiposService
      .createMantenimiento(this.newmantenimiento)
      .subscribe(
        (response) => {
          Swal.fire({
            title: 'Mantenimiento del equipo: ' + this.newmantenimiento.NUM_HOJA_VIDA,
            text: 'Se Actualizó correctamente.',
            type: 'success',
          });
          this.router.navigate(['/newmantenimiento']);
          //console.log(this.newmantenimiento);

          if (response.status == 'success') {
            this.newmantenimiento = response;
            this.status = 'success';
          } else {
            this.status = 'error';
          }
        },
        (error) => {
          console.log(error);
          this.status = 'error';
          console.log(this.newmantenimiento);
        }
      );
  }
}
