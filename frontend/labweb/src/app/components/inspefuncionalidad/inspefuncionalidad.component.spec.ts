import { ComponentFixture, TestBed } from '@angular/core/testing';

import { InspefuncionalidadComponent } from './inspefuncionalidad.component';

describe('InspefuncionalidadComponent', () => {
  let component: InspefuncionalidadComponent;
  let fixture: ComponentFixture<InspefuncionalidadComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ InspefuncionalidadComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(InspefuncionalidadComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
