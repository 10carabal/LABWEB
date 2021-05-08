import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CronogramaMantenimientoComponent } from './cronograma-mantenimiento.component';

describe('CronogramaMantenimientoComponent', () => {
  let component: CronogramaMantenimientoComponent;
  let fixture: ComponentFixture<CronogramaMantenimientoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ CronogramaMantenimientoComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(CronogramaMantenimientoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
