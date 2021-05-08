import { Component, OnInit } from '@angular/core';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { EquiposService } from './../../providers/equipos.service';
import { ActivatedRoute, Router } from '@angular/router';
import { Hist_Solicitudes_EquiposModel } from 'src/app/models/hist_solicitudes_equipos';

@Component({
  selector: 'app-edithistorico',
  templateUrl: './edithistorico.component.html',
  styleUrls: ['./edithistorico.component.css']
})
export class EdithistoricoComponent implements OnInit {

  historico = new Hist_Solicitudes_EquiposModel();
  status: string;
  temp = new Hist_Solicitudes_EquiposModel();
  //temp1 = new Hist_Solicitudes_EquiposModel();

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
      this.historico.NUM_HOJA_VIDA = id;
      this.temp.NUM_HOJA_VIDA = id;
      //this.temp1.Consecutivo_Orden
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

    this._equiposService.updateHistorico(this.historico, this.historico.NUM_HOJA_VIDA).subscribe(
      (response) => {
        Swal.fire({
          title: 'El equipo',
          text: 'Se Actualizó correctamente.',
          type: 'success',
        });
        this.router.navigate(['/newhistorico']);
      },
      (error) => {
        console.log(error);
        this.status = 'error';
        console.log(this.historico);
      }
    );
  }
}
