import { Routes } from '@angular/router';
import { ParentComponent } from './parent/parent.component';
import { SignupComponent } from './signup/signup.component';

export const routes: Routes = [
    {path:"parent", component:ParentComponent},
    {path:"signup", component:SignupComponent}
];
