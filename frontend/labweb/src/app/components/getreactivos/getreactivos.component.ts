import { Reactivos_AccesoriosModel } from './../../models/reactivos_accesorios';
import { Component, OnInit } from '@angular/core';
import { EquiposService } from './../../providers/equipos.service';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-getreactivos',
  templateUrl: './getreactivos.component.html',
  styleUrls: ['./getreactivos.component.css']
})
export class GetreactivosComponent implements OnInit {

  infoI = new Reactivos_AccesoriosModel();
  constructor(
    private _equiposService: EquiposService,
    private route: ActivatedRoute,
    private router: Router
  ) { }

  ngOnInit(): void {
    const id: any = this.route.snapshot.paramMap.get('id');

    //console.log(id);

    this._equiposService.getReactivosAccesoriosI(id).subscribe((resp: any) => {
      this.infoI = resp;
      this.infoI.NUM_HOJA_VIDA = id;
      //this._equiposService.actualizarEquipo(this.infoI);
      console.log(this.infoI);
    });

  }
}


