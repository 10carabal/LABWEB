import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EditmatrizsolicitudesComponent } from './editmatrizsolicitudes.component';

describe('EditmatrizsolicitudesComponent', () => {
  let component: EditmatrizsolicitudesComponent;
  let fixture: ComponentFixture<EditmatrizsolicitudesComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ EditmatrizsolicitudesComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(EditmatrizsolicitudesComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
