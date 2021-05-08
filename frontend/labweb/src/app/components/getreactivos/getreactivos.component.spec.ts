import { ComponentFixture, TestBed } from '@angular/core/testing';

import { GetreactivosComponent } from './getreactivos.component';

describe('GetreactivosComponent', () => {
  let component: GetreactivosComponent;
  let fixture: ComponentFixture<GetreactivosComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ GetreactivosComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(GetreactivosComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
