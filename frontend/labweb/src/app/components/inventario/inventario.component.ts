import { Component, OnInit } from '@angular/core';
import { FormatosService } from './../../providers/formatos.services';
import { ActivatedRoute, Router } from '@angular/router';
import { Inventario } from 'src/app/interfaces/inventario.interfaces';

@Component({
  selector: 'app-inventario',
  templateUrl: './inventario.component.html',
  styleUrls: ['./inventario.component.css']
})
export class InventarioComponent implements OnInit {

  inventarios: Inventario;

  constructor(private _formatosService: FormatosService, private route: ActivatedRoute,
    private router: Router) { }

  ngOnInit(): void {
    const id: any = this.route.snapshot.paramMap.get('id');
    //console.log(id);

    this._formatosService.getRMA003I(id).subscribe((resp: any) => {
      this.inventarios = resp;
      //this.inventarios.NUM_HOJA_VIDA = id;
      //this._equiposService.actualizarEquipo(this.inventarios);
      console.log(this.inventarios);
    });

  }
  download(info: Inventario){
    this._formatosService.getPDFRMA003I(info.id);
  }
}


