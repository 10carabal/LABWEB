import { ComponentFixture, TestBed } from '@angular/core/testing';

import { GetinfoinstitucionalComponent } from './getinfoinstitucional.component';

describe('GetinfoinstitucionalComponent', () => {
  let component: GetinfoinstitucionalComponent;
  let fixture: ComponentFixture<GetinfoinstitucionalComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ GetinfoinstitucionalComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(GetinfoinstitucionalComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
