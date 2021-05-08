import { Component, OnInit } from '@angular/core';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { EquiposService } from './../../providers/equipos.service';
import { EquiposModel } from 'src/app/models/equipos';
import { ActivatedRoute, Router } from '@angular/router';
import { ProveedoresService } from 'src/app/providers/proveedores.service';
import { Fabricantes_ProveedoresModel } from 'src/app/models/fabricantes_proveedores';

@Component({
  selector: 'app-fabricantesproveedores',
  templateUrl: './fabricantesproveedores.component.html',
  styleUrls: ['./fabricantesproveedores.component.css']
})
export class FabricantesproveedoresComponent implements OnInit {

  equipos: EquiposModel;
  newfabricantes = new Fabricantes_ProveedoresModel();
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
      this._proveedoresService.getFabricantesI(id).subscribe((resp: any) => {
        //this.newInfo = resp;
        this.newfabricantes.id = id;
        console.log(this.newfabricantes.id);
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
      .createFabricantes(this.newfabricantes)
      .subscribe(
        (response) => {
          Swal.fire({
            title:
              'Los Datos anexos de la Hoja de Vida #' + this.newfabricantes.NUM_HOJA_VIDA,
            text: 'Se Actualizó correctamente.',
            type: 'success',
          });
          this.router.navigate(['/newfabricantesproveedores']);
          //console.log(this.newInfo);

          if (response.status == 'success') {
            this.newfabricantes = response;
            this.status = 'success';
          } else {
            this.status = 'error';
          }
        },
        (error) => {
          console.log(error);
          this.status = 'error';
          console.log(this.newfabricantes);
        }
      );
  }
}
