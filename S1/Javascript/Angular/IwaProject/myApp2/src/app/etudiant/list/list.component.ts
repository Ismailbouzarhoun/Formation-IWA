import { CommonModule } from '@angular/common';
import { Component, ViewChild } from '@angular/core';
import { EtudiantService } from '../etudiant.service';
import { LoupeComponent } from "./loupe/loupe.component";
import { ConfirmComponent } from './confirm/confirm.component';

@Component({
    selector: 'app-list',
    standalone: true,
    templateUrl: './list.component.html',
    styleUrl: './list.component.css',
    imports: [CommonModule, LoupeComponent]
})
export class ListComponent {
    etudiants:any
    @ViewChild("nomLoupe") loupeComponent!:LoupeComponent;

    constructor(private etudiantService:EtudiantService){}

    ngOnInit(){
      this.etudiants=this.etudiantService.getEtudiants();
    }

    ngAfterViewInit() {
      this.etudiants=this.etudiantService.getEtudiants()
    }

    filtrer(nom:string){
      this.etudiants=this.etudiantService.filterEtudiantByNom(nom)
    }

    deleteEtudiant(etudiant:any){
      this.etudiantService.deleteEtudiant(etudiant.id)
      const indexToRemove=this.etudiants.indexOf(etudiant)
      this.etudiants.splice(indexToRemove, 1);
    }

    openModal(etudiant:any){
      // const dialogRef = this.modal.open(ConfirmComponent)
      // dialogRef.componentInstance.nom=etudiant.nom
      // dialogRef.result.then(data=>{
      //   if(data=='ok'){
      //     this.deleteEtudiant(etudiant)
      //   }
      // })
    }
}
