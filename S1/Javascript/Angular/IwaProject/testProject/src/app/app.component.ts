import { Component } from '@angular/core';
import { CommonModule } from '@angular/common';
import { RouterOutlet } from '@angular/router';
import { ParentComponent } from "./parent/parent.component";
import { FormComponent } from "./form/form.component";
import { SignupComponent } from "./signup/signup.component";

@Component({
    selector: 'app-root',
    standalone: true,
    templateUrl: './app.component.html',
    styleUrl: './app.component.css',
    imports: [CommonModule, RouterOutlet, ParentComponent, FormComponent, SignupComponent]
})
export class AppComponent {
  title = 'testProject';
}
