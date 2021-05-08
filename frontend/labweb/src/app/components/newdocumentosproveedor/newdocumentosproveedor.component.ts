import { Doc_ProveedorModel } from './../../models/doc_proveedor';
import { Component, OnInit } from '@angular/core';

import Swal from 'sweetalert2/dist/sweetalert2.js';
import { Router } from '@angular/router';
import { ProveedoresService } from 'src/app/providers/proveedores.service';
@Component({
  selector: 'app-newdocumentosproveedor',
  templateUrl: './newdocumentosproveedor.component.html',
  styleUrls: ['./newdocumentosproveedor.component.css']
})
export class NewdocumentosproveedorComponent implements OnInit {

  num: any;
  cargando = false;

  proveedores: Doc_ProveedorModel[] = [];

  constructor(private _provedoresService: ProveedoresService, private router: Router) { }



  ngOnInit(): void {
    this.cargando = true;
    //this.getInfo();
    this._provedoresService.getDocProveedor()
      .then((data: any) => {
        console.log(data);
        this.proveedores = data;
        this.cargando = false;
      },
        (errorServicio) => {

          console.log(errorServicio.statusText);
          console.log(errorServicio.message);

        });
    this.cargando = false;
  }


  borrarInfo(info: Doc_ProveedorModel) {

    Swal.fire({
      title: '¿Está seguro?',
      text: `Está seguro que desea borrar la información asociada a la Hoja de Vida #${info.NUM_HOJA_VIDA}`,
      type: 'question',
      showConfirmButton: true,
      showCancelButton: true
    }).then(resp => {

      if (resp.value) {
        this.cargando = true;
        this._provedoresService.borrarDocProveedor(info.id).subscribe(resp => {


          Swal.fire({
            title: 'Equipo Borrado',
            text: 'Se actualizó correctamente.',
            type: 'success'

          });
          this._provedoresService.getDocProveedor()
            .then((data: any) => {
              console.log(data);
              this.proveedores = data;
              this.cargando = false;
            },
              (errorServicio) => {

                console.log(errorServicio.statusText);
                console.log(errorServicio.message);

              });
        });
        this.router.navigate(['/newdocumentosproveedor']);

      }

    });
  }

}

