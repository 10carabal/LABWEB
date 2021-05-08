import { ComponentFixture, TestBed } from '@angular/core/testing';

import { Getrma002Component } from './getrma002.component';

describe('Getrma002Component', () => {
  let component: Getrma002Component;
  let fixture: ComponentFixture<Getrma002Component>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ Getrma002Component ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(Getrma002Component);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
