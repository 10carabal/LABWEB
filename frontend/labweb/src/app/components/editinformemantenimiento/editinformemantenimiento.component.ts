import { FormatosService } from './../../providers/formatos.services';
import { InformeMantenimientoModel } from './../../models/informemantenimiento';
import { Component, OnInit } from '@angular/core';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-editinformemantenimiento',
  templateUrl: './editinformemantenimiento.component.html',
  styleUrls: ['./editinformemantenimiento.component.css']
})
export class EditinformemantenimientoComponent implements OnInit {

  infomantenimiento = new InformeMantenimientoModel();
  status: string;
  temp = new InformeMantenimientoModel();
  //temp1 = new InformeMantenimientoModel();

  constructor(
    private _formatosService: FormatosService,
    private route: ActivatedRoute,
    private router: Router
  ) { }

  ngOnInit(): void {
    this.mostrarInfoI();
  }

  mostrarInfoI() {
    //Sacar el id de la ruta
    this.route.params.subscribe((params) => {
      let id = params['id'];

      console.log(id);
      this.infomantenimiento.NUM_HOJA_VIDA = id;
      this.temp.NUM_HOJA_VIDA = id;
      //this.temp1.Consecutivo_Orden
    });
  }

  editarInfo(form) {
    Swal.fire({
      title: 'Espere',
      text: 'Actualizando Información',
      type: 'Info',
      allowOutsideClick: false,
    });
    Swal.showLoading();

    this._formatosService.updateRMA006(this.infomantenimiento, this.infomantenimiento.NUM_HOJA_VIDA).subscribe(
      (response) => {
        Swal.fire({
          title: 'El equipo',
          text: 'Se Actualizó correctamente.',
          type: 'success',
        });
        this.router.navigate(['/newRMA006']);
      },
      (error) => {
        console.log(error);
        this.status = 'error';
        console.log(this.infomantenimiento);
      }
    );
  }
}
