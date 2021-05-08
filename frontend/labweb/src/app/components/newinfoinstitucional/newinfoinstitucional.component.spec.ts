import { ComponentFixture, TestBed } from '@angular/core/testing';

import { NewinfoinstitucionalComponent } from './newinfoinstitucional.component';

describe('NewinfoinstitucionalComponent', () => {
  let component: NewinfoinstitucionalComponent;
  let fixture: ComponentFixture<NewinfoinstitucionalComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ NewinfoinstitucionalComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(NewinfoinstitucionalComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
