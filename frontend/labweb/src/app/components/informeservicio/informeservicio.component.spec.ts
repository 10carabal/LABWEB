import { ComponentFixture, TestBed } from '@angular/core/testing';

import { InformeservicioComponent } from './informeservicio.component';

describe('InformeservicioComponent', () => {
  let component: InformeservicioComponent;
  let fixture: ComponentFixture<InformeservicioComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ InformeservicioComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(InformeservicioComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
