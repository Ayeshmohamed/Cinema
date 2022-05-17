import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup, Validators } from '@angular/forms';
import { Router } from '@angular/router';
import { GeneralAttrService } from 'src/app/general-attr.service';

@Component({
  selector: 'app-login',
  templateUrl: './login.component.html',
  styleUrls: ['./login.component.scss']
})
export class LoginComponent implements OnInit {

  error = null;
  message = null;
  authFrom = new FormGroup({
    email: new FormControl('',
      [
        Validators.required,
        Validators.email,
        Validators.maxLength(191),
      ]),
    password: new FormControl('', [
      Validators.required,
      Validators.minLength(6),
    ])
  });

  constructor(private http: HttpClient, private router: Router, public generalAttr: GeneralAttrService) { }
  userObject = null;

  ngOnInit(): void {

  }

  get email() { return this.authFrom.get('email'); }
  get password() { return this.authFrom.get('password'); }

  login() {
    let headers = new Headers();
    headers.append('Content-Type', 'application/json');

    let login_url = this.generalAttr.baseUrl + '/auth/login';
    let body = this.authFrom.value;
    if (this.authFrom.valid) {
      this.http.post(login_url, body, {
        headers: new HttpHeaders({
          'Access-Control-Allow-Origin': '*'
        })
      }).subscribe((response:any) => {
        if (response.token) {
          localStorage.setItem('token', response.token);
          setTimeout(function () {
            localStorage.removeItem('token');
          }, 1000  * 60);
          this.router.navigate(['/movies']);

        }
      },
        (error) => {
          this.error = error.error.message;
        }
      );
    }
  }

}
