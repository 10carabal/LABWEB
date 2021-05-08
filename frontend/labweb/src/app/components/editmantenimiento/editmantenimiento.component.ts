import { Mantenimiento_EquiposModel } from './../../models/mantenimiento_equipos';
import { Component, OnInit } from '@angular/core';
import { Clasifi_EquipoModel } from './../../models/clasifi_equipo';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { Info_InstitucionalModel } from './../../models/info_institucional';
import { EquiposService } from './../../providers/equipos.service';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-editmantenimiento',
  templateUrl: './editmantenimiento.component.html',
  styleUrls: ['./editmantenimiento.component.css']
})
export class EditmantenimientoComponent implements OnInit {

  MantenimientoI = new Mantenimiento_EquiposModel();
  status: string;
  temp = new Mantenimiento_EquiposModel();
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
      this.MantenimientoI.NUM_HOJA_VIDA = id;
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

    this._equiposService.updateMantenimiento(this.MantenimientoI, this.MantenimientoI.NUM_HOJA_VIDA).subscribe(
      (response) => {
        Swal.fire({
          title: 'El equipo',
          text: 'Se Actualizó correctamente.',
          type: 'success',
        });
        this.router.navigate(['/newmantenimiento']);
      },
      (error) => {
        console.log(error);
        this.status = 'error';
        console.log(this.MantenimientoI);
      }
    );
  }
}
