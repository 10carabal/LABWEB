import { ComponentFixture, TestBed } from '@angular/core/testing';

import { InformemantenimientoComponent } from './informemantenimiento.component';

describe('InformemantenimientoComponent', () => {
  let component: InformemantenimientoComponent;
  let fixture: ComponentFixture<InformemantenimientoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ InformemantenimientoComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(InformemantenimientoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
