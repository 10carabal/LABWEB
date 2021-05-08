import { ComponentFixture, TestBed } from '@angular/core/testing';

import { NewsolicitudservicioComponent } from './newsolicitudservicio.component';

describe('NewsolicitudservicioComponent', () => {
  let component: NewsolicitudservicioComponent;
  let fixture: ComponentFixture<NewsolicitudservicioComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ NewsolicitudservicioComponent ]
    })
    .compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(NewsolicitudservicioComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
