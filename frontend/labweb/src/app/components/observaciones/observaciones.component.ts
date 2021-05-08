import { Component, OnInit } from '@angular/core';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { EquiposService } from './../../providers/equipos.service';
import { EquiposModel } from 'src/app/models/equipos';
import { ActivatedRoute, Router } from '@angular/router';
import { ProveedoresService } from 'src/app/providers/proveedores.service';
import { Observaciones_AdicionalesModel } from 'src/app/models/observaciones_adicionales';
@Component({
  selector: 'app-observaciones',
  templateUrl: './observaciones.component.html',
  styleUrls: ['./observaciones.component.css']
})
export class ObservacionesComponent implements OnInit {

  equipos: EquiposModel;
  newobservaciones = new Observaciones_AdicionalesModel();
  status: string;
  constructor(
    private _equiposService: EquiposService,
    private _proveedoresService: ProveedoresService,
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
      this._proveedoresService.getObservacionesI(id).subscribe((resp: any) => {
        //this.newInfo = resp;
        this.newobservaciones.id = id;
        console.log(this.newobservaciones.id);
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
     */ this._proveedoresService
      .createObservaciones(this.newobservaciones)
      .subscribe(
        (response) => {
          Swal.fire({
            title:
              'Las observaciones de la Hoja de Vida #' + this.newobservaciones.NUM_HOJA_VIDA,
            text: 'Se Actualizó correctamente.',
            type: 'success',
          });
          this.router.navigate(['/newobservaciones']);
          //console.log(this.newInfo);

          if (response.status == 'success') {
            this.newobservaciones = response;
            this.status = 'success';
          } else {
            this.status = 'error';
          }
        },
        (error) => {
          console.log(error);
          this.status = 'error';
          console.log(this.newobservaciones);
        }
      );
  }
}
