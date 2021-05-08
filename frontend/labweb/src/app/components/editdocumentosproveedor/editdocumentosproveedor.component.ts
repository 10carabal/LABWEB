import { Doc_ProveedorModel } from './../../models/doc_proveedor';
import { Component, OnInit } from '@angular/core';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { ActivatedRoute, Router } from '@angular/router';
import { ProveedoresService } from 'src/app/providers/proveedores.service';

@Component({
  selector: 'app-editdocumentosproveedor',
  templateUrl: './editdocumentosproveedor.component.html',
  styleUrls: ['./editdocumentosproveedor.component.css']
})
export class EditdocumentosproveedorComponent implements OnInit {

  infoI = new Doc_ProveedorModel();
  status: string;
  temp = new Doc_ProveedorModel();
  constructor(
    private _proveedoresService: ProveedoresService,
    private route: ActivatedRoute,
    private router: Router
  ) { }

  ngOnInit(): void {
    this.mostrarInfoI();
  }

  mostrarInfoI() {
    //Sacar el id de la ruta
    this.route.params.subscribe((params) => {
      let id = params['id'];

      console.log(id);
      this.infoI.NUM_HOJA_VIDA = id;
      this.temp.NUM_HOJA_VIDA = id;
    });
  }

  editarInfo(form) {
    Swal.fire({
      title: 'Espere',
      text: 'Actualizando Información',
      type: 'Info',
      allowOutsideClick: false,
    });
    Swal.showLoading();

    this._proveedoresService.updateDocProveedor(this.infoI, this.infoI.NUM_HOJA_VIDA).subscribe(
      (response) => {
        Swal.fire({
          title: 'El equipo',
          text: 'Se Actualizó correctamente.',
          type: 'success',
        });
        this.router.navigate(['/newdocumentosproveedor']);
      },
      (error) => {
        console.log(error);
        this.status = 'error';
        console.log(this.infoI);
      }
    );
  }
}
