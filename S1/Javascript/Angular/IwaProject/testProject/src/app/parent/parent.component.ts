import { Component, ViewChild } from '@angular/core';
import { ChildComponent } from "./child/child.component";
import { FormsModule } from '@angular/forms';

@Component({
    selector: 'app-parent',
    standalone: true,
    templateUrl: './parent.component.html',
    styleUrl: './parent.component.css',
    imports: [ChildComponent, FormsModule]
})
export class ParentComponent {
    @ViewChild("idChild") 
    childComponent!:ChildComponent
    parentValue="A"
    constructor(){}
    fromChild(){
        this.parentValue=this.childComponent.childValue
        console.log("From child"+this.childComponent.childValue)
    }

    toChild(){
        this.childComponent.childValue=this.parentValue
        console.log("To child"+this.parentValue)
    }
}
