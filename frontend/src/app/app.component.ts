import { Component } from '@angular/core';
import { Http } from '@angular/http';
import 'rxjs/add/operator/map';
declare var $: any;
@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  styleUrls: ['./app.component.css']
})
export class AppComponent {
  title = 'Thantai3979';

  registerTitle = 'Register';
  showRegisterMessage = false;
  registerMessageClass = 'alert alert-warning';
  registerMessage = '';
  loading = false;
  http;

  constructor(http: Http) {
    this.http = http;
  }

  submitRegisterForm(event, fullname, email, password, cfpassword, idModal) {
    this.loading = true;
    event.preventDefault();
    if (password !== cfpassword) {
      this.showMessage(true, 'warning', 'Password did not match');
    } else {
      this.http.get('http://google.com').subscribe( (res: Response) => {
        console.log(res);
      });
      this.showMessage(true, 'success', 'Success');
    }
  }

  showMessage(isShow, type, message) {
    this.showRegisterMessage = isShow;
    this.registerMessage = message;

    switch (type) {
      case 'danger': {
        this.registerMessageClass = 'alert alert-danger';
        break;
      }
      case 'warning': {
        this.registerMessageClass = 'alert alert-warning';
        break;
      }
      case 'success': {
        this.registerMessageClass = 'alert alert-success';
        break;
      }
      case 'info': {
        this.registerMessageClass = 'alert alert-info';
        break;
      }
    }
    this.loading = false;
    setTimeout ( () => {
      this.showRegisterMessage = false;
    } , 4000);
  }
}
