import { ComponentFixture, TestBed } from '@angular/core/testing';

import { InfoinstitucionalComponent } from './infoinstitucional.component';

describe('InfoinstitucionalComponent', () => {
  let component: InfoinstitucionalComponent;
  let fixture: ComponentFixture<InfoinstitucionalComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ InfoinstitucionalComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(InfoinstitucionalComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
