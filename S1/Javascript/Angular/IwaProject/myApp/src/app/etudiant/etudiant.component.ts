import { Component } from '@angular/core';
import { EtudiantService } from './etudiant.service';
import { CommonModule } from '@angular/common';
import { NgbModal } from '@ng-bootstrap/ng-bootstrap';
import { FormComponent } from './form/form.component';
import { FormsModule} from '@angular/forms';

@Component({
  selector: 'app-etudiant',
  standalone: true,
  imports: [CommonModule, FormsModule],
  templateUrl: './etudiant.component.html',
  styleUrl: './etudiant.component.css'
})
export class EtudiantComponent {
  etudiants:any
  filterName!:String
  constructor(private etudiantService:EtudiantService, private modal:NgbModal){
  }
  ngOnInit(){
    this.etudiants = this.etudiantService.getAllEtudiants();
  }

  open() {
    const modalRef = this.modal.open(FormComponent);
  }

  filterData(){
    this.etudiants = this.etudiantService.getAllEtudiants();
    this.etudiants = this.etudiants.filter((etudiant:{nom: string;})=>etudiant.nom.toLowerCase().includes(this.filterName.toLowerCase()))
  }
}
