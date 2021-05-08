import { ComponentFixture, TestBed } from '@angular/core/testing';

import { Rma002Component } from './rma002.component';

describe('Rma002Component', () => {
  let component: Rma002Component;
  let fixture: ComponentFixture<Rma002Component>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ Rma002Component ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(Rma002Component);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
