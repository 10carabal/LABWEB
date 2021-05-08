import { ComponentFixture, TestBed } from '@angular/core/testing';

import { GethistoricoComponent } from './gethistorico.component';

describe('GethistoricoComponent', () => {
  let component: GethistoricoComponent;
  let fixture: ComponentFixture<GethistoricoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ GethistoricoComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(GethistoricoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
