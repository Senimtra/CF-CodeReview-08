import { Component, OnInit } from '@angular/core';

@Component({
  selector: 'home',
  templateUrl: './home.component.html',
  styleUrls: ['./home.component.scss'],
})
export class HomeComponent implements OnInit {
  spinCounter: number = 0;

  constructor() {}

  countSpin() {
    this.spinCounter++;
  }

  scroll(el: HTMLElement) {
    el.scrollIntoView({
      behavior: 'smooth',
      // block: 'nearest',
      // inline: 'start',
    });
  }

  // countClick() {
  //   document.querySelector('div.row').scrollLeft += 500;
  // }

  // scrollIntoView({ behavior: 'smooth', block: 'nearest', inline: 'start' })

  ngOnInit(): void {}
}
