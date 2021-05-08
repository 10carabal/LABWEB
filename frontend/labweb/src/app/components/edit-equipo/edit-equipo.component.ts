import { EquiposModel } from './../../models/equipos';
import { Component, OnInit } from '@angular/core';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { Info_InstitucionalModel } from './../../models/info_institucional';
import { EquiposService } from './../../providers/equipos.service';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-edit-equipo',
  templateUrl: './edit-equipo.component.html',
  styleUrls: ['./edit-equipo.component.css']
})
export class EditEquipoComponent implements OnInit {

  newequipos = new EquiposModel();
  status: string;
  temp = new EquiposModel();
  constructor(
    private _equiposService: EquiposService,
    private route: ActivatedRoute,
    private router: Router
  ) { }

  ngOnInit(): void {
    this.mostrarEquipoI();
  }

  mostrarEquipoI() {
    //Sacar el id de la ruta
    this.route.params.subscribe((params) => {
      let id = params['id'];

      console.log(id);
      this.newequipos.NUM_HOJA_VIDA = id;
      this.temp.NUM_HOJA_VIDA = id;
    });
  }

  editarEquipo(form) {
    Swal.fire({
      title: 'Espere',
      text: 'Actualizando Información',
      type: 'Info',
      allowOutsideClick: false,
    });
    Swal.showLoading();

    this._equiposService.updateEquipo(this.newequipos, this.newequipos.NUM_HOJA_VIDA).subscribe(
      (response) => {
        Swal.fire({
          title: 'El equipo',
          text: 'Se Actualizó correctamente.',
          type: 'success',
        });
        this.router.navigate(['/newequipos']);
      },
      (error) => {
        console.log(error);
        this.status = 'error';
        console.log(this.newequipos);
      }
    );
  }
}
