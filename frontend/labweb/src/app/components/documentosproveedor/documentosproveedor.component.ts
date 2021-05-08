import { Doc_ProveedorModel } from './../../models/doc_proveedor';
import { Component, OnInit } from '@angular/core';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { EquiposService } from './../../providers/equipos.service';
import { EquiposModel } from 'src/app/models/equipos';
import { ActivatedRoute, Router } from '@angular/router';
import { ProveedoresService } from 'src/app/providers/proveedores.service';
@Component({
  selector: 'app-documentosproveedor',
  templateUrl: './documentosproveedor.component.html',
  styleUrls: ['./documentosproveedor.component.css']
})
export class DocumentosproveedorComponent implements OnInit {
  equipos: EquiposModel;
  newproveedores = new Doc_ProveedorModel();
  status: string;
  constructor(
    private _equiposService: EquiposService,
    private _proveedoresService: ProveedoresService,
    private route: ActivatedRoute,
    private router: Router
  ) { }

  ngOnInit(): void {
    this._equiposService.getEquipos('equipos').then(
      (data: any) => {
        // console.log(data);
        this.equipos = data;
      },
      (errorServicio) => {
        console.log(errorServicio.statusText);
        console.log(errorServicio.message);
      }
    );
    const id: any = this.route.snapshot.paramMap.get('id');
    if (id !== 'nuevo') {
      this._proveedoresService.getDocProveedorI(id).subscribe((resp: any) => {
        //this.newInfo = resp;
        this.newproveedores.id = id;
        console.log(this.newproveedores.id);
      });
    }
  }

  guardarInfo(form) {
    if (form.invalid) {
      console.log('Formulario no valído.');
      return;
    }
    Swal.fire({
      title: 'Espere',
      text: 'Guardando Información',
      type: 'Info',
      allowOutsideClick: false,
    });
    Swal.showLoading();

    /* if (this.newInfo.id !== '0') {
      this._equiposService.actualizarInfo(this.newInfo).subscribe((resp) => {
        console.log(resp);
      });
    } else {
     */ this._proveedoresService
      .createDocProveedor(this.newproveedores)
      .subscribe(
        (response) => {
          Swal.fire({
            title:
              'Los documento de proveedor de la Hoja de Vida #' + this.newproveedores.NUM_HOJA_VIDA,
            text: 'Se Actualizó correctamente.',
            type: 'success',
          });
          this.router.navigate(['/newdocumentosproveedor']);
          //console.log(this.newInfo);

          if (response.status == 'success') {
            this.newproveedores = response;
            this.status = 'success';
          } else {
            this.status = 'error';
          }
        },
        (error) => {
          console.log(error);
          this.status = 'error';
          console.log(this.newproveedores);
        }
      );
  }
}
