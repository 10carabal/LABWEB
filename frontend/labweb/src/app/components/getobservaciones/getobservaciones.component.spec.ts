import { ComponentFixture, TestBed } from '@angular/core/testing';

import { GetobservacionesComponent } from './getobservaciones.component';

describe('GetobservacionesComponent', () => {
  let component: GetobservacionesComponent;
  let fixture: ComponentFixture<GetobservacionesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ GetobservacionesComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(GetobservacionesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
