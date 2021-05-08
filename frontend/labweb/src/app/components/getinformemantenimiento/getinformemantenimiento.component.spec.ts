import { ComponentFixture, TestBed } from '@angular/core/testing';

import { GetinformemantenimientoComponent } from './getinformemantenimiento.component';

describe('GetinformemantenimientoComponent', () => {
  let component: GetinformemantenimientoComponent;
  let fixture: ComponentFixture<GetinformemantenimientoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ GetinformemantenimientoComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(GetinformemantenimientoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
