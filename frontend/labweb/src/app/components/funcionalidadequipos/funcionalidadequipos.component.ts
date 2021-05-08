import { Func_EquiposModel } from './../../models/func_equipos';
import { Component, OnInit } from '@angular/core';
import { FormatosService } from './../../providers/formatos.services';
import { EquiposModel } from 'src/app/models/equipos';
import { EquiposService } from 'src/app/providers/equipos.service';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { ActivatedRoute, Router } from '@angular/router';
import { Solicitud_ServicioModel } from 'src/app/models/solicitud_servicio';

@Component({
  selector: 'app-funcionalidadequipos',
  templateUrl: './funcionalidadequipos.component.html',
  styleUrls: ['./funcionalidadequipos.component.css']
})
export class FuncionalidadequiposComponent implements OnInit {

  equipos: EquiposModel;
  rma009 = new Func_EquiposModel();
  status: string;
  cons_orden: Solicitud_ServicioModel


  constructor(private _equiposService: EquiposService, private _formatosService: FormatosService, private route: ActivatedRoute,
    private router: Router) { }

  ngOnInit(): void {
    this._equiposService.getEquipos('equipos')
      .then((data: any) => {
        console.log(data);
        this.equipos = data;
      },
        (errorServicio) => {

          console.log(errorServicio.statusText);
          console.log(errorServicio.message);

        });
    this._formatosService.getRMA007().then(
      (data: any) => {
        console.log(data);
        this.cons_orden = data;
      },
      (errorServicio) => {
        console.log(errorServicio.statusText);
        console.log(errorServicio.message);
      }
    );
    const id: any = this.route.snapshot.paramMap.get('id');
    if (id !== 'nuevo') {
      this._formatosService.getRMA009I(id).subscribe((resp: any) => {
        //this.newInfo = resp;
        this.rma009.id = id;
        //console.log(this.rma009.NUM_HOJA_VIDA);
      });
    }
  }
  generarSolicitud(form) {
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

    this._formatosService
      .createRMA009(this.rma009)
      .subscribe(
        (response) => {
          Swal.fire({
            title: this.rma009.NUM_HOJA_VIDA,
            text: 'Se Actualizó correctamente.',
            type: 'success',
          });

          this.router.navigate(['/newRMA009']);
          //console.log(this.rma009);

          if (response.status == 'success') {
            this.rma009 = response;
            this.status = 'success';
          } else {
            this.status = 'error';
          }
        },
        (error) => {
          console.log(error);
          this.status = 'error';
          console.log(this.rma009);
        }
      );
  }
}


