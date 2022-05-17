import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { Router } from '@angular/router';
import { GeneralAttrService } from 'src/app/general-attr.service';

@Component({
  selector: 'app-movies',
  templateUrl: './movies.component.html',
  styleUrls: ['./movies.component.scss']
})
export class MoviesComponent implements OnInit {

  constructor(private http: HttpClient, private router: Router, public generalAttr: GeneralAttrService) { }
  movies:any;
  token  = localStorage.getItem('token');
  ngOnInit(): void {
    this.getAllMovies();
  }

  getAllMovies() {    
    let AttributesUrl = this.generalAttr.baseUrl + '/movies/all';
    this.http.get(AttributesUrl, {
      headers: new HttpHeaders({
        'Access-Control-Allow-Origin': '*',
        'Authorization': "Bearer " + this.token,
        'Accept':"application/json",
        'Content-Type':"application/json"
      })
    }).subscribe((response:any) => {
      if (response.status) {
        this.movies = response.data;
      }
    });

  }
}
