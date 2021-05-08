import { ComponentFixture, TestBed } from '@angular/core/testing';

import { FuncionalidadequiposComponent } from './funcionalidadequipos.component';

describe('FuncionalidadequiposComponent', () => {
  let component: FuncionalidadequiposComponent;
  let fixture: ComponentFixture<FuncionalidadequiposComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ FuncionalidadequiposComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(FuncionalidadequiposComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
