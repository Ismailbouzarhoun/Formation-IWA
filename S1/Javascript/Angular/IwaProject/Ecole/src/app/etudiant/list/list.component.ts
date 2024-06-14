import { CommonModule } from '@angular/common';
import { Component, ViewChild } from '@angular/core';
import { EtudiantService } from '../etudiant.service';
import { LoupeComponent } from "./loupe/loupe.component";

@Component({
    selector: 'app-list',
    standalone: true,
    templateUrl: './list.component.html',
    styleUrl: './list.component.css',
    imports: [CommonModule, LoupeComponent]
})
export class ListComponent {
  etudiants:any
  @ViewChild("nomLoupe") loupeComponent!: LoupeComponent;
  constructor(private etudiantService: EtudiantService){}
  ngAfterViewInit() {
    const nom=this.loupeComponent.value
    if ((nom!="")&&(nom!=undefined)){
      this.etudiants=this.etudiantService.filterEtudiantsByNom(nom)
    }else{
      this.etudiants=this.etudiantService.getEtudiants()
    }
  }
  deleteEtudiant(etudiant:any) {
    const indexToRemove=this.etudiants.indexOf(etudiant)
    this.etudiants.split(indexToRemove,1);
    this.etudiantService.deleteEtudiant(etudiant.id)
  }
  }
  