import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class GeneralAttrService {

  baseUrl = "http://127.0.0.1:8000/api/v1";
  imagePath = "http://127.0.0.1:8000/storage/"
  redirectBaseUrl = "http://localhost:4200/";

  constructor() {}
}
