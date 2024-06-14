import { Component } from '@angular/core';
import { FormsModule } from '@angular/forms';
import { ListComponent } from '../list.component';

@Component({
  selector: 'app-loupe',
  standalone: true,
  imports: [FormsModule],
  templateUrl: './loupe.component.html',
  styleUrl: './loupe.component.css'
})
export class LoupeComponent {
  opacity :string
  value:string
  constructor(private listComponent:ListComponent){
    this.opacity = "0"
    this.value = ""
  }
  afficherInput(){
    this.opacity="1"
  }
  masquerInput(){
    if ((this.value==undefined)||(this.value==""))
    this.opacity="0"
  }
  reload(){
    this.listComponent.ngAfterViewInit()
  }
}
