import { ComponentFixture, TestBed } from '@angular/core/testing';

import { NewfabricantesproveedoresComponent } from './newfabricantesproveedores.component';

describe('NewfabricantesproveedoresComponent', () => {
  let component: NewfabricantesproveedoresComponent;
  let fixture: ComponentFixture<NewfabricantesproveedoresComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ NewfabricantesproveedoresComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(NewfabricantesproveedoresComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
