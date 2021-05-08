import { Directive, ElementRef, Input } from '@angular/core';

@Directive({
  selector: '[appColorear]'
})
export class ColorearDirective {


  constructor(private el: ElementRef) {
    //console.log("Hola mundo.!!!!!");

    this.colorear("MTTO.PREVENTIVOREALIZADO");
  }


  @Input('appColorear') nuevoColor: string;

  /* MTTO.PREVENTIVOPROGRAMADO = gray
  MTTO.PREVENTIVO REALIZADO = green
  EQUIPO FUERA DE SERVICIO = red
  MTTO.CORRECTIVO = blue
  EQUIPO EN GARANTIA = orange
  REPROGRAMACIÓN yellow
  */


  private colorear(estado: string) {
    if (estado == "MTTO.PREVENTIVOPROGRAMADO") {
      this.el.nativeElement.style.backgroundColor = "gray";

    } else if (estado == "MTTO.PREVENTIVOREALIZADO") {
      this.el.nativeElement.style.backgroundColor = "lime";

    } else if (estado == "EQUIPOFUERADESERVICIO") {
      this.el.nativeElement.style.backgroundColor = "red";

    } else if (estado == "MTTO.CORRECTIVO") {
      this.el.nativeElement.style.backgroundColor = "blue";

    } else if (estado == "EQUIPOENGARANTIA") {
      this.el.nativeElement.style.backgroundColor = "orange";

    } else if (estado == "REPROGRAMACIÓN") {
      this.el.nativeElement.style.backgroundColor = "yellow";

    } else if (estado == "N/P") {
      this.el.nativeElement.style.backgroundColor = "white";
    }

  }

}

