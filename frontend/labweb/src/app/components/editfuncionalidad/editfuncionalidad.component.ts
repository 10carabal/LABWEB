import { Func_EquiposModel } from './../../models/func_equipos';
import { Component, OnInit } from '@angular/core';
import { FormatosService } from './../../providers/formatos.services';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-editfuncionalidad',
  templateUrl: './editfuncionalidad.component.html',
  styleUrls: ['./editfuncionalidad.component.css']
})
export class EditfuncionalidadComponent implements OnInit {

  rma009 = new Func_EquiposModel();
  status: string;
  temp = new Func_EquiposModel();
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
      this.rma009.NUM_HOJA_VIDA = id;
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

    this._formatosService.updateRMA009(this.rma009, this.rma009.NUM_HOJA_VIDA).subscribe(
      (response) => {
        Swal.fire({
          title: 'El equipo',
          text: 'Se Actualizó correctamente.',
          type: 'success',
        });
        this.router.navigate(['/newRMA009']);
      },
      (error) => {
        console.log(error);
        this.status = 'error';
        console.log(this.rma009);
      }
    );
  }
}
