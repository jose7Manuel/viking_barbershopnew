import { Component } from '@angular/core';
import { HttpClient } from '@angular/common/http';

@Component({
  selector: 'app-root',
  templateUrl: './app.component.html',
  
})
export class AppComponent {
  constructor(private http: HttpClient) {}

  ngOnInit() {
    this.http.post('http://127.0.0.1:8000/clients', {
      nombre_completo: 'John Doe',
      email: 'john@example.com',
      telefono: '+59170000000',
      contraseña: 'password',
      confirmar_contraseña: 'password'
    }).subscribe(response => console.log(response));
  }
}
