import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'app-contact',
  templateUrl: './contact.component.html',
  styleUrls: ['./contact.component.scss'],
})
export class ContactComponent implements OnInit {
  constructor() {}

  scroll(el: HTMLElement) {
    el.scrollIntoView({
      behavior: 'smooth',
      // block: 'nearest',
      // inline: 'start',
    });
  }

  ngOnInit(): void {}
}
