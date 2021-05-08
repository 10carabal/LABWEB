import { PlanValidacion } from './../../interfaces/planvalidacion.interfaces';
import { Component, OnInit } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormatosService } from './../../providers/formatos.services';

@Component({
  selector: 'app-calibracion-calificacion',
  templateUrl: './cronograma-calibracion-calificacion.component.html',
  styleUrls: ['./cronograma-calibracion-calificacion.component.css']
})
export class CronogramaCalibracionCalificacionComponent implements OnInit {

  validaciones: PlanValidacion;
  //estado: any;

  constructor(private _formatosService: FormatosService) { }

  ngOnInit(): void {
    this._formatosService.getCronogramaValidacion('RMA005')
      .then((data: any) => {
        console.log(data);
        this.validaciones = data;
        /* this.estado = data.ESTADO_EJECUCION;
        console.log(this.estado); */

      },
        (errorServicio) => {

          console.log(errorServicio.statusText);
          console.log(errorServicio.message);

        });
  }

}
