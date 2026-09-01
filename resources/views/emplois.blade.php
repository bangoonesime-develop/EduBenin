<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Emplois & Stages — EduBénin</title>
<meta name="description" content="Répertoire de sites d'emploi et de stage vérifiés pour les étudiants et jeunes du Bénin.">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
  /* =========================================================
     1. VARIABLES — noir / blanc / bleu clair
  ========================================================= */
  :root{
    --ink-900:#111111;
    --ink-700:#2b2b2b;
    --ink-600:#5c5c5c;
    --ink-400:#8f8f8f;
    --line:#e3e3e3;
    --paper:#ffffff;
    --bg-soft:#fafafa;
    --black:#0a0a0a;
    --sky-500:#3aa0ff;
    --sky-600:#1c86ea;
    --sky-100:#e8f4ff;
    --radius-lg:18px;
    --radius-md:12px;
    --radius-sm:8px;
    --shadow-card:0 4px 20px rgba(0,0,0,0.05);
    --shadow-hover:0 10px 26px rgba(0,0,0,0.12);
  }
  *{ box-sizing:border-box; margin:0; padding:0; }
  html{ scroll-behavior:smooth; }
  body{ font-family:'Inter', system-ui, sans-serif; color:var(--ink-900); background:var(--paper); -webkit-font-smoothing:antialiased; }
  h1,h2,h3,h4{ font-family:'Sora', sans-serif; }
  img{ max-width:100%; display:block; }
  a{ text-decoration:none; color:inherit; }
  button{ font-family:inherit; cursor:pointer; border:none; }
  ul{ list-style:none; }
  .container{ max-width:1240px; margin:0 auto; padding:0 32px; }
  @media (prefers-reduced-motion: reduce){ *{ animation:none !important; transition:none !important; } }

  /* =========================================================
     2. EN-TÊTE
  ========================================================= */
  header.site-header{ position:sticky; top:0; z-index:100; background:rgba(255,255,255,0.95); backdrop-filter:blur(8px); border-bottom:1px solid var(--line); }
  .nav-row{ display:flex; align-items:center; justify-content:space-between; height:72px; gap:24px; }
  .logo{ display:flex; align-items:center; gap:8px; font-family:'Sora', sans-serif; font-weight:800; font-size:20px; white-space:nowrap; }
  .logo .edu{ color:var(--sky-600); }
  .logo .benin{ color:var(--ink-900); }
  nav.main-nav{ display:flex; gap:32px; }
  nav.main-nav a{ font-size:14.5px; font-weight:500; color:var(--ink-600); padding:6px 2px; border-bottom:2px solid transparent; transition:color .15s ease, border-color .15s ease; }
  nav.main-nav a:hover, nav.main-nav a.active{ color:var(--ink-900); border-color:var(--sky-500); }
  .nav-actions{ display:flex; align-items:center; gap:14px; }
  .user-menu{ position:relative; }
  .user-menu-trigger{ display:flex; align-items:center; gap:10px; background:transparent; border:1px solid var(--line); border-radius:999px; padding:5px 16px 5px 5px; transition:background .15s ease; }
  .user-menu-trigger:hover{ background:var(--bg-soft); }
  .user-avatar{ width:32px; height:32px; border-radius:999px; display:flex; align-items:center; justify-content:center; color:#fff; font-family:'Sora', sans-serif; font-weight:700; font-size:13.5px; flex-shrink:0; }
  .user-fullname{ font-size:13.5px; font-weight:600; color:var(--ink-900); white-space:nowrap; max-width:160px; overflow:hidden; text-overflow:ellipsis; }
  .user-menu-dropdown{ display:none; position:absolute; top:calc(100% + 8px); right:0; background:#fff; border:1px solid var(--line); border-radius:12px; box-shadow:var(--shadow-hover); min-width:170px; overflow:hidden; z-index:200; }
  .user-menu-dropdown.open{ display:block; }
  .user-menu-dropdown form{ margin:0; }
  .user-menu-dropdown button{ width:100%; text-align:left; padding:12px 16px; font-size:13.5px; font-weight:500; color:var(--ink-900); background:transparent; transition:background .15s ease; }
  .user-menu-dropdown button:hover{ background:var(--bg-soft); }
  .icon-btn{ width:38px; height:38px; display:flex; align-items:center; justify-content:center; border-radius:999px; background:transparent; color:var(--ink-600); transition:background .15s ease; }
  .icon-btn:hover{ background:var(--bg-soft); }
  .btn{ font-size:14px; font-weight:600; padding:10px 18px; border-radius:999px; transition:transform .12s ease, box-shadow .12s ease, background .15s ease; display:inline-flex; align-items:center; gap:6px; }
  .btn:active{ transform:scale(.97); }
  .btn-ghost{ color:var(--ink-900); background:transparent; border:1px solid var(--line); }
  .btn-ghost:hover{ background:var(--bg-soft); }
  .btn-primary{ background:var(--black); color:#fff; }
  .btn-primary:hover{ box-shadow:var(--shadow-hover); }

  /* =========================================================
     3. BANDEAU DE PAGE
  ========================================================= */
  .page-banner{ background:var(--black); color:#fff; padding:52px 0 42px; }
  .page-banner .kicker{ font-size:12.5px; font-weight:700; letter-spacing:.08em; text-transform:uppercase; color:var(--sky-500); margin-bottom:14px; display:block; }
  .page-banner h1{ font-size:clamp(26px, 3.2vw, 36px); font-weight:800; max-width:640px; line-height:1.15; }
  .page-banner p{ margin-top:12px; color:#bdbdbd; font-size:15px; max-width:600px; line-height:1.6; }
  .search-bar{ margin-top:26px; display:flex; background:#fff; border-radius:999px; padding:6px; max-width:520px; }
  .search-bar input{ flex:1; border:none; outline:none; padding:12px 16px; font-size:14.5px; font-family:inherit; color:var(--ink-900); background:transparent; }
  .search-bar input::placeholder{ color:var(--ink-400); }
  .search-bar button{ background:var(--black); color:#fff; font-weight:600; font-size:14.5px; padding:12px 22px; border-radius:999px; transition:background .15s ease; }
  .search-bar button:hover{ background:var(--sky-600); }

  /* =========================================================
     4. FILTRES
  ========================================================= */
  .filter-bar{ position:sticky; top:72px; z-index:90; background:rgba(255,255,255,0.96); backdrop-filter:blur(6px); border-bottom:1px solid var(--line); padding:16px 0; }
  .filter-row{ display:flex; align-items:center; justify-content:space-between; gap:16px; flex-wrap:wrap; }
  .type-tabs{ display:flex; gap:8px; background:var(--bg-soft); border:1px solid var(--line); border-radius:999px; padding:4px; }
  .type-tabs button{ font-size:13.5px; font-weight:600; color:var(--ink-600); padding:8px 16px; border-radius:999px; background:transparent; transition:background .15s ease, color .15s ease; }
  .type-tabs button.active{ background:var(--black); color:#fff; }
  .result-count{ font-size:13px; color:var(--ink-400); }

  /* =========================================================
     5. NOTE EXPLICATIVE
  ========================================================= */
  .info-note{
    display:flex; gap:10px; align-items:flex-start; background:var(--sky-100); color:var(--ink-700);
    border-radius:var(--radius-sm); padding:14px 16px; font-size:13px; line-height:1.55; margin:24px 0;
  }
  .info-note strong{ color:var(--ink-900); }

  /* =========================================================
     6. OFFRES PUBLIÉES PAR EDUBÉNIN + RÉPERTOIRE DE SITES
  ========================================================= */
  .site-grid{ display:grid; grid-template-columns:repeat(3, 1fr); gap:20px; padding:8px 0 64px; }
  .site-card{
    background:#fff; border:1px solid var(--line); border-radius:var(--radius-md);
    padding:22px; display:flex; flex-direction:column; gap:12px;
    transition:transform .15s ease, box-shadow .15s ease, border-color .15s ease;
  }
  .site-card:hover{ transform:translateY(-3px); box-shadow:var(--shadow-hover); border-color:var(--ink-900); }
  .site-top{ display:flex; align-items:center; gap:12px; }
  .site-icon{
    width:42px; height:42px; border-radius:11px; background:var(--sky-100); color:var(--sky-600);
    display:flex; align-items:center; justify-content:center; flex-shrink:0; font-weight:800; font-size:15px;
  }
  .site-top h3{ font-size:15.5px; font-weight:700; }
  .site-domain{ font-size:11.5px; color:var(--ink-400); }
  .site-desc{ font-size:13px; color:var(--ink-600); line-height:1.55; flex:1; }
  .site-tags{ display:flex; gap:6px; flex-wrap:wrap; }
  .tag{ font-size:10.5px; font-weight:700; padding:4px 10px; border-radius:999px; text-transform:uppercase; letter-spacing:.02em; }
  .tag.emploi{ background:var(--ink-900); color:#fff; }
  .tag.stage{ background:var(--sky-500); color:#fff; }
  .tag.officiel{ background:#fff; color:var(--ink-900); border:1px solid var(--ink-900); }
  .site-footer{ margin-top:auto; padding-top:8px; }
  .site-cta{
    display:inline-flex; align-items:center; gap:6px; font-size:13px; font-weight:700; color:#fff;
    background:var(--black); padding:9px 16px; border-radius:999px; transition:background .15s ease; width:100%; justify-content:center;
  }
  .site-cta:hover{ background:var(--sky-600); }
  .site-card.is-hidden{ display:none; }
  .section-head{ display:flex; align-items:baseline; gap:10px; margin-bottom:20px; }
  .section-head h2{ font-size:20px; font-weight:700; }
  .section-head span{ font-size:13px; color:var(--ink-400); }

  footer{ background:var(--black); color:#bdbdbd; padding:44px 0 24px; }
  .footer-bottom{ display:flex; justify-content:space-between; font-size:12.5px; color:#7d7d7d; flex-wrap:wrap; gap:10px; }

  @media (max-width:960px){ .site-grid{ grid-template-columns:repeat(2, 1fr); } }
  @media (max-width:720px){
    .container{ padding:0 20px; }
    nav.main-nav{ display:none; }
    .btn-ghost{ display:none; }
    .site-grid{ grid-template-columns:1fr; }
    .filter-row{ flex-direction:column; align-items:flex-start; }
  }
</style>
</head>
<body>

  <!-- =========================================================
       EN-TÊTE
  ========================================================= -->
  <header class="site-header">
    <div class="container nav-row">
      <a href="/Acceuil" class="logo">
        <svg width="30" height="30" viewBox="0 0 48 48" fill="none">
          <path d="M6 22 L24 12 L42 22 L24 32 Z" fill="#0a0a0a"/>
          <path d="M4 24c6 2 10 8 20 10 10-2 14-8 20-10" stroke="#3aa0ff" stroke-width="4" fill="none" stroke-linecap="round"/>
          <path d="M8 26c5 2 9 7 16 8 7-1 11-6 16-8" stroke="#8f8f8f" stroke-width="3" fill="none" stroke-linecap="round"/>
        </svg>
        <span><span class="edu">Edu</span><span class="benin">Bénin</span></span>
      </a>
      <nav class="main-nav">
        <a href="/Acceuil">Accueil</a>
        <a href="/Cours">Cours</a>
        <a href="/emplois" class="active">Emplois &amp; Stages</a>
        <a href="/Bourses">Bourses</a>
        <a href="/ressources">Ressources</a>
        <a href="/communauté">Communauté</a>
      </nav>
      <div class="nav-actions">
        <button class="icon-btn" aria-label="Rechercher">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        </button>
        @guest
          <a href="/Connexion" class="btn btn-ghost">Se connecter</a>
          <a href="/Inscription" class="btn btn-primary">S'inscrire</a>
        @endguest

        @auth
          @php
            $initiale = mb_strtoupper(mb_substr(Auth::user()->prenom, 0, 1));
            $paletteAvatars = ['#2557d6', '#159862', '#e07c0b', '#d13a6b', '#5b5fe0', '#0e8a7c'];
            $couleurAvatar = $paletteAvatars[ord($initiale) % count($paletteAvatars)];
          @endphp
          <div class="user-menu">
            <button type="button" class="user-menu-trigger" id="userMenuTrigger">
              <span class="user-avatar" style="background:{{ $couleurAvatar }}">{{ $initiale }}</span>
              <span class="user-fullname">{{ Auth::user()->prenom }} {{ Auth::user()->nom }}</span>
            </button>
            <div class="user-menu-dropdown" id="userMenuDropdown">
              <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit">Se déconnecter</button>
              </form>
            </div>
          </div>
        @endauth
      </div>
    </div>
  </header>

  <!-- =========================================================
       BANDEAU DE PAGE
  ========================================================= -->
  <section class="page-banner">
    <div class="container">
      <span class="kicker">Répertoire vérifié</span>
      <h1>Les meilleurs sites d'emploi et de stage au Bénin</h1>
      <p>EduBénin ne republie pas les offres externes : on te dirige directement vers les plateformes qui les publient réellement. Les offres ci-dessous, elles, viennent directement d'EduBénin.</p>
      <form class="search-bar" onsubmit="return false;">
        <input type="text" id="site-search" placeholder="Rechercher un site par nom...">
        <button type="submit">Rechercher</button>
      </form>
    </div>
  </section>

  <!-- =========================================================
       FILTRES
  ========================================================= -->
  <div class="filter-bar">
    <div class="container filter-row">
      <div class="type-tabs" role="tablist" aria-label="Filtrer par type de site">
        <button type="button" class="active" data-filter="tous">Tous</button>
        <button type="button" data-filter="emploi">Emploi</button>
        <button type="button" data-filter="stage">Stage</button>
        <button type="button" data-filter="officiel">Officiel</button>
      </div>
      <span class="result-count" id="result-count">7 sites référencés</span>
    </div>
  </div>

  <main class="container">

    <!-- =========================================================
         OFFRES PUBLIÉES PAR EDUBÉNIN
         Alimenté par la table `emplois`, remplie depuis le dashboard
         admin. S'affiche uniquement s'il y a au moins une offre.
    ========================================================= -->
    @if($emplois->count() > 0)
    <section style="padding:32px 0 8px;">
        <div class="section-head">
            <h2>Offres publiées par EduBénin</h2>
            <span>{{ $emplois->count() }} offre(s)</span>
        </div>

        <div class="site-grid">
            @foreach($emplois as $emploi)
                <div class="site-card">
                    <div class="site-top">
                        <span class="site-icon">{{ strtoupper(substr($emploi->titre, 0, 2)) }}</span>
                        <div>
                            <h3>{{ $emploi->titre }}</h3>
                            <span class="site-domain">{{ $emploi->entreprise ?? 'Entreprise non précisée' }}</span>
                        </div>
                    </div>
                    <div class="site-tags">
                        <span class="tag {{ $emploi->type }}">{{ $emploi->type === 'emploi' ? 'Emploi' : 'Stage' }}</span>
                    </div>
                    <p class="site-desc">
                        {{ $emploi->description ?? 'Aucune description fournie.' }}
                        @if($emploi->ville) <br>📍 {{ $emploi->ville }} @endif
                        @if($emploi->date_limite) <br>📅 Limite : {{ \Carbon\Carbon::parse($emploi->date_limite)->format('d F Y') }} @endif
                    </p>
                    <div class="site-footer">
                        <a href="{{ $emploi->lien_candidature ?? '#' }}" target="_blank" rel="noopener" class="site-cta">Postuler ↗</a>
                    </div>
                </div>
            @endforeach
        </div>
    </section>
    @endif

    <!-- =========================================================
         NOTE EXPLICATIVE (répertoire externe)
    ========================================================= -->
    <div class="info-note">
      <span>ℹ️</span>
      <span><strong>Cette liste va s'agrandir.</strong> Ce sont les sites les plus actifs et fiables trouvés à ce jour pour le Bénin. D'autres seront ajoutés au fur et à mesure — n'hésite pas à en suggérer si tu en connais un bon.</span>
    </div>

    <!-- =========================================================
         RÉPERTOIRE DE SITES — vrais liens externes vérifiés
    ========================================================= -->
    <div class="site-grid">

      <div class="site-card" data-type="emploi" data-name="emploibenin">
        <div class="site-top">
          <span class="site-icon">EB</span>
          <div>
            <h3>Emploibenin.com</h3>
            <span class="site-domain">emploibenin.com</span>
          </div>
        </div>
        <div class="site-tags"><span class="tag emploi">Emploi</span></div>
        <p class="site-desc">Offres d'emploi variées partout au Bénin (commercial, informatique, gestion...), mises à jour quasi quotidiennement.</p>
        <div class="site-footer">
          <a href="https://www.emploibenin.com/" target="_blank" rel="noopener" class="site-cta">Visiter le site ↗</a>
        </div>
      </div>

      <div class="site-card" data-type="emploi" data-name="bjemploi">
        <div class="site-top">
          <span class="site-icon">BJ</span>
          <div>
            <h3>BJemploi.com</h3>
            <span class="site-domain">bjemploi.com</span>
          </div>
        </div>
        <div class="site-tags"><span class="tag emploi">Emploi</span></div>
        <p class="site-desc">L'un des tout premiers sites d'emploi en ligne au Bénin. Offres consultables gratuitement, sans création de compte obligatoire.</p>
        <div class="site-footer">
          <a href="https://www.bjemploi.com/" target="_blank" rel="noopener" class="site-cta">Visiter le site ↗</a>
        </div>
      </div>

      <div class="site-card" data-type="emploi" data-name="offresdemplois">
        <div class="site-top">
          <span class="site-icon">OE</span>
          <div>
            <h3>Offresdemplois.bj</h3>
            <span class="site-domain">offresdemplois.bj</span>
          </div>
        </div>
        <div class="site-tags"><span class="tag emploi">Emploi</span></div>
        <p class="site-desc">Agrégateur d'annonces d'emploi centré sur le Bénin, avec dates de dépôt de dossier clairement indiquées sur chaque offre.</p>
        <div class="site-footer">
          <a href="https://offresdemplois.bj/" target="_blank" rel="noopener" class="site-cta">Visiter le site ↗</a>
        </div>
      </div>

      <div class="site-card" data-type="stage" data-name="stagesbenin">
        <div class="site-top">
          <span class="site-icon">SB</span>
          <div>
            <h3>StagesBénin</h3>
            <span class="site-domain">stagesbenin.com</span>
          </div>
        </div>
        <div class="site-tags"><span class="tag stage">Stage</span></div>
        <p class="site-desc">Plateforme dédiée à la mise en relation entre étudiants béninois et entreprises proposant des stages, avec dépôt de CV en ligne.</p>
        <div class="site-footer">
          <a href="https://www.stagesbenin.com/" target="_blank" rel="noopener" class="site-cta">Visiter le site ↗</a>
        </div>
      </div>

      <div class="site-card" data-type="emploi" data-name="novojob">
        <div class="site-top">
          <span class="site-icon">NJ</span>
          <div>
            <h3>Novojob — Bénin</h3>
            <span class="site-domain">novojob.com/benin</span>
          </div>
        </div>
        <div class="site-tags"><span class="tag emploi">Emploi</span><span class="tag stage">Stage</span></div>
        <p class="site-desc">Plateforme active dans plusieurs pays d'Afrique, avec une section dédiée au Bénin incluant aussi bien des emplois que des offres de stage pour étudiants.</p>
        <div class="site-footer">
          <a href="https://www.novojob.com/benin/offres-d-emploi/stage" target="_blank" rel="noopener" class="site-cta">Visiter le site ↗</a>
        </div>
      </div>

      <div class="site-card" data-type="officiel" data-name="gouv">
        <div class="site-top">
          <span class="site-icon">🇧🇯</span>
          <div>
            <h3>Gouvernement du Bénin</h3>
            <span class="site-domain">gouv.bj</span>
          </div>
        </div>
        <div class="site-tags"><span class="tag officiel">Officiel</span></div>
        <p class="site-desc">Portail officiel des offres d'emploi dans les ministères, agences et structures publiques béninoises. Source fiable à 100%.</p>
        <div class="site-footer">
          <a href="https://www.gouv.bj/opportunites/offres-emploi/" target="_blank" rel="noopener" class="site-cta">Visiter le site ↗</a>
        </div>
      </div>

      <div class="site-card" data-type="emploi" data-name="goafricaonline">
        <div class="site-top">
          <span class="site-icon">GA</span>
          <div>
            <h3>GoAfricaOnline — Bénin</h3>
            <span class="site-domain">goafricaonline.com/bj</span>
          </div>
        </div>
        <div class="site-tags"><span class="tag emploi">Emploi</span></div>
        <p class="site-desc">Portail d'annonces classées très utilisé à Cotonou et dans le reste du pays, avec une rubrique emploi active et un moteur de recherche par ville.</p>
        <div class="site-footer">
          <a href="https://www.goafricaonline.com/bj/emploi" target="_blank" rel="noopener" class="site-cta">Visiter le site ↗</a>
        </div>
      </div>

    </div>
  </main>

  <!-- =========================================================
       PIED DE PAGE
  ========================================================= -->
  <footer>
    <div class="container footer-bottom">
      <span>© 2026 EduBénin. Tous droits réservés.</span>
      <span>Conçu et développé au Bénin</span>
    </div>
  </footer>

  <script>
    const boutonsFiltre = document.querySelectorAll('.type-tabs button');
    const cartesSites = document.querySelectorAll('.site-card[data-type]');
    const compteurResultats = document.getElementById('result-count');
    const champRecherche = document.getElementById('site-search');

    function appliquerFiltres(){
      const filtreActif = document.querySelector('.type-tabs button.active').dataset.filter;
      const terme = champRecherche.value.trim().toLowerCase();
      let visibles = 0;

      cartesSites.forEach(carte => {
        const correspondType = filtreActif === 'tous' || carte.dataset.type === filtreActif;
        const correspondRecherche = carte.querySelector('h3').textContent.toLowerCase().includes(terme);
        const visible = correspondType && correspondRecherche;
        carte.classList.toggle('is-hidden', !visible);
        if(visible) visibles++;
      });

      compteurResultats.textContent = visibles + (visibles > 1 ? ' sites référencés' : ' site référencé');
    }

    boutonsFiltre.forEach(bouton => {
      bouton.addEventListener('click', () => {
        boutonsFiltre.forEach(b => b.classList.remove('active'));
        bouton.classList.add('active');
        appliquerFiltres();
      });
    });

    champRecherche.addEventListener('input', appliquerFiltres);

    // Menu utilisateur (avatar cliquable → dérouler/fermer)
    const userMenuTrigger = document.getElementById('userMenuTrigger');
    const userMenuDropdown = document.getElementById('userMenuDropdown');
    if (userMenuTrigger && userMenuDropdown) {
      userMenuTrigger.addEventListener('click', function (e) {
        e.stopPropagation();
        userMenuDropdown.classList.toggle('open');
      });
      document.addEventListener('click', function () {
        userMenuDropdown.classList.remove('open');
      });
    }
  </script>

</body>
</html>