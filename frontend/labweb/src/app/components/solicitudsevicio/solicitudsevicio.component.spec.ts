import { ComponentFixture, TestBed } from '@angular/core/testing';

import { SolicitudsevicioComponent } from './solicitudsevicio.component';

describe('SolicitudsevicioComponent', () => {
  let component: SolicitudsevicioComponent;
  let fixture: ComponentFixture<SolicitudsevicioComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ SolicitudsevicioComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(SolicitudsevicioComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
