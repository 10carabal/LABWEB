import { Func_EquiposModel } from './../../models/func_equipos';
import { Component, OnInit } from '@angular/core';
import { FormatosService } from './../../providers/formatos.services';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-inspefuncionalidad',
  templateUrl: './inspefuncionalidad.component.html',
  styleUrls: ['./inspefuncionalidad.component.css']
})
export class InspefuncionalidadComponent implements OnInit {

  formatos = new Func_EquiposModel();

  constructor(private _formatosService: FormatosService, private route: ActivatedRoute,
    private router: Router) { }

  ngOnInit(): void {
    const id: any = this.route.snapshot.paramMap.get('id');

    //console.log(id);

    this._formatosService.getRMA009I(id).subscribe((resp: any) => {
      this.formatos = resp;
      this.formatos.NUM_HOJA_VIDA = id;
      //this._equiposService.actualizarEquipo(this.formatos);
      console.log(this.formatos);
    });

  }
}


