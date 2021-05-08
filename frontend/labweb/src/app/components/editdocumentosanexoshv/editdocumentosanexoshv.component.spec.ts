import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EditdocumentosanexoshvComponent } from './editdocumentosanexoshv.component';

describe('EditdocumentosanexoshvComponent', () => {
  let component: EditdocumentosanexoshvComponent;
  let fixture: ComponentFixture<EditdocumentosanexoshvComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ EditdocumentosanexoshvComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(EditdocumentosanexoshvComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
