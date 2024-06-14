import { HttpClient, HttpClientModule } from '@angular/common/http';
import { Component } from '@angular/core';
import { FormBuilder, ReactiveFormsModule, Validators } from '@angular/forms';

@Component({
  selector: 'app-signup',
  standalone: true,
  imports: [ReactiveFormsModule, HttpClientModule],
  templateUrl: './signup.component.html',
  styleUrl: './signup.component.css'
})
export class SignupComponent {
  formData=this.fb.group({
    "username":["",Validators.required],
    "password":["",Validators.required],
    "role":["USER_ROLE"],
    "active":["1"]
  })
  constructor(private fb:FormBuilder,private http:HttpClient){
  }
  signUp(){
    this.http.post("http://localhost:8080/users/signup",this.formData.value).subscribe
  }
}
