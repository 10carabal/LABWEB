import { Observaciones_AdicionalesModel } from './../../models/observaciones_adicionales';
import { Component, OnInit } from '@angular/core';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { Router } from '@angular/router';
import { ProveedoresService } from 'src/app/providers/proveedores.service';

@Component({
  selector: 'app-newobservaciones',
  templateUrl: './newobservaciones.component.html',
  styleUrls: ['./newobservaciones.component.css']
})
export class NewobservacionesComponent implements OnInit {

  num: any;
  cargando = false;

  observaciones: Observaciones_AdicionalesModel[] = [];

  constructor(private _provedoresService: ProveedoresService, private router: Router) { }



  ngOnInit(): void {
    this.cargando = true;
    //this.getInfo();
    this._provedoresService.getObservaciones()
      .then((data: any) => {
        console.log(data);
        this.observaciones = data;
        this.cargando = false;
      },
        (errorServicio) => {

          console.log(errorServicio.statusText);
          console.log(errorServicio.message);

        });
    this.cargando = false;
  }


  borrarInfo(info: Observaciones_AdicionalesModel) {

    Swal.fire({
      title: '¿Está seguro?',
      text: `Está seguro que desea borrar la información asociada a la Hoja de Vida #${info.NUM_HOJA_VIDA}`,
      type: 'question',
      showConfirmButton: true,
      showCancelButton: true
    }).then(resp => {

      if (resp.value) {
        this.cargando = true;
        this._provedoresService.borrarObservaciones(info.id).subscribe(resp => {


          Swal.fire({
            title: 'Equipo Borrado',
            text: 'Se actualizó correctamente.',
            type: 'success'

          });
          this._provedoresService.getObservaciones()
            .then((data: any) => {
              console.log(data);
              this.observaciones = data;
              this.cargando = false;
            },
              (errorServicio) => {

                console.log(errorServicio.statusText);
                console.log(errorServicio.message);

              });
        });
        this.router.navigate(['/newobservaciones']);

      }

    });
  }

}

