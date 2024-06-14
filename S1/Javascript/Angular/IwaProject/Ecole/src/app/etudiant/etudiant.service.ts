import { HttpClient } from '@angular/common/http';
import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class EtudiantService {
  etudiants:any
  backendURL="http://localhost:8080/students"

  constructor(private http:HttpClient) {

  }

  getEtudiants(){
    this.http.get(this.backendURL).subscribe(data=>{
      this.etudiants=data
    })
    return this.etudiants;
  }

  addEtudiant(etudiant:any){
    this.http.post(this.backendURL,etudiant).subscribe(data=>{
      this.etudiants.push(etudiant)
    })
    }
    deleteEtudiant(idEtudiant:any){
      this.http.delete(this.backendURL+"/"+idEtudiant).subscribe(data=>{
      })
    }
    filterEtudiantsByNom(nom:string){
      // return this.etudiants.filter(etudiant =>
      // etudiant.nom.toLowerCase().startsWith(nom.toLowerCase()));
    }   
}