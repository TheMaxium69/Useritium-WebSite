import {
  AfterViewInit,
  Component,
  computed,
  ElementRef,
  HostListener,
  inject,
  signal,
  ViewChild,
  ViewEncapsulation,
} from '@angular/core';
import { ITyroUiNavbarPages, TyroUiCTA, TyroUiFooter, TyroUiNavbar, TyroUiLangService } from 'tyrolium-ui';

@Component({
  selector: 'app-root',
  imports: [TyroUiNavbar, TyroUiFooter, TyroUiCTA],
  templateUrl: './app.html',
  styleUrl: './app.css',
  encapsulation: ViewEncapsulation.None,
})
export class App implements AfterViewInit {

  private readonly langService = inject(TyroUiLangService);

  @ViewChild('header') headerRef!: ElementRef<HTMLElement>;

  /* ─── Project ──────────────────────────────────────────────────────── */

  public PROJECT_NAME = 'Useritium';
  public PROJECT_LOGO = 'assets/Useritium.png';
  public url_Useritium_login = "";
  public url_Useritium_singup = "";

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
            { label: 'Independence', ancre: 'independence',  icon: 'ri-shield-check-line' }
          ]
          : [
            { label: 'Accueil',         link: '/',              icon: 'ri-home-line' },
            { label: 'Écosystème',      ancre: 'ecosystem',     icon: 'ri-apps-line' },
            { label: 'Fonctionnalités', ancre: 'features',      icon: 'ri-star-line',   children: [
                { label: 'Productivité',   ancre: 'features',      icon: 'ri-mail-line' },
                { label: 'Prestation',  ancre: 'prestations',   icon: 'ri-briefcase-line' },
                { label: 'Gaming',      ancre: 'gaming',        icon: 'ri-gamepad-line' },
              ] },
            { label: 'Indépendance',    ancre: 'independence',  icon: 'ri-shield-check-line' }
          ]
  );
  public socials: ITyroUiNavbarPages[] = [
    { label: 'linkedin',  link: 'https://www.linkedin.com/company/tyrolium/', icon: 'ri-linkedin-fill' },
    { label: 'github',    link: 'https://github.com/tyrolium',                icon: 'ri-github-fill' },
    { label: 'discord',   link: 'https://discord.com/invite/km8h5jHezt',      icon: 'ri-discord-fill' },
    { label: 'twitter',   link: 'https://x.com/TyroliumE',                    icon: 'ri-twitter-x-fill' },
  ];

  /* ─── Mouse tracking ───────────────────────────────────────────────── */

  readonly mx = signal(0);
  readonly my = signal(0);

  @HostListener('document:mousemove', ['$event'])
  onMouseMove(e: MouseEvent) {
    this.mx.set(e.clientX);
    this.my.set(e.clientY);

    if (this.headerRef?.nativeElement) {
      const rect = this.headerRef.nativeElement.getBoundingClientRect();
      this.headerRef.nativeElement.style.setProperty('--mx', (e.clientX - rect.left) + 'px');
      this.headerRef.nativeElement.style.setProperty('--my', (e.clientY - rect.top) + 'px');
    }
  }

  ngAfterViewInit() {
    if (this.headerRef?.nativeElement) {
      this.headerRef.nativeElement.style.setProperty('--mx', '50%');
      this.headerRef.nativeElement.style.setProperty('--my', '50%');
    }
  }

  /* ─── Page data ────────────────────────────────────────────────────── */

  readonly ecosystem = [
    {
      logo: 'assets/Tyrolium.png',
      name: 'Tyrolium',
      tag: 'Holding',
      tagIcon: 'ri-building-4-line',
      color: '#0533c8',
      desc: 'La holding technologique française. Développement, infrastructure, incubation — la maison mère de tous les projets.',
      descEn: 'The French tech holding. Development, infrastructure, incubation — the parent company of all projects.',
      link: 'https://tyrolium.fr',
    },
    {
      logo: 'assets/SolidServ.png',
      name: 'SolidServ',
      tag: 'Hébergement',
      tagIcon: 'ri-server-line',
      color: '#bf0000',
      desc: 'Hébergement souverain français. Vos serveurs, vos bases de données, votre infrastructure — 100% sur le territoire français.',
      descEn: 'French sovereign hosting. Your servers, databases, infrastructure — 100% on French territory.',
      link: 'https://solidserv.fr',
    },
    {
      logo: 'assets/NexiumiaCRM.png',
      name: 'NexiumiaCRM',
      tag: 'CRM',
      tagIcon: 'ri-bar-chart-box-line',
      color: '#0533c8',
      desc: 'Le CRM professionnel made in France. Gérez vos contacts, pipeline commercial et activité en un seul outil.',
      descEn: 'The professional CRM made in France. Manage your contacts, sales pipeline and business in one tool.',
      link: 'https://nexiumiacrm.fr',
    },
    {
      logo: 'assets/TyroCiel.png',
      name: 'TyroCiel',
      tag: 'Studio gaming',
      tagIcon: 'ri-gamepad-line',
      color: '#7c3aed',
      desc: 'Le studio de jeu-vidéo de Tyrolium. Créez votre profil gamer, gérez vos jeux et retrouvez vos amis.',
      descEn: 'Tyrolium\'s video game studio. Create your gamer profile, manage your games and find your friends.',
      link: 'https://tyrociel.fr',
    },
    {
      logo: 'assets/TyroServ.png',
      name: 'TyroServ',
      tag: 'Serveur gaming',
      tagIcon: 'ri-server-fill',
      color: '#059669',
      desc: 'Le serveur Minecraft original de Tyrolium. Retrouvez vos sauvegardes et votre historique depuis votre compte.',
      descEn: 'Tyrolium\'s original Minecraft server. Find your saves and history from your account.',
      link: 'https://tyroserv.fr',
    },
    {
      logo: 'assets/Influnias.png',
      name: 'Influnias',
      tag: 'Influence',
      tagIcon: 'ri-star-line',
      color: '#d97706',
      desc: 'La plateforme de mise en relation entre créateurs et marques. Votre profil Useritium est votre identité créateur.',
      descEn: 'The platform connecting creators and brands. Your Useritium profile is your creator identity.',
      link: 'https://influnias.fr',
    },
    {
      logo: 'assets/Gamenium.png',
      name: 'Gamenium',
      tag: 'Gaming',
      tagIcon: 'ri-trophy-line',
      color: '#dc2626',
      desc: 'La plateforme gaming de l\'écosystème Tyrolium. Compétitions, classements, communauté — tout via votre compte.',
      descEn: 'The gaming platform of the Tyrolium ecosystem. Competitions, rankings, community — all via your account.',
      link: 'https://gamenium.fr',
    },
  ];

  readonly features = [
    {
      icon: 'ri-global-line',
      gradient: 'linear-gradient(135deg, #0533c8, #3b82f6)',
      title: 'Connexion universelle (SSO)',
      titleEn: 'Universal sign-in (SSO)',
      desc: 'Un identifiant unique pour tous les sites Tyrolium et partenaires. Fini les dizaines de mots de passe.',
      descEn: 'One identity for all Tyrolium sites and partners. No more dozens of passwords.',
    },
    {
      icon: 'ri-mail-send-line',
      gradient: 'linear-gradient(135deg, #bf0000, #f87171)',
      title: 'Adresse mail chiffrée',
      titleEn: 'Encrypted email address',
      desc: 'exemple@useritium.fr ou exemple@tyromail.fr. Vos échanges privés, chiffrés, jamais vendus.',
      descEn: 'exemple@useritium.fr or exemple@tyromail.fr. Your private, encrypted, never-sold conversations.',
    },
    {
      icon: 'ri-cloud-line',
      gradient: 'linear-gradient(135deg, #0533c8, #bf0000)',
      title: 'Cloud personnel chiffré',
      titleEn: 'Encrypted personal cloud',
      desc: 'Photos, documents, fichiers synchronisés sur tous vos appareils. Chiffrement de bout en bout.',
      descEn: 'Photos, documents, files synced across all devices. End-to-end encryption.',
    },
    {
      icon: 'ri-file-text-line',
      gradient: 'linear-gradient(135deg, #7c3aed, #a78bfa)',
      title: 'Documents & Notes',
      titleEn: 'Documents & Notes',
      desc: 'Rédigez, organisez, partagez. Notes, tableaux et présentations synchronisés partout.',
      descEn: 'Write, organise, share. Notes, spreadsheets and presentations synced everywhere.',
    },
    {
      icon: 'ri-customer-service-2-line',
      gradient: 'linear-gradient(135deg, #059669, #34d399)',
      title: 'Panel de prestations',
      titleEn: 'Service dashboard',
      desc: 'Suivez en temps réel l\'avancement de vos projets Tyrolium. Communication directe avec nos équipes.',
      descEn: 'Track your Tyrolium projects in real time. Direct communication with our teams.',
    },
    {
      icon: 'ri-lock-password-line',
      gradient: 'linear-gradient(135deg, #d97706, #fbbf24)',
      title: 'Données chiffrées & RGPD',
      titleEn: 'Encrypted data & GDPR',
      desc: 'Vos données ne seront jamais vendues. RGPD, open source, transparent — votre confiance est notre priorité.',
      descEn: 'Your data will never be sold. GDPR, open source, transparent — your trust is our priority.',
    },
  ];

  readonly prestations = [
    {
      icon: 'ri-code-s-slash-line',
      color: '#0533c8',
      bg: 'rgba(5,51,200,0.08)',
      title: 'Développement Informatique',
      titleEn: 'Software Development',
      items: ['Sites vitrine & e-commerce', 'Applications web métier', 'API & intégrations'],
      itemsEn: ['Showcase & e-commerce sites', 'Business web applications', 'APIs & integrations'],
    },
    {
      icon: 'ri-server-line',
      color: '#bf0000',
      bg: 'rgba(191,0,0,0.08)',
      title: 'Infrastructure & Cloud',
      titleEn: 'Infrastructure & Cloud',
      items: ['Hébergement haute disponibilité', 'DevOps & automatisation', 'Monitoring & sécurité'],
      itemsEn: ['High-availability hosting', 'DevOps & automation', 'Monitoring & security'],
    },
    {
      icon: 'ri-lightbulb-line',
      color: '#7c3aed',
      bg: 'rgba(124,58,237,0.08)',
      title: 'Incubateur de projet',
      titleEn: 'Project Incubator',
      items: ['Mentorat & accompagnement', 'Réseau & partenaires', 'Pilotage de projet'],
      itemsEn: ['Mentoring & support', 'Network & partners', 'Project management'],
    },
  ];

  readonly independence = [
    { icon: 'ri-close-circle-fill', type: 'no',  title: 'Aucun actionnaire',          titleEn: 'No shareholders',          desc: '100% auto-fondé',                 descEn: '100% self-founded' },
    { icon: 'ri-close-circle-fill', type: 'no',  title: 'Aucun investissement externe', titleEn: 'No external investment',   desc: 'Financé par nos propres moyens', descEn: 'Funded by our own means' },
    { icon: 'ri-close-circle-fill', type: 'no',  title: 'Aucune levée de fonds',       titleEn: 'No fundraising',           desc: 'Jamais dilué, jamais contraint', descEn: 'Never diluted, never constrained' },
    { icon: 'ri-shield-check-fill', type: 'yes', title: 'Liberté créative totale',     titleEn: 'Total creative freedom',   desc: 'Nos règles, notre vision',       descEn: 'Our rules, our vision' },
  ];




  scrollToEco() {
    const element = document.getElementById('ecosystem');
    if (element) {
      const elementPosition = element.getBoundingClientRect().top + window.pageYOffset;
      const offsetPosition = elementPosition - 70;
      window.scrollTo({ top: offsetPosition, behavior: 'smooth' });
    }
  }
}
