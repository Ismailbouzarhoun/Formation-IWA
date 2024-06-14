import { Component } from '@angular/core';
import { FormBuilder, ReactiveFormsModule, Validators } from '@angular/forms';
import { EtudiantService } from '../etudiant.service';
import { NgbActiveModal } from '@ng-bootstrap/ng-bootstrap';

@Component({
  selector: 'app-form',
  standalone: true,
  imports: [ReactiveFormsModule],
  templateUrl: './form.component.html',
  styleUrl: './form.component.css'
})
export class FormComponent {
  formEtudiant = this.fb.group({
    "id":['', Validators.required],
    "nom":['', Validators.required],
    "age":['', Validators.required],
  })

  constructor(private fb:FormBuilder,private etudiantService:EtudiantService, private activeModal:NgbActiveModal){}

  ajouterEtudiant(){
    this.etudiantService.addEtudiant(this.formEtudiant.value)
    this.activeModal.close()
  }

  fermer(){
    this.activeModal.close()
  }
}
