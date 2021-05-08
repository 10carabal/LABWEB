import { ComponentFixture, TestBed } from '@angular/core/testing';

import { NewadquisicionComponent } from './newadquisicion.component';

describe('NewadquisicionComponent', () => {
  let component: NewadquisicionComponent;
  let fixture: ComponentFixture<NewadquisicionComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ NewadquisicionComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(NewadquisicionComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
