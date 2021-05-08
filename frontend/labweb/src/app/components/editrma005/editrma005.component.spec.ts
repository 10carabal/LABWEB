import { ComponentFixture, TestBed } from '@angular/core/testing';

import { Editrma005Component } from './editrma005.component';

describe('Editrma005Component', () => {
  let component: Editrma005Component;
  let fixture: ComponentFixture<Editrma005Component>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ Editrma005Component ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(Editrma005Component);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
