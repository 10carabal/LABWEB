import { Reactivos_AccesoriosModel } from './../../models/reactivos_accesorios';
import { Component, OnInit } from '@angular/core';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { EquiposService } from './../../providers/equipos.service';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-editreactivos',
  templateUrl: './editreactivos.component.html',
  styleUrls: ['./editreactivos.component.css']
})
export class EditreactivosComponent implements OnInit {

  reactivos = new Reactivos_AccesoriosModel();
  status: string;
  temp = new Reactivos_AccesoriosModel();
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
      this.reactivos.NUM_HOJA_VIDA = id;
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

    this._equiposService.updateReactivosAccesorios(this.reactivos, this.reactivos.NUM_HOJA_VIDA).subscribe(
      (response) => {
        Swal.fire({
          title: 'El equipo',
          text: 'Se Actualizó correctamente.',
          type: 'success',
        });
        this.router.navigate(['/newreactivos']);
      },
      (error) => {
        console.log(error);
        this.status = 'error';
        console.log(this.reactivos);
      }
    );
  }
}
