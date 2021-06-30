import { InformeMantenimientoModel } from './../../models/informemantenimiento';
import { Component, OnInit } from '@angular/core';
import { FormatosService } from './../../providers/formatos.services';
import { EquiposModel } from 'src/app/models/equipos';
import { EquiposService } from 'src/app/providers/equipos.service';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { ActivatedRoute, Router } from '@angular/router';
import { Solicitud_ServicioModel } from 'src/app/models/solicitud_servicio';

@Component({
  selector: 'app-informemantenimiento',
  templateUrl: './informemantenimiento.component.html',
  styleUrls: ['./informemantenimiento.component.css']
})
export class InformemantenimientoComponent implements OnInit {

  equipos: EquiposModel;
  newrma006 = new InformeMantenimientoModel();
  imagenAntesMantenimiento: File = null;
  imagenDespuesMantenimiento: File = null;
  status: string;
  cons_orden: Solicitud_ServicioModel;

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
      this._formatosService.getRMA006I(id).subscribe((resp: any) => {
        //this.newInfo = resp;
        this.newrma006.id = id;
        //console.log(this.newrma006.NUM_HOJA_VIDA);
      });
    }
  }
  generarSolicitud(form) {
    if (form.invalid) {
      console.log('Formulario no valído.');
      return;
    }
    this.newrma006.Imagen_Antes_Mantenimiento = this.imagenAntesMantenimiento;
    this.newrma006.Imagen_Despues_Mantenimiento = this.imagenDespuesMantenimiento;

    Swal.fire({
      title: 'Espere',
      text: 'Guardando Información',
      type: 'Info',
      allowOutsideClick: false,
    });
    Swal.showLoading();
    this._formatosService
      .createRMA006(this.newrma006)
      .subscribe(
        (response) => {
          Swal.fire({
            title: this.newrma006.NUM_HOJA_VIDA,
            text: 'Se Actualizó correctamente.',
            type: 'success',
          });

          this.router.navigate(['/newRMA006']);
          //console.log(this.newrma006);

          if (response.status == 'success') {
            this.newrma006 = response;
            this.status = 'success';
          } else {
            this.status = 'error';
          }
        },
        (error) => {
          console.log(error);
          this.status = 'error';
          console.log(this.newrma006);
          Swal.hideLoading();
          Swal.fire({
            title: "Error",
            text: 'No se pudo guardar los datos.',
            type: 'error',
          });

        }
      );
  }
  onFileSelected(event, image) {

        const file:File = event.target.files[0];
        //this.newrma006[event.target.name] = file;
        if(image == 1){
          this.imagenAntesMantenimiento = file;
        }else
        if(image == 2){
          this.imagenDespuesMantenimiento = file;
        }
        console.log(file);
        if (file) {


            const formData = new FormData();

            formData.append("thumbnail", file);

        }
    }
}



