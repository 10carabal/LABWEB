import { Clasifi_EquipoModel } from './../../models/clasifi_equipo';
import { Component, OnInit } from '@angular/core';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { Info_InstitucionalModel } from './../../models/info_institucional';
import { EquiposService } from './../../providers/equipos.service';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-editclasificacion',
  templateUrl: './editclasificacion.component.html',
  styleUrls: ['./editclasificacion.component.css']
})
export class EditclasificacionComponent implements OnInit {

  ClasificacionI = new Clasifi_EquipoModel();
  status: string;
  temp = new Clasifi_EquipoModel();
  constructor(
    private _equiposService: EquiposService,
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
      this.ClasificacionI.NUM_HOJA_VIDA = id;
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

    this._equiposService.updateClasificacionEquipos(this.ClasificacionI, this.ClasificacionI.NUM_HOJA_VIDA).subscribe(
      (response) => {
        Swal.fire({
          title: 'El equipo',
          text: 'Se Actualizó correctamente.',
          type: 'success',
        });
        this.router.navigate(['/newclasificacion']);
      },
      (error) => {
        console.log(error);
        this.status = 'error';
        console.log(this.ClasificacionI);
      }
    );
  }
}
