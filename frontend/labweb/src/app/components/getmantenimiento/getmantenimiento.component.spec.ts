import { ComponentFixture, TestBed } from '@angular/core/testing';

import { GetmantenimientoComponent } from './getmantenimiento.component';

describe('GetmantenimientoComponent', () => {
  let component: GetmantenimientoComponent;
  let fixture: ComponentFixture<GetmantenimientoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ GetmantenimientoComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(GetmantenimientoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
