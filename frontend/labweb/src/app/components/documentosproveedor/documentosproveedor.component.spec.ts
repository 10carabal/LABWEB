import { ComponentFixture, TestBed } from '@angular/core/testing';

import { DocumentosproveedorComponent } from './documentosproveedor.component';

describe('DocumentosproveedorComponent', () => {
  let component: DocumentosproveedorComponent;
  let fixture: ComponentFixture<DocumentosproveedorComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ DocumentosproveedorComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(DocumentosproveedorComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
