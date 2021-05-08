import { ComponentFixture, TestBed } from '@angular/core/testing';

import { GetsolicitudservicioComponent } from './getsolicitudservicio.component';

describe('GetsolicitudservicioComponent', () => {
  let component: GetsolicitudservicioComponent;
  let fixture: ComponentFixture<GetsolicitudservicioComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ GetsolicitudservicioComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(GetsolicitudservicioComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
