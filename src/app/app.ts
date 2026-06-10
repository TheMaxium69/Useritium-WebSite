import {Component, computed, inject, ViewEncapsulation} from '@angular/core';
import {ITyroUiNavbarPages, TyroUiFooter, TyroUiLangService, TyroUiNavbar} from 'tyrolium-ui';
import {RouterOutlet} from "@angular/router";

@Component({
  selector: 'app-root',
  imports: [TyroUiNavbar, TyroUiFooter, RouterOutlet],
  templateUrl: './app.html',
  styleUrl: './app.css',
  encapsulation: ViewEncapsulation.None,
})
export class App {

  private readonly langService = inject(TyroUiLangService);

  /* ─── Project ──────────────────────────────────────────────────────── */

  public PROJECT_NAME = 'Useritium';
  public PROJECT_LOGO = 'assets/tyrolium-ui/projects/Useritium.png';

  public PROJECT_CONTENT = computed(() =>
      this.langService.lang() === 'en'
          ? `<strong>Useritium</strong> is the <strong>free universal French account</strong> by Tyrolium. One identity for the entire Tyrolium ecosystem — hosted in France by SolidServ.`
          : `<strong>Useritium</strong> est le <strong>compte universel français gratuit</strong> de Tyrolium. Une identité pour tout l'écosystème Tyrolium — hébergé en France par SolidServ.`
  );

  readonly lang = this.langService.lang;

  /* ─── Pages ────────────────────────────────────────────────────────── */

  public pages = computed<ITyroUiNavbarPages[]>(() =>
      this.langService.lang() === 'en'
          ? [
            { label: 'Home',         link: '/',              icon: 'ri-home-line' },
            { label: 'Ecosystem',    ancre: 'ecosystem',     icon: 'ri-apps-line' },
            { label: 'Features',     ancre: 'features',      icon: 'ri-star-line',   children: [
                { label: 'Productivity',  ancre: 'features',      icon: 'ri-mail-line' },
                { label: 'Services',   ancre: 'prestations',   icon: 'ri-briefcase-line' },
                { label: 'Gaming',     ancre: 'gaming',        icon: 'ri-gamepad-line' },
              ] },
            { label: 'Independence', ancre: 'independence',  icon: 'ri-shield-check-line' },
              { label: 'Access Useritium', href: 'https://dashboard.useritium.fr', icon: 'ri-rocket-line' },
          ]
          : [
            { label: 'Accueil',         link: '/',              icon: 'ri-home-line' },
            { label: 'Écosystème',      ancre: 'ecosystem',     icon: 'ri-apps-line' },
            { label: 'Fonctionnalités', ancre: 'features',      icon: 'ri-star-line',   children: [
                { label: 'Productivité',   ancre: 'features',      icon: 'ri-mail-line' },
                { label: 'Prestation',  ancre: 'prestations',   icon: 'ri-briefcase-line' },
                { label: 'Gaming',      ancre: 'gaming',        icon: 'ri-gamepad-line' },
              ] },
            { label: 'Indépendance',    ancre: 'independence',  icon: 'ri-shield-check-line' },
              { label: 'Accéder à Useritium', href: 'https://dashboard.useritium.fr', icon: 'ri-rocket-line' },
          ]
  );
}
