import { Matriz_SolicitudesModel } from './../../models/matriz_solicitudes';
import { Component, OnInit } from '@angular/core';
import { FormatosService } from './../../providers/formatos.services';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-getmatrizsolicitudes',
  templateUrl: './getmatrizsolicitudes.component.html',
  styleUrls: ['./getmatrizsolicitudes.component.css']
})
export class GetmatrizsolicitudesComponent implements OnInit {

  formatos = new Matriz_SolicitudesModel();

  constructor(private _formatosService: FormatosService, private route: ActivatedRoute,
    private router: Router) { }

  ngOnInit(): void {
    const id: any = this.route.snapshot.paramMap.get('id');

    //console.log(id);

    this._formatosService.getRMA010I(id).subscribe((resp: any) => {
      this.formatos = resp;
      this.formatos.NUM_HOJA_VIDA = id;
      //this._equiposService.actualizarEquipo(this.formatos);
      console.log(this.formatos);
    });

  }
}


