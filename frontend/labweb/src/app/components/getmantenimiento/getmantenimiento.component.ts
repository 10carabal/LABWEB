import { Mantenimiento_EquiposModel } from './../../models/mantenimiento_equipos';
import { Component, OnInit } from '@angular/core';
import { EquiposService } from './../../providers/equipos.service';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-getmantenimiento',
  templateUrl: './getmantenimiento.component.html',
  styleUrls: ['./getmantenimiento.component.css']
})
export class GetmantenimientoComponent implements OnInit {

  infoI = new Mantenimiento_EquiposModel();
  constructor(
    private _equiposService: EquiposService,
    private route: ActivatedRoute,
    private router: Router
  ) { }

  ngOnInit(): void {
    const id: any = this.route.snapshot.paramMap.get('id');

    //console.log(id);

    this._equiposService.getMantenimientoI(id).subscribe((resp: any) => {
      this.infoI = resp;
      this.infoI.NUM_HOJA_VIDA = id;
      //this._equiposService.actualizarEquipo(this.infoI);
      console.log(this.infoI);
    });

  }
}


