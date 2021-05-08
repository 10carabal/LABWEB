import { RMA002Model } from './../../models/rma002';
import { Component, OnInit } from '@angular/core';
import { FormatosService } from './../../providers/formatos.services';
import { EquiposModel } from 'src/app/models/equipos';
import { EquiposService } from 'src/app/providers/equipos.service';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-rma002',
  templateUrl: './rma002.component.html',
  styleUrls: ['./rma002.component.css']
})
export class Rma002Component implements OnInit {

  equipos: EquiposModel;
  rma002 = new RMA002Model();
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
      this._formatosService.getRMA002I(id).subscribe((resp: any) => {
        //this.newInfo = resp;
        this.rma002.id = id;
        //console.log(this.rma002.NUM_HOJA_VIDA);
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
      .createRMA002(this.rma002)
      .subscribe(
        (response) => {
          Swal.fire({
            title: this.rma002.NUM_HOJA_VIDA,
            text: 'Se Actualizó correctamente.',
            type: 'success',
          });

          this.router.navigate(['/newRMA002']);
          //console.log(this.rma002);

          if (response.status == 'success') {
            this.rma002 = response;
            this.status = 'success';
          } else {
            this.status = 'error';
          }
        },
        (error) => {
          console.log(error);
          this.status = 'error';
          console.log(this.rma002);
        }
      );
  }
}


