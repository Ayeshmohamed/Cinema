import { Injectable } from '@angular/core';
import { CanActivate, Router } from '@angular/router';

@Injectable({
  providedIn: 'root'
})
export class GuestAuthService implements CanActivate {

  user = JSON.parse(localStorage.getItem('user') || '{}');
  constructor(public router: Router) { }

  canActivate() {
      return true
  }

}
