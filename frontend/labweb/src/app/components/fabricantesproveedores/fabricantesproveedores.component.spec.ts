import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FabricantesproveedoresComponent } from './fabricantesproveedores.component';

describe('FabricantesproveedoresComponent', () => {
  let component: FabricantesproveedoresComponent;
  let fixture: ComponentFixture<FabricantesproveedoresComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ FabricantesproveedoresComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(FabricantesproveedoresComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
