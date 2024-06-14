import { Component, Output, EventEmitter } from '@angular/core';
import { FormsModule } from '@angular/forms';

@Component({
  selector: 'app-loupe',
  standalone: true,
  imports: [FormsModule],
  templateUrl: './loupe.component.html',
  styleUrl: './loupe.component.css'
})
export class LoupeComponent {
  @Output() childEvent = new EventEmitter();
  opacity:string
  valeur!:string

  constructor(){
    this.opacity= "0"
  }

  afficherInput(){
    this.opacity="1"
  }
  masquerInput(){
    if((this.valeur==undefined)||(this.valeur==""))
    this.opacity="0"
  }
  // reload(){
  //   this.listComponent.ngAfterViewInit();
  // }

  filterData(){
    this.childEvent.emit(this.valeur)
  }
}
