import { Component, OnInit, ViewChild } from '@angular/core';
import { NgForm } from '@angular/forms';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.css'],
})

export class LoginComponent implements OnInit {
  loading: boolean;

  constructor(


  ) { }

  @ViewChild("codigo") codigo: string;

  @ViewChild("clave") clave: string;


  ngOnInit(): void { }

  async iniciarSesion(frmAutenticacion: NgForm) {

    let body = {
      codigo: frmAutenticacion.value.codigo,
      clave: frmAutenticacion.value.clave,


    };

    console.log(this.codigo),
      console.log(this.clave);

    this.loading = true;
    /* try {
      const response = await this.http
        .post(this.url1 + "/login/login.php", body, options)
        .toPromise();
      console.log("API Response : ", response);
      console.log(body);

      if (response.json() == "1") {
        console.log("entroooo");

        this.loading = false;

        //loader.dismiss()
        const toast = this.toastCtrl.create({
          message: "Bienvenido a una experiencia de Bienestar",
          //showCloseButton: true,
          //closeButtonText: 'Ok',
          duration: 3000,
        });
        toast.present();
        this._servicePerfil.getUsuarioActual(this.codigo);

        this.navCtrl.push(MenuPage, this.codigo);
      }
    } catch (error) {
      this.loading = true;

      console.error("API Error : ", error.status);
      console.error("API Error : ", JSON.stringify(error));
      console.log(body);

      let alert = this.alertCtrl.create({
        title: "ERROR",

        subTitle: "No se encontró usuario y/o contraseña, intenta nuevamente",

        buttons: ["OK"],
      });

      alert.present();
      this.loading = false;
    } */
  }
}
