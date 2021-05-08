import { ComponentFixture, TestBed } from '@angular/core/testing';

import { InfotecnicaComponent } from './infotecnica.component';

describe('InfotecnicaComponent', () => {
  let component: InfotecnicaComponent;
  let fixture: ComponentFixture<InfotecnicaComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ InfotecnicaComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(InfotecnicaComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
