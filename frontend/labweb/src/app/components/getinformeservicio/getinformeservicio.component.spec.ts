import { ComponentFixture, TestBed } from '@angular/core/testing';

import { GetinformeservicioComponent } from './getinformeservicio.component';

describe('GetinformeservicioComponent', () => {
  let component: GetinformeservicioComponent;
  let fixture: ComponentFixture<GetinformeservicioComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ GetinformeservicioComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(GetinformeservicioComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
