import { Directive, ElementRef, Input } from '@angular/core';

@Directive({
  selector: '[appPintar]'
})
export class PintarDirective {


  constructor(private el: ElementRef) {
    //console.log("Hola mundo.!!!!!");

    console.log(this.estado);
    this.colorear(this.estado);
  }

  @Input("appColorear") estado: any;
  /* MTTO.PREVENTIVOPROGRAMADO = gray
  MTTO.PREVENTIVO REALIZADO = green
  EQUIPO FUERA DE SERVICIO = red
  MTTO.CORRECTIVO = blue
  EQUIPO EN GARANTIA = orange
  REPROGRAMACIÓN yellow
 */
  private colorear(estado: any) {
    if (estado == "CALIBRACIÓNPROGRAMADA") {
      this.el.nativeElement.style.backgroundColor = "Violet";

    } else if (estado == "CALIBRACIÓNEJECUTADO") {
      this.el.nativeElement.style.backgroundColor = "DarkTurquoise";

    } else if (estado == "VALIDACIÓNPROGRAMADA") {
      this.el.nativeElement.style.backgroundColor = "Aqua";

    } else if (estado == "VALIDACIÓNEJECUTADA") {
      this.el.nativeElement.style.backgroundColor = "pink";

    } else if (estado == "CALIFICACIÓNOPERACIONALPROGRAMADA") {
      this.el.nativeElement.style.backgroundColor = "DodgerBlue";

    } else if (estado == "CALIFICACIÓNOPERACIONALEJECUTAD") {
      this.el.nativeElement.style.backgroundColor = "MediumVioletRed";

    } else if (estado == "REPROGRAMACIÓN") {
      this.el.nativeElement.style.backgroundColor = "lime";

    }

  }
}
