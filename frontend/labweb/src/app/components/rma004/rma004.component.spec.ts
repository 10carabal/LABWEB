import { ComponentFixture, TestBed } from '@angular/core/testing';

import { Rma004Component } from './rma004.component';

describe('Rma004Component', () => {
  let component: Rma004Component;
  let fixture: ComponentFixture<Rma004Component>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ Rma004Component ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(Rma004Component);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
