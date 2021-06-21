import { InformeServicioModel } from './../../models/informeservicio';
import { Component, OnInit } from '@angular/core';
import { FormatosService } from './../../providers/formatos.services';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { Router } from '@angular/router';

@Component({
  selector: 'app-newinformeservicio',
  templateUrl: './newinformeservicio.component.html',
  styleUrls: ['./newinformeservicio.component.css']
})
export class NewinformeservicioComponent implements OnInit {

  cargando = false;

  rma008: InformeServicioModel[] = [];

  constructor(private _formatosService: FormatosService, private router: Router) { }



  ngOnInit(): void {
    this.cargando = true;
    //this.getInfo();
    this._formatosService.getRMA008()
      .then((data: any) => {
        console.log(data);
        this.rma008 = data;
        this.cargando = false;
      },
        (errorServicio) => {

          console.log(errorServicio.statusText);
          console.log(errorServicio.message);

        });
    this.cargando = false;
  }


  borrarInfo(rma008: InformeServicioModel) {

    Swal.fire({
      title: '¿Está seguro?',
      text: `Está seguro que desea borrar la información de ${rma008.NUM_HOJA_VIDA}`,
      type: 'question',
      showConfirmButton: true,
      showCancelButton: true
    }).then(resp => {

      if (resp.value) {
        this.cargando = true;
        this._formatosService.borrarRMA008(rma008.NUM_HOJA_VIDA).subscribe(resp => {


          Swal.fire({
            title: 'Equipo Borrado',
            text: 'Se actualizó correctamente.',
            type: 'success'

          });
          this._formatosService.getRMA008()
            .then((data: any) => {
              console.log(data);
              this.rma008 = data;
              this.cargando = false;
            },
              (errorServicio) => {

                console.log(errorServicio.statusText);
                console.log(errorServicio.message);

              });
        });
        this.router.navigate(['/newRMA008']);

      }

    });
  }
  download(info: InformeServicioModel){
    this._formatosService.getPDFRMA008I(""+info.NUM_HOJA_VIDA);
  }
}

