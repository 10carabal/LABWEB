import { InformeServicioModel } from './../../models/informeservicio';
import { Component, OnInit } from '@angular/core';
import { FormatosService } from './../../providers/formatos.services';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-getinformeservicio',
  templateUrl: './getinformeservicio.component.html',
  styleUrls: ['./getinformeservicio.component.css']
})
export class GetinformeservicioComponent implements OnInit {

  formatos = new InformeServicioModel();

  constructor(private _formatosService: FormatosService, private route: ActivatedRoute,
    private router: Router) { }

  ngOnInit(): void {
    const id: any = this.route.snapshot.paramMap.get('id');

    //console.log(id);

    this._formatosService.getRMA008I(id).subscribe((resp: any) => {
      this.formatos = resp;
      this.formatos.NUM_HOJA_VIDA = id;
      //this._equiposService.actualizarEquipo(this.formatos);
      console.log(this.formatos);
    });

  }
}


