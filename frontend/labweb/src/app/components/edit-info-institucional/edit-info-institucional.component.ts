import { Component, OnInit } from '@angular/core';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { Info_InstitucionalModel } from './../../models/info_institucional';
import { EquiposService } from './../../providers/equipos.service';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-edit-info-institucional',
  templateUrl: './edit-info-institucional.component.html',
  styleUrls: ['./edit-info-institucional.component.css'],
})
export class EditInfoInstitucionalComponent implements OnInit {
  infoI = new Info_InstitucionalModel();
  status: string;
  temp = new Info_InstitucionalModel();
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

    this._equiposService.updateInfo(this.infoI, this.infoI.NUM_HOJA_VIDA).subscribe(
      (response) => {
        Swal.fire({
          title: 'El equipo',
          text: 'Se Actualizó correctamente.',
          type: 'success',
        });
        this.router.navigate(['/newinfo']);
      },
      (error) => {
        console.log(error);
        this.status = 'error';
        console.log(this.infoI);
      }
    );
  }
}
