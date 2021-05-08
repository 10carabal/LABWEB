import { RMA002Model } from './../../models/rma002';
import { Component, OnInit } from '@angular/core';
import { FormatosService } from './../../providers/formatos.services';
import { ActivatedRoute, Router } from '@angular/router';

@Component({
  selector: 'app-getrma002',
  templateUrl: './getrma002.component.html',
  styleUrls: ['./getrma002.component.css']
})
export class Getrma002Component implements OnInit {

  formatos = new RMA002Model();

  constructor(private _formatosService: FormatosService, private route: ActivatedRoute,
    private router: Router) { }

  ngOnInit(): void {
    const id: any = this.route.snapshot.paramMap.get('id');

    //console.log(id);

    this._formatosService.getRMA002I(id).subscribe((resp: any) => {
      this.formatos = resp;
      this.formatos.NUM_HOJA_VIDA = id;
      //this._equiposService.actualizarEquipo(this.formatos);
      console.log(this.formatos);
    });

  }
}


