import { ComponentFixture, TestBed } from '@angular/core/testing';

import { NewinfotecnicaComponent } from './newinfotecnica.component';

describe('NewinfotecnicaComponent', () => {
  let component: NewinfotecnicaComponent;
  let fixture: ComponentFixture<NewinfotecnicaComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ NewinfotecnicaComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(NewinfotecnicaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
