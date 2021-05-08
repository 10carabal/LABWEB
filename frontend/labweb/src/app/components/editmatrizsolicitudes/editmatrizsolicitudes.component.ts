import { Matriz_SolicitudesModel } from './../../models/matriz_solicitudes';
import { Component, OnInit } from '@angular/core';
import { FormatosService } from './../../providers/formatos.services';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-editmatrizsolicitudes',
  templateUrl: './editmatrizsolicitudes.component.html',
  styleUrls: ['./editmatrizsolicitudes.component.css']
})
export class EditmatrizsolicitudesComponent implements OnInit {

  rma010 = new Matriz_SolicitudesModel();
  status: string;
  temp = new Matriz_SolicitudesModel();
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
      this.rma010.NUM_HOJA_VIDA = id;
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

    this._formatosService.updateRMA010(this.rma010, this.rma010.NUM_HOJA_VIDA).subscribe(
      (response) => {
        Swal.fire({
          title: 'El equipo',
          text: 'Se Actualizó correctamente.',
          type: 'success',
        });
        this.router.navigate(['/newRMA010']);
      },
      (error) => {
        console.log(error);
        this.status = 'error';
        console.log(this.rma010);
      }
    );
  }
}
