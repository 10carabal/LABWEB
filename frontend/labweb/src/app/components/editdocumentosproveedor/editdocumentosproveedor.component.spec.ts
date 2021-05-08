import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EditdocumentosproveedorComponent } from './editdocumentosproveedor.component';

describe('EditdocumentosproveedorComponent', () => {
  let component: EditdocumentosproveedorComponent;
  let fixture: ComponentFixture<EditdocumentosproveedorComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ EditdocumentosproveedorComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(EditdocumentosproveedorComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
