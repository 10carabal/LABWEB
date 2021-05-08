import { Component, OnInit } from '@angular/core';

import Swal from 'sweetalert2/dist/sweetalert2.js';
import { Router } from '@angular/router';
import { ProveedoresService } from 'src/app/providers/proveedores.service';
import { Fabricantes_ProveedoresModel } from 'src/app/models/fabricantes_proveedores';

@Component({
  selector: 'app-newfabricantesproveedores',
  templateUrl: './newfabricantesproveedores.component.html',
  styleUrls: ['./newfabricantesproveedores.component.css']
})
export class NewfabricantesproveedoresComponent implements OnInit {

  num: any;
  cargando = false;

  fabricantes: Fabricantes_ProveedoresModel[] = [];

  constructor(private _provedoresService: ProveedoresService, private router: Router) { }



  ngOnInit(): void {
    this.cargando = true;
    //this.getInfo();
    this._provedoresService.getFabricantes()
      .then((data: any) => {
        console.log(data);
        this.fabricantes = data;
        this.cargando = false;
      },
        (errorServicio) => {

          console.log(errorServicio.statusText);
          console.log(errorServicio.message);

        });
    this.cargando = false;
  }


  borrarInfo(info: Fabricantes_ProveedoresModel) {

    Swal.fire({
      title: '¿Está seguro?',
      text: `Está seguro que desea borrar la información asociada a la Hoja de Vida #${info.NUM_HOJA_VIDA}`,
      type: 'question',
      showConfirmButton: true,
      showCancelButton: true
    }).then(resp => {

      if (resp.value) {
        this.cargando = true;
        this._provedoresService.borrarFabricantes(info.id).subscribe(resp => {


          Swal.fire({
            title: 'Equipo Borrado',
            text: 'Se actualizó correctamente.',
            type: 'success'

          });
          this._provedoresService.getFabricantes()
            .then((data: any) => {
              console.log(data);
              this.fabricantes = data;
              this.cargando = false;
            },
              (errorServicio) => {

                console.log(errorServicio.statusText);
                console.log(errorServicio.message);

              });
        });
        this.router.navigate(['/newfabricantesproveedores']);

      }

    });
  }

}


