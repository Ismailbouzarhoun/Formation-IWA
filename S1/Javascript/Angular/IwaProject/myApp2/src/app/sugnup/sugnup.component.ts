import { HttpClient, HttpClientModule } from '@angular/common/http';
import { Component } from '@angular/core';
import { FormBuilder, ReactiveFormsModule } from '@angular/forms';

@Component({
  selector: 'app-sugnup',
  standalone: true,
  imports: [ReactiveFormsModule,HttpClientModule],
  templateUrl: './sugnup.component.html',
  styleUrl: './sugnup.component.css'
})
export class SugnupComponent {
  formData=this.fb.group({
    username:[],
    password:[],
  })
  constructor(private fb:FormBuilder, private http:HttpClient){

  }
  signup() {
    const username=this.formData.controls.username.value
    const password = this.formData.controls.password.value
    const role = "ROLE_USER"
    const active = 1
    let user={"username":username,"password":password,"role":role,"active":active}
    console.log(user)
    this.http.post("http://localhost:8080/users/signup",user).subscribe()
  }

}
