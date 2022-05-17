import { DatePipe } from '@angular/common';
import { HttpClient, HttpHeaders } from '@angular/common/http';
import { Component, OnInit } from '@angular/core';
import { FormControl, FormGroup } from '@angular/forms';
import { ActivatedRoute, Router } from '@angular/router';
import { GeneralAttrService } from 'src/app/general-attr.service';

@Component({
  selector: 'app-halls',
  templateUrl: './halls.component.html',
  styleUrls: ['./halls.component.scss']
})
export class HallsComponent implements OnInit {


  constructor(private http: HttpClient, private router: Router, public datepipe: DatePipe, private route: ActivatedRoute, public generalAttr: GeneralAttrService) { }
  halls: any;
  error:any;
  message:any;
  movie_id = this.route.snapshot.paramMap.get('movie_id');
  token = localStorage.getItem('token');
  ngOnInit(): void {
  }

  filterForm = new FormGroup({
    from_date: new FormControl('', []),
    to_date: new FormControl('', [])
  });

  getAllHalls(from_date: any, to_date: any) {
    let AttributesUrl = this.generalAttr.baseUrl + '/halls/all?movie_id=' + this.movie_id + '&from_date=' + from_date + '&to_date=' + to_date;
    this.http.get(AttributesUrl, {
      headers: new HttpHeaders({
        'Access-Control-Allow-Origin': '*',
        'Authorization': "Bearer " + this.token,
        'Accept': "application/json",
        'Content-Type': "application/json"
      })
    }).subscribe((response: any) => {
      if (response.status) {
        this.halls = response.data;
      }
    });

  }

  find() {
    let from_date = this.datepipe.transform(this.filterForm.get('from_date')?.value, 'yyyy-MM-dd h:mm');
    let to_date = this.datepipe.transform(this.filterForm.get('to_date')?.value, 'yyyy-MM-dd h:mm');
    console.log(from_date,
      to_date);

    this.getAllHalls(from_date, to_date);
  }

  checkBooking(bookings: any, seet_number: number) {
    let filtered = bookings.filter(function (booking: any) {
      if(booking.seet_number == seet_number){
        if(booking.status == 'confirmed'){
          return booking;
        }
      }
    });

    return filtered.length ? true : false;
  }

  makeBooking(seet_number:number,hall_id:any){
    let from_date = this.datepipe.transform(this.filterForm.get('from_date')?.value, 'yyyy-MM-dd h:mm');
    let to_date = this.datepipe.transform(this.filterForm.get('to_date')?.value, 'yyyy-MM-dd h:mm');
    let headers = new Headers();
    headers.append('Content-Type', 'application/json');

    let login_url = this.generalAttr.baseUrl + '/bookings/store';
    let body = {
      "hall_id": hall_id,
      "movie_id": this.movie_id,
      "from_date":from_date,
      "to_date":to_date,
      "seet_number":seet_number,
    };
      this.http.post(login_url, body, {
        headers: new HttpHeaders({
          'Access-Control-Allow-Origin': '*',
          'Authorization': "Bearer " + this.token,
          'Accept': "application/json",
          'Content-Type': "application/json"
                })
      }).subscribe((response:any) => {
        if (response.status) {
          this.message = response.message;
          this.getAllHalls(from_date, to_date);
        }
      },
        (error) => {
          this.error = error.error.message;
        }
      );
    
  }
}
