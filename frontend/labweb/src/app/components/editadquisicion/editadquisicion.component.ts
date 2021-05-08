import { Component, OnInit } from '@angular/core';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { EquiposService } from './../../providers/equipos.service';
import { ActivatedRoute, Router } from '@angular/router';
import { Adq_EquiposModel } from 'src/app/models/adq_equipos';

@Component({
  selector: 'app-editadquisicion',
  templateUrl: './editadquisicion.component.html',
  styleUrls: ['./editadquisicion.component.css']
})
export class EditadquisicionComponent implements OnInit {

  adquisicion = new Adq_EquiposModel();
  status: string;
  temp = new Adq_EquiposModel();
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
      this.adquisicion.NUM_HOJA_VIDA = id;
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

    this._equiposService.updateCompraEquipos(this.adquisicion, this.adquisicion.NUM_HOJA_VIDA).subscribe(
      (response) => {
        Swal.fire({
          title: 'El equipo',
          text: 'Se Actualizó correctamente.',
          type: 'success',
        });
        this.router.navigate(['/newadquisicion']);
      },
      (error) => {
        console.log(error);
        this.status = 'error';
        console.log(this.adquisicion);
      }
    );
  }
}
