import { ComponentFixture, TestBed } from '@angular/core/testing';

import { NewRMA002Component } from './new-rma002.component';

describe('NewRMA002Component', () => {
  let component: NewRMA002Component;
  let fixture: ComponentFixture<NewRMA002Component>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ NewRMA002Component ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(NewRMA002Component);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
