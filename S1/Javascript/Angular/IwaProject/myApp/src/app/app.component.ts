import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterOutlet } from '@angular/router';
import { EtudiantComponent } from "./etudiant/etudiant.component";

@Component({
    selector: 'app-root',
    standalone: true,
    host:{ngSkipHydration:"true"},
    templateUrl: './app.component.html',
    styleUrl: './app.component.css',
    imports: [CommonModule, RouterOutlet, EtudiantComponent]
})
export class AppComponent {
  title = 'myApp';
}
