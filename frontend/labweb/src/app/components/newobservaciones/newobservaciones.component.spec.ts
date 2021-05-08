import { ComponentFixture, TestBed } from '@angular/core/testing';

import { NewobservacionesComponent } from './newobservaciones.component';

describe('NewobservacionesComponent', () => {
  let component: NewobservacionesComponent;
  let fixture: ComponentFixture<NewobservacionesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ NewobservacionesComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(NewobservacionesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
