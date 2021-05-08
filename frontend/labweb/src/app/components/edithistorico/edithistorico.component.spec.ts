import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EdithistoricoComponent } from './edithistorico.component';

describe('EdithistoricoComponent', () => {
  let component: EdithistoricoComponent;
  let fixture: ComponentFixture<EdithistoricoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ EdithistoricoComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(EdithistoricoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
