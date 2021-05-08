import { FormatosService } from './../../providers/formatos.services';
import { Component, OnInit } from '@angular/core';
import { PlanMantenimiento } from 'src/app/interfaces/planmantenimiento.interfaces';

@Component({
  selector: 'app-cronograma-mantenimiento',
  templateUrl: './cronograma-mantenimiento.component.html',
  styleUrls: ['./cronograma-mantenimiento.component.css']
})
export class CronogramaMantenimientoComponent implements OnInit {

  mantenimientos: PlanMantenimiento;
  dias: Date;
  num: any;

  constructor(private _formatosService: FormatosService) {
    this._formatosService.getCronogramaMantenimiento('RMA004')
      .then((data: any) => {
        this.mantenimientos = data;
        this.num = this.mantenimientos.NUM_HOJA_VIDA;
        console.log(this.mantenimientos);
      },
        (errorServicio) => {

          console.log(errorServicio.statusText);
          console.log(errorServicio.message);

        });
  }
  ngOnInit(): void {

    this._formatosService.getFechaMantenimiento('fechamantenimiento', this.num)
      .then((data: any) => {
        //console.log(data);
        this.dias = data;
      },
        (errorServicio) => {

          console.log(errorServicio.statusText);
          console.log(errorServicio.message);

        });
  }



}




