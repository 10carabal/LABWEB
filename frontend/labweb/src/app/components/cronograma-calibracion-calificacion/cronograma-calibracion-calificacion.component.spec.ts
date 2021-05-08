import { ComponentFixture, TestBed } from '@angular/core/testing';

import { CronogramaCalibracionCalificacionComponent } from './cronograma-calibracion-calificacion.component';

describe('CronogramaCalibracionCalificacionComponent', () => {
  let component: CronogramaCalibracionCalificacionComponent;
  let fixture: ComponentFixture<CronogramaCalibracionCalificacionComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ CronogramaCalibracionCalificacionComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(CronogramaCalibracionCalificacionComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
