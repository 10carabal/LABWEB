import { Doc_AnexosHvModel } from './../../models/doc_anexoshv';
import { Component, OnInit } from '@angular/core';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { EquiposService } from './../../providers/equipos.service';
import { EquiposModel } from 'src/app/models/equipos';
import { ActivatedRoute, Router } from '@angular/router';
import { ProveedoresService } from 'src/app/providers/proveedores.service';
@Component({
  selector: 'app-documentosanexos',
  templateUrl: './documentosanexos.component.html',
  styleUrls: ['./documentosanexos.component.css'],
})
export class DocumentosanexosComponent implements OnInit {
  equipos: EquiposModel;
  newanexos = new Doc_AnexosHvModel();
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
      this._proveedoresService.getDocAnexosI(id).subscribe((resp: any) => {
        //this.newInfo = resp;
        this.newanexos.id = id;
        console.log(this.newanexos.id);
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
      .createDocAnexos(this.newanexos)
      .subscribe(
        (response) => {
          Swal.fire({
            title:
              'Los anexos de la Hoja de Vida #' + this.newanexos.NUM_HOJA_VIDA,
            text: 'Se Actualizó correctamente.',
            type: 'success',
          });
          this.router.navigate(['/newdocumentosanexoshv']);
          //console.log(this.newInfo);

          if (response.status == 'success') {
            this.newanexos = response;
            this.status = 'success';
          } else {
            this.status = 'error';
          }
        },
        (error) => {
          console.log(error);
          this.status = 'error';
          console.log(this.newanexos);
        }
      );
  }
}
