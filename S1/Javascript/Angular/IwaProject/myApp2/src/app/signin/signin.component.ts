import { HttpClient, HttpClientModule, HttpHeaders } from '@angular/common/http';
import { Component } from '@angular/core';
import { FormBuilder, ReactiveFormsModule } from '@angular/forms';

@Component({
  selector: 'app-signin',
  standalone: true,
  imports: [ReactiveFormsModule,HttpClientModule],
  templateUrl: './signin.component.html',
  styleUrl: './signin.component.css'
})
export class SigninComponent {
  formData=this.fb.group({
    username:[],
    password:[],
  })
  constructor(private fb:FormBuilder, private http:HttpClient){

  }
  signin() {
    const username=this.formData.controls.username.value
    const password = this.formData.controls.password.value
    const credentials=btoa(username+":"+password)
    const headers = new HttpHeaders({Authorization:"Basic "+credentials})
    this.http.get("http://localhost:8080/user",{headers}).subscribe(data=>{
      console.log(data)
    })
  }
}
