import { FormatosService } from './../../providers/formatos.services';
import { Solicitud_ServicioModel } from './../../models/solicitud_servicio';
import { Component, OnInit } from '@angular/core';
import { EquiposModel } from 'src/app/models/equipos';
import { EquiposService } from 'src/app/providers/equipos.service';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { ActivatedRoute, Router } from '@angular/router';
import { NgForm } from '@angular/forms';

@Component({
  selector: 'app-solicitudsevicio',
  templateUrl: './solicitudsevicio.component.html',
  styleUrls: ['./solicitudsevicio.component.css']
})
export class SolicitudsevicioComponent implements OnInit {
  equipos: EquiposModel;
  rma007 = new Solicitud_ServicioModel();
  status: string;

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
    const id: any = this.route.snapshot.paramMap.get('id');
    if (id !== 'nuevo') {
      this._formatosService.getRMA007I(id).subscribe((resp: any) => {
        //this.newInfo = resp;
        this.rma007.NUM_HOJA_VIDA = id;
        console.log(this.rma007.NUM_HOJA_VIDA);
      });
    }
  }
  generarSolicitud(form) {
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

    this._formatosService
      .createRMA007(this.rma007)
      .subscribe(
        (response) => {
          Swal.fire({
            title: this.rma007.Servicio,
            text: 'Se Actualizó correctamente.',
            type: 'success',
          });

          this.router.navigate(['/newRMA007']);
          //console.log(this.rma007);

          if (response.status == 'success') {
            this.rma007 = response;
            this.status = 'success';
          } else {
            this.status = 'error';
          }
        },
        (error) => {
          console.log(error);
          this.status = 'error';
          console.log(this.rma007);
        }
      );
  }
}


