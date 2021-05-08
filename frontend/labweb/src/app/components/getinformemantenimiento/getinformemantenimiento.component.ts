import { InformeMantenimientoModel } from './../../models/informemantenimiento';
import { RMA002Model } from './../../models/rma002';
import { Component, OnInit } from '@angular/core';
import { FormatosService } from './../../providers/formatos.services';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-getinformemantenimiento',
  templateUrl: './getinformemantenimiento.component.html',
  styleUrls: ['./getinformemantenimiento.component.css']
})
export class GetinformemantenimientoComponent implements OnInit {

  formatos = new InformeMantenimientoModel();

  constructor(private _formatosService: FormatosService, private route: ActivatedRoute,
    private router: Router) { }

  ngOnInit(): void {
    const id: any = this.route.snapshot.paramMap.get('id');

    //console.log(id);

    this._formatosService.getRMA006I(id).subscribe((resp: any) => {
      this.formatos = resp;
      this.formatos.NUM_HOJA_VIDA = id;
      //this._equiposService.actualizarEquipo(this.formatos);
      console.log(this.formatos);
    });

  }
}


