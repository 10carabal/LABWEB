import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EditInfoInstitucionalComponent } from './edit-info-institucional.component';

describe('EditInfoInstitucionalComponent', () => {
  let component: EditInfoInstitucionalComponent;
  let fixture: ComponentFixture<EditInfoInstitucionalComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ EditInfoInstitucionalComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(EditInfoInstitucionalComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
