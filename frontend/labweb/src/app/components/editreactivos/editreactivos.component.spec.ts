import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EditreactivosComponent } from './editreactivos.component';

describe('EditreactivosComponent', () => {
  let component: EditreactivosComponent;
  let fixture: ComponentFixture<EditreactivosComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ EditreactivosComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(EditreactivosComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
