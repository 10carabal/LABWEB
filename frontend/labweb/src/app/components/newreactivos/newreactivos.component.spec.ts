import { ComponentFixture, TestBed } from '@angular/core/testing';

import { NewreactivosComponent } from './newreactivos.component';

describe('NewreactivosComponent', () => {
  let component: NewreactivosComponent;
  let fixture: ComponentFixture<NewreactivosComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ NewreactivosComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(NewreactivosComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
