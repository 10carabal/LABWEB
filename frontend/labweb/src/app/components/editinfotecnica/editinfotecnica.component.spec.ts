import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EditinfotecnicaComponent } from './editinfotecnica.component';

describe('EditinfotecnicaComponent', () => {
  let component: EditinfotecnicaComponent;
  let fixture: ComponentFixture<EditinfotecnicaComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ EditinfotecnicaComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(EditinfotecnicaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
