import { Routes } from '@angular/router';
import { Home } from './pages/home/home';
import { tyroUiErrorRoutes, TyroUiSeo, tyroUiLocalizedRoutes } from 'tyrolium-ui';

/* ─── SEO (titre + description par page, FR / EN) ─────────────────────── */

const SEO_HOME: TyroUiSeo = {
  fullTitle:   { fr: 'Useritium - Compte Universel Français Gratuit', en: 'Useritium - Free French Universal Account' },
  description: { fr: "Useritium est un compte universel français gratuit. Une seule identité pour accéder à tout l'écosystème, hébergé en France par SolidServ. Une filiale de Tyrolium.", en: 'Useritium is a free French universal account. One single identity to access the whole ecosystem, hosted in France by SolidServ. A Tyrolium subsidiary.' },
};

export const routes: Routes = tyroUiLocalizedRoutes([
    { path: '',    component: Home, data: { seo: SEO_HOME } },
    ...tyroUiErrorRoutes(),
]);
