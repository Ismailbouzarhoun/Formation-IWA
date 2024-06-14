import { Component } from '@angular/core';
import { FormBuilder, ReactiveFormsModule, Validators } from '@angular/forms';

@Component({
  selector: 'app-form',
  standalone: true,
  imports: [ReactiveFormsModule],
  templateUrl: './form.component.html',
  styleUrl: './form.component.css'
})
export class FormComponent {
  formData=this.fb.group({
    firstName:['',Validators.required],
    lastName:['',Validators.required],
    age:['',Validators.required]
  })
  constructor(private fb:FormBuilder){

  }

  sendData(){
    console.log(this.formData.value)
  }
}
