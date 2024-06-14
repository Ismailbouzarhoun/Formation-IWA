import { Component } from '@angular/core';
import { FormBuilder, ReactiveFormsModule, Validators } from '@angular/forms';
import { NgbActiveModal } from '@ng-bootstrap/ng-bootstrap';
import { EtudiantService } from '../etudiant.service';

@Component({
  selector: 'app-form',
  standalone: true,
  imports: [ReactiveFormsModule],
  templateUrl: './form.component.html',
  styleUrl: './form.component.css'
})
export class FormComponent {
  formEtudiant=this.fb.group({
    "id":['',Validators.required],
    "nom":['',Validators.required],
    "age":['',Validators.required]
    })
        
  constructor(private fb:FormBuilder,private etudianService:EtudiantService, private activeModal:NgbActiveModal){

  }
  ajouterEtudiant(){
    this.etudianService.addEtudiant(this.formEtudiant.value)
    this.fermer()
    }
    fermer() {
      this.activeModal.close()
     }
}
