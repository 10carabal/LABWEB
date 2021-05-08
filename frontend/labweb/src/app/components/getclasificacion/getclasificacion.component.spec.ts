import { ComponentFixture, TestBed } from '@angular/core/testing';

import { GetclasificacionComponent } from './getclasificacion.component';

describe('GetclasificacionComponent', () => {
  let component: GetclasificacionComponent;
  let fixture: ComponentFixture<GetclasificacionComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ GetclasificacionComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(GetclasificacionComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
