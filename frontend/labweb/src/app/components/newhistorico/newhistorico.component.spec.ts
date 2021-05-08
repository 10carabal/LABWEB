import { ComponentFixture, TestBed } from '@angular/core/testing';

import { NewhistoricoComponent } from './newhistorico.component';

describe('NewhistoricoComponent', () => {
  let component: NewhistoricoComponent;
  let fixture: ComponentFixture<NewhistoricoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ NewhistoricoComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(NewhistoricoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
