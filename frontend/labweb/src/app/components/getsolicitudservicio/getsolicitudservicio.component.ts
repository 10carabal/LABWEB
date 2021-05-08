import { Solicitud_ServicioModel } from './../../models/solicitud_servicio';
import { Component, OnInit } from '@angular/core';
import { FormatosService } from './../../providers/formatos.services';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-getsolicitudservicio',
  templateUrl: './getsolicitudservicio.component.html',
  styleUrls: ['./getsolicitudservicio.component.css']
})
export class GetsolicitudservicioComponent implements OnInit {

  formatos = new Solicitud_ServicioModel();

  constructor(private _formatosService: FormatosService, private route: ActivatedRoute,
    private router: Router) { }

  ngOnInit(): void {
    const id: any = this.route.snapshot.paramMap.get('id');

    //console.log(id);

    this._formatosService.getRMA007I(id).subscribe((resp: any) => {
      this.formatos = resp;
      this.formatos.NUM_HOJA_VIDA = id;
      //this._equiposService.actualizarEquipo(this.formatos);
      console.log(this.formatos);
    });

  }
}


