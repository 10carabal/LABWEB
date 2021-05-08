import { ComponentFixture, TestBed } from '@angular/core/testing';

import { GetadquisicionComponent } from './getadquisicion.component';

describe('GetadquisicionComponent', () => {
  let component: GetadquisicionComponent;
  let fixture: ComponentFixture<GetadquisicionComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ GetadquisicionComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(GetadquisicionComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
