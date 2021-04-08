import { Component, OnInit } from '@angular/core';
import {
  ReactiveFormsModule,
  FormControl,
  FormGroup,
  Validators,
} from '@angular/forms';

@Component({
  selector: 'app-contact',
  templateUrl: './contact.component.html',
  styleUrls: ['./contact.component.scss'],
})
export class ContactComponent implements OnInit {
  contactForm = new FormGroup({
    fName: new FormControl('', [Validators.min(3), Validators.required]),
    lName: new FormControl('', [Validators.min(3), Validators.required]),
    email: new FormControl('', [Validators.email, Validators.required]),
    msg: new FormControl(''),
  });

  constructor() {}

  scroll(el: HTMLElement) {
    el.scrollIntoView({
      behavior: 'smooth',
      // block: 'nearest',
      // inline: 'start',
    });
  }

  ngOnInit(): void {}

  onSubmit() {
    if (this.contactForm.valid) {
      var contactInfo = this.contactForm.value;
      console.log(contactInfo);
      alert('Thanks for your message!');
    } else {
      alert('Please fill out the required fields correctly.');
    }
  }
}
