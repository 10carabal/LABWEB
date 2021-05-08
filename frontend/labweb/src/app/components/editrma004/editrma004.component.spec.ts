import { ComponentFixture, TestBed } from '@angular/core/testing';

import { Editrma004Component } from './editrma004.component';

describe('Editrma004Component', () => {
  let component: Editrma004Component;
  let fixture: ComponentFixture<Editrma004Component>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ Editrma004Component ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(Editrma004Component);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
