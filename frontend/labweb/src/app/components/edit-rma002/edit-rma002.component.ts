import { FormatosService } from './../../providers/formatos.services';
import { RMA002Model } from './../../models/rma002';
import { Component, OnInit } from '@angular/core';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-edit-rma002',
  templateUrl: './edit-rma002.component.html',
  styleUrls: ['./edit-rma002.component.css']
})
export class EditRMA002Component implements OnInit {

  rma002 = new RMA002Model();
  status: string;
  temp = new RMA002Model();
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
      this.rma002.NUM_HOJA_VIDA = id;
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

    this._formatosService.updateRMA002(this.rma002, this.rma002.NUM_HOJA_VIDA).subscribe(
      (response) => {
        Swal.fire({
          title: 'El equipo',
          text: 'Se Actualizó correctamente.',
          type: 'success',
        });
        this.router.navigate(['/newRMA002']);
      },
      (error) => {
        console.log(error);
        this.status = 'error';
        console.log(this.rma002);
      }
    );
  }
}
