import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EditfuncionalidadComponent } from './editfuncionalidad.component';

describe('EditfuncionalidadComponent', () => {
  let component: EditfuncionalidadComponent;
  let fixture: ComponentFixture<EditfuncionalidadComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ EditfuncionalidadComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(EditfuncionalidadComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
