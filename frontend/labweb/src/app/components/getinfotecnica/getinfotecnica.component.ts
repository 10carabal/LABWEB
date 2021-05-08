import { Info_Tecnica_EquipoModel } from './../../models/info_tecnica_equipo';
import { Component, OnInit } from '@angular/core';
import { EquiposService } from './../../providers/equipos.service';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-getinfotecnica',
  templateUrl: './getinfotecnica.component.html',
  styleUrls: ['./getinfotecnica.component.css']
})
export class GetinfotecnicaComponent implements OnInit {

  infoI = new Info_Tecnica_EquipoModel();
  constructor(
    private _equiposService: EquiposService,
    private route: ActivatedRoute,
    private router: Router
  ) { }

  ngOnInit(): void {
    const id: any = this.route.snapshot.paramMap.get('id');

    //console.log(id);

    this._equiposService.getInfoTecnicaI(id).subscribe((resp: any) => {
      this.infoI = resp;
      this.infoI.NUM_HOJA_VIDA = id;
      //this._equiposService.actualizarEquipo(this.infoI);
      console.log(this.infoI);
    });

  }
}


