import { ComponentFixture, TestBed } from '@angular/core/testing';

import { Rma005Component } from './rma005.component';

describe('Rma005Component', () => {
  let component: Rma005Component;
  let fixture: ComponentFixture<Rma005Component>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ Rma005Component ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(Rma005Component);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
