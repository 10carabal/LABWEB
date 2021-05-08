import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EditinformeservicioComponent } from './editinformeservicio.component';

describe('EditinformeservicioComponent', () => {
  let component: EditinformeservicioComponent;
  let fixture: ComponentFixture<EditinformeservicioComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ EditinformeservicioComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(EditinformeservicioComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
