import { Component, OnInit } from '@angular/core';
import { Info_InstitucionalModel } from './../../models/info_institucional';
import { EquiposService } from './../../providers/equipos.service';
import { ActivatedRoute, Router } from '@angular/router';
import { Adq_EquiposModel } from 'src/app/models/adq_equipos';

@Component({
  selector: 'app-getadquisicion',
  templateUrl: './getadquisicion.component.html',
  styleUrls: ['./getadquisicion.component.css']
})
export class GetadquisicionComponent implements OnInit {

  infoI = new Adq_EquiposModel();
  constructor(
    private _equiposService: EquiposService,
    private route: ActivatedRoute,
    private router: Router
  ) { }

  ngOnInit(): void {
    const id: any = this.route.snapshot.paramMap.get('id');

    //console.log(id);

    this._equiposService.getCompraEquiposI(id).subscribe((resp: any) => {
      this.infoI = resp;
      this.infoI.NUM_HOJA_VIDA = id;
      //this._equiposService.actualizarEquipo(this.infoI);
      console.log(this.infoI);
    });

  }
}


