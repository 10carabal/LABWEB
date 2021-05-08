import { PlanMantenimientoModel } from './../../models/planmantenimiento';
import { Component, OnInit } from '@angular/core';
import { FormatosService } from './../../providers/formatos.services';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-editrma004',
  templateUrl: './editrma004.component.html',
  styleUrls: ['./editrma004.component.css']
})
export class Editrma004Component implements OnInit {

  rma004 = new PlanMantenimientoModel();
  status: string;
  temp = new PlanMantenimientoModel();
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
      this.rma004.NUM_HOJA_VIDA = id;
      this.temp.NUM_HOJA_VIDA = id;
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

    this._formatosService.updateRMA004(this.rma004, this.rma004.NUM_HOJA_VIDA).subscribe(
      (response) => {
        Swal.fire({
          title: 'El equipo',
          text: 'Se Actualizó correctamente.',
          type: 'success',
        });
        this.router.navigate(['/newRMA004']);
      },
      (error) => {
        console.log(error);
        this.status = 'error';
        console.log(this.rma004);
      }
    );
  }
}
