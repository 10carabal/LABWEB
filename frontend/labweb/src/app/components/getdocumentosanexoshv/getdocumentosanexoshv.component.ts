import { Doc_AnexosHvModel } from './../../models/doc_anexoshv';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { ProveedoresService } from 'src/app/providers/proveedores.service';


@Component({
  selector: 'app-getdocumentosanexoshv',
  templateUrl: './getdocumentosanexoshv.component.html',
  styleUrls: ['./getdocumentosanexoshv.component.css']
})
export class GetdocumentosanexoshvComponent implements OnInit {

  infoI = new Doc_AnexosHvModel();
  constructor(
    private _proveedoresService: ProveedoresService,
    private route: ActivatedRoute,
    private router: Router
  ) { }

  ngOnInit(): void {
    const id: any = this.route.snapshot.paramMap.get('id');

    //console.log(id);

    this._proveedoresService.getDocAnexosI(id).subscribe((resp: any) => {
      this.infoI = resp;
      this.infoI.NUM_HOJA_VIDA = id;
      //this._proveedoresService.actualizarEquipo(this.infoI);
      console.log(this.infoI);
    });

  }
}


