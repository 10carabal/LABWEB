import { ComponentFixture, TestBed } from '@angular/core/testing';

import { MatrizsolicitudesComponent } from './matrizsolicitudes.component';

describe('MatrizsolicitudesComponent', () => {
  let component: MatrizsolicitudesComponent;
  let fixture: ComponentFixture<MatrizsolicitudesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ MatrizsolicitudesComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(MatrizsolicitudesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
