import { ComponentFixture, TestBed } from '@angular/core/testing';

import { NewfuncionalidadComponent } from './newfuncionalidad.component';

describe('NewfuncionalidadComponent', () => {
  let component: NewfuncionalidadComponent;
  let fixture: ComponentFixture<NewfuncionalidadComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ NewfuncionalidadComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(NewfuncionalidadComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
