import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EditadquisicionComponent } from './editadquisicion.component';

describe('EditadquisicionComponent', () => {
  let component: EditadquisicionComponent;
  let fixture: ComponentFixture<EditadquisicionComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ EditadquisicionComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(EditadquisicionComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
