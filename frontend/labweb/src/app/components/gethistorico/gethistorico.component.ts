import { Hist_Solicitudes_EquiposModel } from 'src/app/models/hist_solicitudes_equipos';
import { Component, OnInit } from '@angular/core';
import { EquiposService } from './../../providers/equipos.service';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-gethistorico',
  templateUrl: './gethistorico.component.html',
  styleUrls: ['./gethistorico.component.css']
})
export class GethistoricoComponent implements OnInit {

  infoI = new Hist_Solicitudes_EquiposModel();
  constructor(
    private _equiposService: EquiposService,
    private route: ActivatedRoute,
    private router: Router
  ) { }

  ngOnInit(): void {
    const id: any = this.route.snapshot.paramMap.get('id');

    //console.log(id);

    this._equiposService.getHistoricoI(id).subscribe((resp: any) => {
      this.infoI = resp;
      this.infoI.NUM_HOJA_VIDA = id;
      //this._equiposService.actualizarEquipo(this.infoI);
      console.log(this.infoI);
    });

  }
}


