import { Injectable } from '@angular/core';

@Injectable({
  providedIn: 'root'
})
export class EtudiantService {
  etudiants:any
  constructor() {
    this.etudiants=[
      {"id":1,"nom":"Ismail","age":22},
      {"id":2,"nom":"Oualid","age":25},
      {"id":3,"nom":"Ahmed","age":18},
    ]
  }

  getAllEtudiants(){
    return this.etudiants;
  }

  addEtudiant(etudiant:any){
    this.etudiants.push(etudiant)
  }
}
