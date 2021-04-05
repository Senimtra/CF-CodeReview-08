import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss'],
})
export class HomeComponent implements OnInit {
  clickCounter: number = 0;

  constructor() {}

  // countClick() {
  //   this.clickCounter++;
  // }

  scroll(el: HTMLElement) {
    el.scrollIntoView();
  }

  // countClick() {
  //   document.querySelector('div.row').scrollLeft += 500;
  // }

  ngOnInit(): void {}
}
