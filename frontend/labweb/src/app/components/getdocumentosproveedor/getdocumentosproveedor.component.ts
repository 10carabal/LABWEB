import { Doc_ProveedorModel } from './../../models/doc_proveedor';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { ProveedoresService } from 'src/app/providers/proveedores.service';

@Component({
  selector: 'app-getdocumentosproveedor',
  templateUrl: './getdocumentosproveedor.component.html',
  styleUrls: ['./getdocumentosproveedor.component.css']
})
export class GetdocumentosproveedorComponent implements OnInit {

  infoI = new Doc_ProveedorModel();
  constructor(
    private _proveedoresService: ProveedoresService,
    private route: ActivatedRoute,
    private router: Router
  ) { }

  ngOnInit(): void {
    const id: any = this.route.snapshot.paramMap.get('id');

    //console.log(id);

    this._proveedoresService.getDocProveedorI(id).subscribe((resp: any) => {
      this.infoI = resp;
      this.infoI.NUM_HOJA_VIDA = id;
      //this._proveedoresService.actualizarEquipo(this.infoI);
      console.log(this.infoI);
    });

  }
}


