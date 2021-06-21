import { PlanMantenimientoModel } from './../../models/planmantenimiento';
import { Component, OnInit } from '@angular/core';
import { FormatosService } from './../../providers/formatos.services';
import { EquiposModel } from 'src/app/models/equipos';
import { EquiposService } from 'src/app/providers/equipos.service';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { ActivatedRoute, Router } from '@angular/router';
import { Solicitud_ServicioModel } from 'src/app/models/solicitud_servicio';

@Component({
  selector: 'app-rma004',
  templateUrl: './rma004.component.html',
  styleUrls: ['./rma004.component.css']
})
export class Rma004Component implements OnInit {

  equipos: EquiposModel;
  rma004 = new PlanMantenimientoModel();
  status: string;
  cons_orden: Solicitud_ServicioModel

  constructor(private _equiposService: EquiposService, private _formatosService: FormatosService, private route: ActivatedRoute,
    private router: Router) { }

  ngOnInit(): void {
    this._equiposService.getEquipos('equipos')
      .then((data: any) => {
        console.log(data);
        this.equipos = data;
      },
        (errorServicio) => {

          console.log(errorServicio.statusText);
          console.log(errorServicio.message);

        });
    this._formatosService.getRMA007().then(
      (data: any) => {
        console.log(data);
        this.cons_orden = data;
      },
      (errorServicio) => {
        console.log(errorServicio.statusText);
        console.log(errorServicio.message);
      }
    );
    const id: any = this.route.snapshot.paramMap.get('id');
    if (id !== 'nuevo') {
      this._formatosService.getRMA004I(id).subscribe((resp: any) => {
        //this.newInfo = resp;
        this.rma004.id = id;
        //console.log(this.rma004.NUM_HOJA_VIDA);
      });
    }
  }
  generarSolicitud(form) {
    if (form.invalid) {
      console.log('Formulario no valído.');
      //return;
    }
    Swal.fire({
      title: 'Espere',
      text: 'Guardando Información',
      type: 'Info',
      allowOutsideClick: false,
    });
    Swal.showLoading();

    this._formatosService
      .createRMA004(this.rma004)
      .subscribe(
        (response) => {
          Swal.fire({
            title: this.rma004.NUM_HOJA_VIDA,
            text: 'Se Actualizó correctamente.',
            type: 'success',
          });

          this.router.navigate(['/newRMA004']);
          //console.log(this.rma004);

          if (response.status == 'success') {
            this.rma004 = response;
            this.status = 'success';
          } else {
            this.status = 'error';
          }
        },
        (error) => {
          console.log(error);
          this.status = 'error';
          console.log(this.rma004);
        }
      );
  }
}


