import { ComponentFixture, TestBed } from '@angular/core/testing';

import { GetdocumentosproveedorComponent } from './getdocumentosproveedor.component';

describe('GetdocumentosproveedorComponent', () => {
  let component: GetdocumentosproveedorComponent;
  let fixture: ComponentFixture<GetdocumentosproveedorComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ GetdocumentosproveedorComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(GetdocumentosproveedorComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
