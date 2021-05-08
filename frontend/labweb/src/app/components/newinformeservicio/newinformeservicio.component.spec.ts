import { ComponentFixture, TestBed } from '@angular/core/testing';

import { NewinformeservicioComponent } from './newinformeservicio.component';

describe('NewinformeservicioComponent', () => {
  let component: NewinformeservicioComponent;
  let fixture: ComponentFixture<NewinformeservicioComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ NewinformeservicioComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(NewinformeservicioComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
