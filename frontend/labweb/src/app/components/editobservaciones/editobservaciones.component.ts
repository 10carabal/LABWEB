import { Observaciones_AdicionalesModel } from 'src/app/models/observaciones_adicionales';
import { Component, OnInit } from '@angular/core';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { ActivatedRoute, Router } from '@angular/router';
import { ProveedoresService } from 'src/app/providers/proveedores.service';

@Component({
  selector: 'app-editobservaciones',
  templateUrl: './editobservaciones.component.html',
  styleUrls: ['./editobservaciones.component.css']
})
export class EditobservacionesComponent implements OnInit {

  infoI = new Observaciones_AdicionalesModel();
  status: string;
  temp = new Observaciones_AdicionalesModel();
  constructor(
    private _proveedoresService: ProveedoresService,
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
      this.infoI.NUM_HOJA_VIDA = id;
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

    this._proveedoresService.updateObservaciones(this.infoI, this.infoI.NUM_HOJA_VIDA).subscribe(
      (response) => {
        Swal.fire({
          title: 'El equipo',
          text: 'Se Actualizó correctamente.',
          type: 'success',
        });
        this.router.navigate(['/newobservaciones']);
      },
      (error) => {
        console.log(error);
        this.status = 'error';
        console.log(this.infoI);
      }
    );
  }
}
