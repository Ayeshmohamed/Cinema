import { NgModule } from '@angular/core';
import { RouterModule, Routes } from '@angular/router';
import { GuestAuthService } from '../guest-auth.service';
import { HallsComponent } from './halls/halls.component';
import { MoviesComponent } from './movies/movies.component';
import { ReservationComponent } from './reservation.component';

const routes: Routes = [
  { path: 'reservation', component: ReservationComponent, canActivate: [GuestAuthService] },
  { path: 'movies', component: MoviesComponent, canActivate: [GuestAuthService] },
  { path: 'halls/:movie_id', component: HallsComponent, canActivate: [GuestAuthService] }
];

@NgModule({
  imports: [RouterModule.forChild(routes)],
  exports: [RouterModule]
})
export class ReservationRoutingModule { }
