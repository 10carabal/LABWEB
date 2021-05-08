import { FormatosService } from './../../providers/formatos.services';
import { Component, OnInit } from '@angular/core';
import { Hoja_Vida } from 'src/app/interfaces/hojavida.interfaces';
import { CommonModule } from '@angular/common';
import { ActivatedRoute, Router } from '@angular/router';


@Component({
  selector: 'app-hojavida',
  templateUrl: './hojavida.component.html',
  styleUrls: ['./hojavida.component.css']
})
export class HojavidaComponent implements OnInit {



  hojasdevida: Hoja_Vida;

  constructor(private _formatosService: FormatosService, private route: ActivatedRoute,
    private router: Router) { }

  ngOnInit(): void {
    const id: any = this.route.snapshot.paramMap.get('id');
    //console.log(id);

    this._formatosService.getRMA001I(id).subscribe((resp: any) => {
      this.hojasdevida = resp;
      //this.hojasdevida.NUM_HOJA_VIDA = id;
      //this._equiposService.actualizarEquipo(this.hojasdevida);
      console.log(this.hojasdevida);
    });

  }
}


