import { ComponentFixture, TestBed } from '@angular/core/testing';

import { GetdocumentosanexoshvComponent } from './getdocumentosanexoshv.component';

describe('GetdocumentosanexoshvComponent', () => {
  let component: GetdocumentosanexoshvComponent;
  let fixture: ComponentFixture<GetdocumentosanexoshvComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ GetdocumentosanexoshvComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(GetdocumentosanexoshvComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
