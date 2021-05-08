import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EditinformemantenimientoComponent } from './editinformemantenimiento.component';

describe('EditinformemantenimientoComponent', () => {
  let component: EditinformemantenimientoComponent;
  let fixture: ComponentFixture<EditinformemantenimientoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ EditinformemantenimientoComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(EditinformemantenimientoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
