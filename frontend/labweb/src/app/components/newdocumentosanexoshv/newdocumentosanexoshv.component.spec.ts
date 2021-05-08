import { ComponentFixture, TestBed } from '@angular/core/testing';

import { NewdocumentosanexoshvComponent } from './newdocumentosanexoshv.component';

describe('NewdocumentosanexoshvComponent', () => {
  let component: NewdocumentosanexoshvComponent;
  let fixture: ComponentFixture<NewdocumentosanexoshvComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ NewdocumentosanexoshvComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(NewdocumentosanexoshvComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
