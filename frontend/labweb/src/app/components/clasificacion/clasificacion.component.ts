import { Clasifi_EquipoModel } from './../../models/clasifi_equipo';
import { Component, OnInit } from '@angular/core';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { EquiposService } from './../../providers/equipos.service';
import { EquiposModel } from 'src/app/models/equipos';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-clasificacion',
  templateUrl: './clasificacion.component.html',
  styleUrls: ['./clasificacion.component.css']
})
export class ClasificacionComponent implements OnInit {


  equipos: EquiposModel;
  newClasificacion = new Clasifi_EquipoModel();
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
      this._equiposService.getClasificacionEquiposI(id).subscribe((resp: any) => {
        //this.newInfo = resp;
        this.newClasificacion.id = id;
        console.log(this.newClasificacion.id);
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

    /* if (this.newClasificacion.id !== '0') {
      this._equiposService.actualizarInfo(this.newClasificacion).subscribe((resp) => {
        console.log(resp);
      });
    } else {
     */ this._equiposService
      .createClasificacionEquipos(this.newClasificacion)
      .subscribe(
        (response) => {
          Swal.fire({
            title: 'Clasificacíón del equipo: ' + this.newClasificacion.CLASIFICACION_DE_EQUIPO,
            text: 'Se Actualizó correctamente.',
            type: 'success',
          });
          this.router.navigate(['/newclasificacion']);
          //console.log(this.newClasificacion);

          if (response.status == 'success') {
            this.newClasificacion = response;
            this.status = 'success';
          } else {
            this.status = 'error';
          }
        },
        (error) => {
          console.log(error);
          this.status = 'error';
          console.log(this.newClasificacion);
        }
      );
  }
}
