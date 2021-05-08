import { ComponentFixture, TestBed } from '@angular/core/testing';

import { NewdocumentosproveedorComponent } from './newdocumentosproveedor.component';

describe('NewdocumentosproveedorComponent', () => {
  let component: NewdocumentosproveedorComponent;
  let fixture: ComponentFixture<NewdocumentosproveedorComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ NewdocumentosproveedorComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(NewdocumentosproveedorComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
