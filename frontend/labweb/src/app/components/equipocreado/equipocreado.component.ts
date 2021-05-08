import { EquiposModel } from './../../models/equipos';
import { NewequipoComponent } from './../newequipo/newequipo.component';
import { NgForm } from '@angular/forms';
import { EquiposService } from './../../providers/equipos.service';
import { Component, OnInit } from '@angular/core';
import Swal from 'sweetalert2/dist/sweetalert2.js';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-equipocreado',
  templateUrl: './equipocreado.component.html',
  styleUrls: ['./equipocreado.component.css'],
})
export class EquipocreadoComponent implements OnInit {
  newequipos = new EquiposModel();
  status: string;

  constructor(
    private _equiposService: EquiposService,
    private route: ActivatedRoute,
    private router: Router
  ) { }

  ngOnInit(): void {
    //this.newequipos = new EquiposModel(0, '', '', '', '', '', '', '', '');
    const id: any = this.route.snapshot.paramMap.get('id');
    //console.log(id);

    if (id !== 'nuevo') {
      this._equiposService.getEquipo(id).subscribe((resp: any) => {
        this.newequipos = resp;
        this.newequipos.NUM_HOJA_VIDA = id;
        //this._equiposService.actualizarEquipo(this.newequipos);
        console.log(this.newequipos);
      });
    }
  }

  guardarEquipo(form: NgForm) {
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

    this._equiposService.createEquipo(this.newequipos).subscribe(
      //peticion.subscribe(
      (response) => {
        Swal.fire({
          title: this.newequipos.Nombre,
          text: 'Se Actualizó correctamente.',
          type: 'success',
        });
        console.log(this.newequipos);
        this.router.navigate(['/newequipos']);

        if (response.status == 'success') {
          this.newequipos = response;
          this.status = 'success';
        } else {
          this.status = 'error';
        }
      },
      (error) => {
        console.log(error);
        this.status = 'error';
        console.log(this.newequipos);
      }
    );
  }
}
