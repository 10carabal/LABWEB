import { ComponentFixture, TestBed } from '@angular/core/testing';

import { NewequipoComponent } from './newequipo.component';

describe('NewequipoComponent', () => {
  let component: NewequipoComponent;
  let fixture: ComponentFixture<NewequipoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ NewequipoComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(NewequipoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
