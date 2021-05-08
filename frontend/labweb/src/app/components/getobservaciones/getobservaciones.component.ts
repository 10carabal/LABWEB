import { Observaciones_AdicionalesModel } from 'src/app/models/observaciones_adicionales';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { ProveedoresService } from 'src/app/providers/proveedores.service';

@Component({
  selector: 'app-getobservaciones',
  templateUrl: './getobservaciones.component.html',
  styleUrls: ['./getobservaciones.component.css']
})
export class GetobservacionesComponent implements OnInit {

  infoI = new Observaciones_AdicionalesModel();
  constructor(
    private _proveedoresService: ProveedoresService,
    private route: ActivatedRoute,
    private router: Router
  ) { }

  ngOnInit(): void {
    const id: any = this.route.snapshot.paramMap.get('id');

    //console.log(id);

    this._proveedoresService.getObservacionesI(id).subscribe((resp: any) => {
      this.infoI = resp;
      this.infoI.NUM_HOJA_VIDA = id;
      //this._proveedoresService.actualizarEquipo(this.infoI);
      console.log(this.infoI);
    });

  }
}


