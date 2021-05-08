import { ComponentFixture, TestBed } from '@angular/core/testing';

import { NewinformemantenimientoComponent } from './newinformemantenimiento.component';

describe('NewinformemantenimientoComponent', () => {
  let component: NewinformemantenimientoComponent;
  let fixture: ComponentFixture<NewinformemantenimientoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ NewinformemantenimientoComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(NewinformemantenimientoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
