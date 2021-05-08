import { FormatosService } from './../../providers/formatos.services';
import { Solicitud_ServicioModel } from './../../models/solicitud_servicio';
import { Component, OnInit } from '@angular/core';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { EquiposService } from './../../providers/equipos.service';
import { EquiposModel } from 'src/app/models/equipos';
import { ActivatedRoute, Router } from '@angular/router';
import { Hist_Solicitudes_EquiposModel } from 'src/app/models/hist_solicitudes_equipos';

@Component({
  selector: 'app-historico',
  templateUrl: './historico.component.html',
  styleUrls: ['./historico.component.css']
})
export class HistoricoComponent implements OnInit {

  equipos: EquiposModel;
  cons_orden: Solicitud_ServicioModel

  newHistorico = new Hist_Solicitudes_EquiposModel();
  status: string;
  constructor(
    private _equiposService: EquiposService,
    private _formatosService: FormatosService,
    private route: ActivatedRoute,
    private router: Router
  ) { }

  ngOnInit(): void {
    this._equiposService.getEquipos('equipos').then(
      (data: any) => {
        // console.log(data);
        this.equipos = data;
      },
      (errorServicio) => {
        console.log(errorServicio.statusText);
        console.log(errorServicio.message);
      }
    );
    this._formatosService.getRMA007().then(
      (data: any) => {
        console.log(data);
        this.cons_orden = data;
      },
      (errorServicio) => {
        console.log(errorServicio.statusText);
        console.log(errorServicio.message);
      }
    );
    const id: any = this.route.snapshot.paramMap.get('id');
    if (id !== 'nuevo') {
      this._equiposService.getHistoricoI(id).subscribe((resp: any) => {
        //this.newInfo = resp;
        this.newHistorico.id = id;
        console.log(this.newHistorico.id);
      });
    }

  }

  guardarInfo(form) {
    if (form.invalid) {
      console.log('Formulario no valído.');
      return;
    }
    Swal.fire({
      title: 'Espere',
      text: 'Guardando Información',
      type: 'Info',
      allowOutsideClick: false,
    });
    Swal.showLoading();

    this._equiposService
      .createHistorico(this.newHistorico)
      .subscribe(
        (response) => {
          Swal.fire({
            title: 'Información del equipo: ' + this.newHistorico.NUM_HOJA_VIDA,
            text: 'Se Actualizó correctamente.',
            type: 'success',
          });
          this.router.navigate(['/newhistorico']);
          //console.log(this.newHistorico);

          if (response.status == 'success') {
            this.newHistorico = response;
            this.status = 'success';
          } else {
            this.status = 'error';
          }
        },
        (error) => {
          console.log(error);
          this.status = 'error';
          console.log(this.newHistorico);
        }
      );
  }
}
