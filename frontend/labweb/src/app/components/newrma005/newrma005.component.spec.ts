import { ComponentFixture, TestBed } from '@angular/core/testing';

import { Newrma005Component } from './newrma005.component';

describe('Newrma005Component', () => {
  let component: Newrma005Component;
  let fixture: ComponentFixture<Newrma005Component>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ Newrma005Component ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(Newrma005Component);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
