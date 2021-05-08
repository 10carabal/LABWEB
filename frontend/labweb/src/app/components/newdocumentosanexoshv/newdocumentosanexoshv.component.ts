import { Doc_AnexosHvModel } from './../../models/doc_anexoshv';
import { Component, OnInit } from '@angular/core';
import { Info_InstitucionalModel } from './../../models/info_institucional';

import Swal from 'sweetalert2/dist/sweetalert2.js';
import { Router } from '@angular/router';
import { ProveedoresService } from 'src/app/providers/proveedores.service';
@Component({
  selector: 'app-newdocumentosanexoshv',
  templateUrl: './newdocumentosanexoshv.component.html',
  styleUrls: ['./newdocumentosanexoshv.component.css']
})
export class NewdocumentosanexoshvComponent implements OnInit {

  num: any;
  cargando = false;

  anexos: Doc_AnexosHvModel[] = [];

  constructor(private _provedoresService: ProveedoresService, private router: Router) { }



  ngOnInit(): void {
    this.cargando = true;
    //this.getInfo();
    this._provedoresService.getDocAnexos()
      .then((data: any) => {
        console.log(data);
        this.anexos = data;
        this.cargando = false;
      },
        (errorServicio) => {

          console.log(errorServicio.statusText);
          console.log(errorServicio.message);

        });
    this.cargando = false;
  }


  borrarInfo(info: Doc_AnexosHvModel) {

    Swal.fire({
      title: '¿Está seguro?',
      text: `Está seguro que desea borrar la información asociada a la Hoja de Vida #${info.NUM_HOJA_VIDA}`,
      type: 'question',
      showConfirmButton: true,
      showCancelButton: true
    }).then(resp => {

      if (resp.value) {
        this.cargando = true;
        this._provedoresService.borrarDocAnexos(info.id).subscribe(resp => {


          Swal.fire({
            title: 'Equipo Borrado',
            text: 'Se actualizó correctamente.',
            type: 'success'

          });
          this._provedoresService.getDocAnexos()
            .then((data: any) => {
              console.log(data);
              this.anexos = data;
              this.cargando = false;
            },
              (errorServicio) => {

                console.log(errorServicio.statusText);
                console.log(errorServicio.message);

              });
        });
        this.router.navigate(['/newdocumentosanexoshv']);

      }

    });
  }

}

