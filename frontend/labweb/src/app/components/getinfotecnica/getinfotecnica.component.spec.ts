import { ComponentFixture, TestBed } from '@angular/core/testing';

import { GetinfotecnicaComponent } from './getinfotecnica.component';

describe('GetinfotecnicaComponent', () => {
  let component: GetinfotecnicaComponent;
  let fixture: ComponentFixture<GetinfotecnicaComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ GetinfotecnicaComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(GetinfotecnicaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
