import { Info_Tecnica_EquipoModel } from './../../models/info_tecnica_equipo';
import { Component, OnInit } from '@angular/core';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { EquiposService } from './../../providers/equipos.service';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-editinfotecnica',
  templateUrl: './editinfotecnica.component.html',
  styleUrls: ['./editinfotecnica.component.css']
})
export class EditinfotecnicaComponent implements OnInit {

  tecnicaI = new Info_Tecnica_EquipoModel();
  status: string;
  temp = new Info_Tecnica_EquipoModel();
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
      this.tecnicaI.NUM_HOJA_VIDA = id;
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

    this._equiposService.updateInfoTecnica(this.tecnicaI, this.tecnicaI.NUM_HOJA_VIDA).subscribe(
      (response) => {
        Swal.fire({
          title: 'El equipo',
          text: 'Se Actualizó correctamente.',
          type: 'success',
        });
        this.router.navigate(['/newinfotecnica']);
      },
      (error) => {
        console.log(error);
        this.status = 'error';
        console.log(this.tecnicaI);
      }
    );
  }
}
