import { ComponentFixture, TestBed } from '@angular/core/testing';

import { NewmantenimientoComponent } from './newmantenimiento.component';

describe('NewmantenimientoComponent', () => {
  let component: NewmantenimientoComponent;
  let fixture: ComponentFixture<NewmantenimientoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ NewmantenimientoComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(NewmantenimientoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
