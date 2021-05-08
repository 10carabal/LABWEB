import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EditclasificacionComponent } from './editclasificacion.component';

describe('EditclasificacionComponent', () => {
  let component: EditclasificacionComponent;
  let fixture: ComponentFixture<EditclasificacionComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ EditclasificacionComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(EditclasificacionComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
