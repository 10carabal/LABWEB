import { ComponentFixture, TestBed } from '@angular/core/testing';

import { Newrma004Component } from './newrma004.component';

describe('Newrma004Component', () => {
  let component: Newrma004Component;
  let fixture: ComponentFixture<Newrma004Component>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ Newrma004Component ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(Newrma004Component);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
