import { ComponentFixture, TestBed } from '@angular/core/testing';

import { EquipocreadoComponent } from './equipocreado.component';

describe('EquipocreadoComponent', () => {
  let component: EquipocreadoComponent;
  let fixture: ComponentFixture<EquipocreadoComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ EquipocreadoComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(EquipocreadoComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
