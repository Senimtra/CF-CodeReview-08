import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';

import { AppRoutingModule } from './app-routing.module';
import { AppComponent } from './app.component';
import { HomeComponent } from './home/home.component';
import { HeadBarComponent } from './head-bar/head-bar.component';
import { FooBarComponent } from './foo-bar/foo-bar.component';

@NgModule({
  declarations: [AppComponent, HomeComponent, HeadBarComponent, FooBarComponent],
  imports: [BrowserModule, AppRoutingModule],
  providers: [],
  bootstrap: [AppComponent],
})
export class AppModule {}
