import { Component, OnInit } from '@angular/core';
import { Adq_EquiposModel } from 'src/app/models/adq_equipos';
import { EquiposService } from 'src/app/providers/equipos.service';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { EquiposModel } from 'src/app/models/equipos';
import { ActivatedRoute, Router } from '@angular/router';


@Component({
  selector: 'app-adquisicion',
  templateUrl: './adquisicion.component.html',
  styleUrls: ['./adquisicion.component.css']
})
export class AdquisicionComponent implements OnInit {
  adquisicion = new Adq_EquiposModel();
  equipos: EquiposModel;
  status: string;

  constructor(
    private _equiposService: EquiposService,
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
      this._equiposService.getCompraEquiposI(id).subscribe((resp: any) => {
        //this.newInfo = resp;
        this.adquisicion.id = id;
        console.log(this.adquisicion.id);
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

    this._equiposService
      .createCompraEquipos(this.adquisicion)
      .subscribe(
        (response) => {
          Swal.fire({
            title: 'Orden de compra: ' + this.adquisicion.ORDEN_DE_COMPRA,
            text: 'Se Actualizó correctamente.',
            type: 'success',
          });
          this.router.navigate(['/newadquision']);
          //console.log(this.newInfo);

          if (response.status == 'success') {
            this.adquisicion = response;
            this.status = 'success';
          } else {
            this.status = 'error';
          }
        },
        (error) => {
          console.log(error);
          this.status = 'error';
        }
      );
  }
}

