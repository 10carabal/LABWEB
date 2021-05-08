import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EditfabricantesproveedoresComponent } from './editfabricantesproveedores.component';

describe('EditfabricantesproveedoresComponent', () => {
  let component: EditfabricantesproveedoresComponent;
  let fixture: ComponentFixture<EditfabricantesproveedoresComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ EditfabricantesproveedoresComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(EditfabricantesproveedoresComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
