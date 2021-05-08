import { ComponentFixture, TestBed } from '@angular/core/testing';

import { NewmatrizsolicitudesComponent } from './newmatrizsolicitudes.component';

describe('NewmatrizsolicitudesComponent', () => {
  let component: NewmatrizsolicitudesComponent;
  let fixture: ComponentFixture<NewmatrizsolicitudesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ NewmatrizsolicitudesComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(NewmatrizsolicitudesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
