import { Info_InstitucionalModel } from './../../models/info_institucional';
import { Component, OnInit } from '@angular/core';
import { EquiposService } from './../../providers/equipos.service';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-getinfoinstitucional',
  templateUrl: './getinfoinstitucional.component.html',
  styleUrls: ['./getinfoinstitucional.component.css']
})
export class GetinfoinstitucionalComponent implements OnInit {

  infoI = new Info_InstitucionalModel();
  constructor(
    private _equiposService: EquiposService,
    private route: ActivatedRoute,
    private router: Router
  ) { }

  ngOnInit(): void {
    const id: any = this.route.snapshot.paramMap.get('id');

    //console.log(id);

    this._equiposService.getInfoI(id).subscribe((resp: any) => {
      this.infoI = resp;
      this.infoI.NUM_HOJA_VIDA = id;
      //this._equiposService.actualizarEquipo(this.infoI);
      console.log(this.infoI);
    });

  }
}


