import { ComponentFixture, TestBed } from '@angular/core/testing';

import { DocumentosanexosComponent } from './documentosanexos.component';

describe('DocumentosanexosComponent', () => {
  let component: DocumentosanexosComponent;
  let fixture: ComponentFixture<DocumentosanexosComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ DocumentosanexosComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(DocumentosanexosComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
