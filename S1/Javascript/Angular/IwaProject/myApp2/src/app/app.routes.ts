import { Routes } from '@angular/router';
import { EtudiantComponent } from './etudiant/etudiant.component';
import { SugnupComponent } from './sugnup/sugnup.component';
import { SigninComponent } from './signin/signin.component';

export const routes: Routes = [
    {path:"",redirectTo:"signup",pathMatch:'full'},
    {path:"etudiant", component:EtudiantComponent},
    {path:"signup", component:SugnupComponent},
    {path:"signin", component:SigninComponent}
];
