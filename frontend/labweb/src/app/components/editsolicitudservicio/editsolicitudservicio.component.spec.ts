import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EditsolicitudservicioComponent } from './editsolicitudservicio.component';

describe('EditsolicitudservicioComponent', () => {
  let component: EditsolicitudservicioComponent;
  let fixture: ComponentFixture<EditsolicitudservicioComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ EditsolicitudservicioComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(EditsolicitudservicioComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
