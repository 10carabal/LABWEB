import { ComponentFixture, TestBed } from '@angular/core/testing';

import { GetfabricantesproveedoresComponent } from './getfabricantesproveedores.component';

describe('GetfabricantesproveedoresComponent', () => {
  let component: GetfabricantesproveedoresComponent;
  let fixture: ComponentFixture<GetfabricantesproveedoresComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ GetfabricantesproveedoresComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(GetfabricantesproveedoresComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
