import { ComponentFixture, TestBed } from '@angular/core/testing';

import { GetmatrizsolicitudesComponent } from './getmatrizsolicitudes.component';

describe('GetmatrizsolicitudesComponent', () => {
  let component: GetmatrizsolicitudesComponent;
  let fixture: ComponentFixture<GetmatrizsolicitudesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ GetmatrizsolicitudesComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(GetmatrizsolicitudesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
