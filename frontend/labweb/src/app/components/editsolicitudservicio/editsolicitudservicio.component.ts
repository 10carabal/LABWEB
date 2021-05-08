import { FormatosService } from './../../providers/formatos.services';
import { Solicitud_ServicioModel } from './../../models/solicitud_servicio';
import { Component, OnInit } from '@angular/core';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-editsolicitudservicio',
  templateUrl: './editsolicitudservicio.component.html',
  styleUrls: ['./editsolicitudservicio.component.css']
})
export class EditsolicitudservicioComponent implements OnInit {

  rma007 = new Solicitud_ServicioModel();
  status: string;
  temp = new Solicitud_ServicioModel();
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
      this.rma007.NUM_HOJA_VIDA = id;
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

    this._formatosService.updateRMA007(this.rma007, this.rma007.NUM_HOJA_VIDA).subscribe(
      (response) => {
        Swal.fire({
          title: 'El equipo',
          text: 'Se Actualizó correctamente.',
          type: 'success',
        });
        this.router.navigate(['/newRMA007']);
      },
      (error) => {
        console.log(error);
        this.status = 'error';
        console.log(this.rma007);
      }
    );
  }
}
