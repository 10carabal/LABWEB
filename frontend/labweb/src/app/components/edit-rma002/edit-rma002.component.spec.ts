import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EditRMA002Component } from './edit-rma002.component';

describe('EditRMA002Component', () => {
  let component: EditRMA002Component;
  let fixture: ComponentFixture<EditRMA002Component>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ EditRMA002Component ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(EditRMA002Component);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
