import { ComponentFixture, TestBed } from '@angular/core/testing';

import { NewclasificacionComponent } from './newclasificacion.component';

describe('NewclasificacionComponent', () => {
  let component: NewclasificacionComponent;
  let fixture: ComponentFixture<NewclasificacionComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ NewclasificacionComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(NewclasificacionComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
