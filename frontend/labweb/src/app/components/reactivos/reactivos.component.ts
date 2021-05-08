import { Reactivos_AccesoriosModel } from './../../models/reactivos_accesorios';
import { Component, OnInit } from '@angular/core';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { EquiposService } from './../../providers/equipos.service';
import { EquiposModel } from 'src/app/models/equipos';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-reactivos',
  templateUrl: './reactivos.component.html',
  styleUrls: ['./reactivos.component.css']
})
export class ReactivosComponent implements OnInit {

  equipos: EquiposModel;
  newReactivos = new Reactivos_AccesoriosModel();
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
      this._equiposService.getReactivosAccesoriosI(id).subscribe((resp: any) => {
        //this.newInfo = resp;
        this.newReactivos.id = id;
        console.log(this.newReactivos.id);
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

    /* if (this.newReactivos.id !== '0') {
      this._equiposService.actualizarInfo(this.newReactivos).subscribe((resp) => {
        console.log(resp);
      });
    } else {
     */ this._equiposService
      .createReactivosAccesorios(this.newReactivos)
      .subscribe(
        (response) => {
          Swal.fire({
            title: 'La hoja de Vida del equipo: ' + this.newReactivos.NUM_HOJA_VIDA,
            text: 'Se Actualizó correctamente.',
            type: 'success',
          });
          this.router.navigate(['/newreactivos']);
          //console.log(this.newReactivos);

          if (response.status == 'success') {
            this.newReactivos = response;
            this.status = 'success';
          } else {
            this.status = 'error';
          }
        },
        (error) => {
          console.log(error);
          this.status = 'error';
          console.log(this.newReactivos);
        }
      );
  }
}
