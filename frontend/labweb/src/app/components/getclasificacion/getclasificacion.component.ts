import { Clasifi_EquipoModel } from './../../models/clasifi_equipo';
import { Component, OnInit } from '@angular/core';
import { EquiposService } from './../../providers/equipos.service';
import { ActivatedRoute, Router } from '@angular/router';
import { Adq_EquiposModel } from 'src/app/models/adq_equipos';

@Component({
  selector: 'app-getclasificacion',
  templateUrl: './getclasificacion.component.html',
  styleUrls: ['./getclasificacion.component.css']
})
export class GetclasificacionComponent implements OnInit {

  infoI = new Clasifi_EquipoModel();
  constructor(
    private _equiposService: EquiposService,
    private route: ActivatedRoute,
    private router: Router
  ) { }

  ngOnInit(): void {
    const id: any = this.route.snapshot.paramMap.get('id');

    //console.log(id);

    this._equiposService.getClasificacionEquiposI(id).subscribe((resp: any) => {
      this.infoI = resp;
      this.infoI.NUM_HOJA_VIDA = id;
      //this._equiposService.actualizarEquipo(this.infoI);
      console.log(this.infoI);
    });

  }
}


