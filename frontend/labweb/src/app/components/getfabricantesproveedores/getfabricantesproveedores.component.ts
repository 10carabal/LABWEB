import { Fabricantes_ProveedoresModel } from 'src/app/models/fabricantes_proveedores';
import { Component, OnInit } from '@angular/core';
import { ActivatedRoute, Router } from '@angular/router';
import { ProveedoresService } from 'src/app/providers/proveedores.service';


@Component({
  selector: 'app-getfabricantesproveedores',
  templateUrl: './getfabricantesproveedores.component.html',
  styleUrls: ['./getfabricantesproveedores.component.css']
})
export class GetfabricantesproveedoresComponent implements OnInit {

  infoI = new Fabricantes_ProveedoresModel();
  constructor(
    private _proveedoresService: ProveedoresService,
    private route: ActivatedRoute,
    private router: Router
  ) { }

  ngOnInit(): void {
    const id: any = this.route.snapshot.paramMap.get('id');

    //console.log(id);

    this._proveedoresService.getFabricantesI(id).subscribe((resp: any) => {
      this.infoI = resp;
      this.infoI.NUM_HOJA_VIDA = id;
      //this._proveedoresService.actualizarEquipo(this.infoI);
      console.log(this.infoI);
    });

  }
}


