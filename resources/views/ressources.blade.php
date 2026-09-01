<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ressources — EduBénin</title>
<meta name="description" content="Guides, modèles et articles pratiques pour réussir ses études et sa recherche d'emploi.">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
  :root{
    --ink-900:#111111;
    --ink-700:#2b2b2b;
    --ink-600:#5c5c5c;
    --ink-400:#8f8f8f;
    --line:#e3e3e3;
    --paper:#ffffff;
    --bg-soft:#fafafa;
    --black:#0a0a0a;
    --orange-500:#f4901e;
    --orange-600:#d97b0f;
    --shadow-card:0 4px 20px rgba(0,0,0,0.05);
    --shadow-hover:0 10px 26px rgba(0,0,0,0.12);
    --radius-lg:18px;
    --radius-md:12px;
    --radius-sm:8px;
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
     EN-TÊTE
  ========================================================= */
  header.site-header{ position:sticky; top:0; z-index:100; background:rgba(255,255,255,0.95); backdrop-filter:blur(8px); border-bottom:1px solid var(--line); }
  .nav-row{ display:flex; align-items:center; justify-content:space-between; height:72px; gap:24px; }
  .logo{ display:flex; align-items:center; gap:8px; font-family:'Sora', sans-serif; font-weight:800; font-size:20px; white-space:nowrap; }
  .logo .edu{ color:var(--ink-900); }
  .logo .benin{ color:var(--orange-500); }
  nav.main-nav{ display:flex; gap:32px; }
  nav.main-nav a{ font-size:14.5px; font-weight:500; color:var(--ink-600); padding:6px 2px; border-bottom:2px solid transparent; transition:color .15s ease, border-color .15s ease; }
  nav.main-nav a:hover, nav.main-nav a.active{ color:var(--ink-900); border-color:var(--orange-500); }
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
     BANDEAU DE PAGE
  ========================================================= */
  .page-banner{ background:var(--black); color:#fff; padding:56px 0 44px; }
  .page-banner .kicker{ font-size:12.5px; font-weight:700; letter-spacing:.08em; text-transform:uppercase; color:var(--orange-500); margin-bottom:14px; display:block; }
  .page-banner h1{ font-size:clamp(28px, 3.4vw, 40px); font-weight:800; max-width:640px; line-height:1.15; }
  .page-banner p{ margin-top:12px; color:#bdbdbd; font-size:15px; max-width:560px; }

  .search-bar{ margin-top:26px; display:flex; background:#fff; border-radius:999px; padding:6px; max-width:520px; }
  .search-bar input{ flex:1; border:none; outline:none; padding:12px 16px; font-size:14.5px; font-family:inherit; color:var(--ink-900); background:transparent; }
  .search-bar input::placeholder{ color:var(--ink-400); }
  .search-bar button{ background:var(--black); color:#fff; font-weight:600; font-size:14.5px; padding:12px 22px; border-radius:999px; transition:background .15s ease; }
  .search-bar button:hover{ background:#2b2b2b; }

  /* =========================================================
     FILTRES
  ========================================================= */
  .filter-bar{ position:sticky; top:72px; z-index:90; background:rgba(255,255,255,0.96); backdrop-filter:blur(6px); border-bottom:1px solid var(--line); padding:16px 0; }
  .filter-row{ display:flex; align-items:center; justify-content:space-between; gap:20px; flex-wrap:wrap; }
  .type-tabs{ display:flex; gap:8px; background:var(--bg-soft); border:1px solid var(--line); border-radius:999px; padding:4px; }
  .type-tabs button{ font-size:13.5px; font-weight:600; color:var(--ink-600); padding:8px 16px; border-radius:999px; background:transparent; transition:background .15s ease, color .15s ease; }
  .type-tabs button.active{ background:var(--black); color:#fff; }
  .cat-jump{ display:flex; gap:10px; flex-wrap:wrap; }
  .cat-jump a{ font-size:13px; font-weight:600; color:var(--ink-600); background:#fff; border:1px solid var(--line); padding:7px 14px; border-radius:999px; transition:border-color .15s ease, color .15s ease; }
  .cat-jump a:hover{ border-color:var(--ink-900); color:var(--ink-900); }

  /* =========================================================
     SECTIONS PAR THÈME
  ========================================================= */
  .cat-section{ padding:44px 0 8px; scroll-margin-top:150px; }
  .cat-section-head{ display:flex; align-items:baseline; gap:10px; margin-bottom:22px; border-bottom:1px solid var(--line); padding-bottom:14px; }
  .cat-section-head h2{ font-size:20px; font-weight:700; }
  .cat-section-head span{ font-size:13px; color:var(--ink-400); font-weight:500; }

  .card-grid{ display:grid; grid-template-columns:repeat(3, 1fr); gap:20px; }

  .item-card{ background:#fff; border:1px solid var(--line); border-radius:var(--radius-md); overflow:hidden; transition:transform .15s ease, box-shadow .15s ease, border-color .15s ease; display:flex; flex-direction:column; }
  .item-card:hover{ transform:translateY(-3px); box-shadow:var(--shadow-hover); border-color:var(--ink-900); }
  .item-cover{ height:104px; background:var(--bg-soft); position:relative; display:flex; align-items:center; justify-content:center; border-bottom:1px solid var(--line); }
  .item-badge{ position:absolute; top:10px; left:10px; font-size:10.5px; font-weight:700; padding:4px 10px; border-radius:999px; letter-spacing:.03em; text-transform:uppercase; }
  .item-badge.guide{ background:var(--ink-900); color:#fff; }
  .item-badge.modele{ background:var(--orange-500); color:#fff; }
  .item-badge.article{ background:#fff; color:var(--ink-900); border:1px solid var(--ink-900); }
  .item-badge.outil{ background:var(--ink-400); color:#fff; }
  .item-body{ padding:16px; display:flex; flex-direction:column; gap:6px; flex:1; }
  .item-body h3{ font-size:14.5px; font-weight:700; line-height:1.35; }
  .item-meta{ font-size:12px; color:var(--ink-600); }
  .item-footer{ margin-top:auto; padding-top:12px; display:flex; flex-direction:column; gap:8px; }
  .item-format{ font-size:12px; color:var(--ink-400); font-weight:500; }
  .item-actions{ display:flex; gap:6px; }
  .item-cta{ flex:1; text-align:center; font-size:12.5px; font-weight:700; color:#fff; background:var(--black); padding:8px 14px; border-radius:999px; transition:background .15s ease; }
  .item-cta:hover{ background:var(--orange-500); }
  .item-cta.secondary{ background:var(--ink-400); }
  .item-cta.secondary:hover{ background:var(--ink-600); }

  .item-card.is-hidden{ display:none; }
  .empty-catalogue{ text-align:center; padding:60px 20px; color:var(--ink-400); font-size:14px; }

  footer{ background:var(--black); color:#bdbdbd; padding:44px 0 24px; margin-top:48px; }
  .footer-bottom{ display:flex; justify-content:space-between; font-size:12.5px; color:#7d7d7d; flex-wrap:wrap; gap:10px; }

  @media (max-width:960px){ .card-grid{ grid-template-columns:repeat(2, 1fr); } }
  @media (max-width:720px){
    .container{ padding:0 20px; }
    nav.main-nav{ display:none; }
    .btn-ghost{ display:none; }
    .card-grid{ grid-template-columns:1fr; }
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
          <path d="M6 22 L24 12 L42 22 L24 32 Z" fill="#111111"/>
          <path d="M4 24c6 2 10 8 20 10 10-2 14-8 20-10" stroke="#5c5c5c" stroke-width="4" fill="none" stroke-linecap="round"/>
          <path d="M8 26c5 2 9 7 16 8 7-1 11-6 16-8" stroke="#f4901e" stroke-width="3" fill="none" stroke-linecap="round"/>
        </svg>
        <span><span class="edu">Edu</span><span class="benin">Bénin</span></span>
      </a>
      <nav class="main-nav">
        <a href="/Acceuil">Accueil</a>
        <a href="/Cours">Cours</a>
        <a href="/emplois">Emplois &amp; Stages</a>
        <a href="/ressources" class="active">Ressources</a>
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
      <span class="kicker">Ressources gratuites</span>
      <h1>Guides, modèles et articles pour avancer</h1>
      <p>Tout ce qu'il faut pour rédiger un bon CV, préparer un entretien, monter un dossier de bourse ou simplement mieux organiser tes études.</p>
      <form class="search-bar" onsubmit="return false;">
        <input type="text" id="res-search" placeholder="Rechercher une ressource...">
        <button type="submit">Rechercher</button>
      </form>
    </div>
  </section>

  <!-- =========================================================
       FILTRES
  ========================================================= -->
  <div class="filter-bar">
    <div class="container filter-row">
      <div class="type-tabs" role="tablist" aria-label="Filtrer par type de ressource">
        <button type="button" class="active" data-filter="tous">Tous</button>
        <button type="button" data-filter="guide">Guides</button>
        <button type="button" data-filter="modele">Modèles</button>
        <button type="button" data-filter="article">Articles</button>
        <button type="button" data-filter="outil">Outils</button>
      </div>
      <nav class="cat-jump">
        <a href="#cat-candidature">Candidature &amp; emploi</a>
        <a href="#cat-etudes">Vie étudiante</a>
        <a href="#cat-bourses">Bourses &amp; financement</a>
      </nav>
    </div>
  </div>

  <!-- =========================================================
       CATALOGUE — GÉNÉRÉ DEPUIS LA BASE DE DONNÉES
       $ressources vient de RessourceController@index. On garde
       les 3 thèmes fixes, une section n'apparaît que si elle
       contient au moins une ressource.
  ========================================================= -->
  <main class="container">

    @php
      $themes = [
        'candidature' => ['id' => 'cat-candidature', 'titre' => 'Candidature & emploi'],
        'etudes' => ['id' => 'cat-etudes', 'titre' => 'Vie étudiante'],
        'bourses' => ['id' => 'cat-bourses', 'titre' => 'Bourses & financement'],
      ];

      $iconesParType = [
        'guide' => '<path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/>',
        'modele' => '<rect x="4" y="2" width="16" height="20" rx="2"/><path d="M8 7h8M8 11h8M8 15h5"/>',
        'article' => '<circle cx="12" cy="12" r="9"/><path d="M8 12h8M12 8v8"/>',
        'outil' => '<rect x="3" y="4" width="18" height="16" rx="2"/><path d="M3 9h18M8 4v5"/>',
      ];

      $labelsParType = ['guide' => 'Guide', 'modele' => 'Modèle', 'article' => 'Article', 'outil' => 'Outil'];
      $verbeParType = ['guide' => 'Lire', 'modele' => 'Ouvrir', 'article' => 'Lire', 'outil' => 'Utiliser'];
    @endphp

    @if($ressources->count() === 0)
      <div class="empty-catalogue">Aucune ressource n'a encore été publiée. Reviens bientôt !</div>
    @else
      @foreach($themes as $cleTheme => $reglages)
        @php $itemsTheme = $ressources->where('theme', $cleTheme); @endphp

        @if($itemsTheme->count() > 0)
        <section class="cat-section" id="{{ $reglages['id'] }}">
          <div class="cat-section-head">
            <h2>{{ $reglages['titre'] }}</h2>
            <span>{{ $itemsTheme->count() }} ressource(s)</span>
          </div>
          <div class="card-grid">
            @foreach($itemsTheme as $ressource)
              <article class="item-card" data-type="{{ $ressource->type }}">
                <div class="item-cover">
                  <span class="item-badge {{ $ressource->type }}">{{ $labelsParType[$ressource->type] }}</span>
                  <svg width="30" height="30" viewBox="0 0 24 24" fill="none" stroke="#111" stroke-width="1.5">{!! $iconesParType[$ressource->type] !!}</svg>
                </div>
                <div class="item-body">
                  <h3>{{ $ressource->titre }}</h3>
                  @if($ressource->description)
                    <p class="item-meta">{{ $ressource->description }}</p>
                  @endif
                  <div class="item-footer">
                    @if($ressource->fichier_nom_original)
                      <span class="item-format">📎 {{ $ressource->fichier_nom_original }}</span>
                    @endif
                    <div class="item-actions">
                      <a href="{{ route('ressources.consulter', $ressource) }}" target="_blank" rel="noopener" class="item-cta">
                        {{ $verbeParType[$ressource->type] }}
                      </a>
                      @if($ressource->fichier_chemin)
                        <a href="{{ route('ressources.consulter', $ressource) }}" class="item-cta secondary">Télécharger</a>
                      @endif
                    </div>
                  </div>
                </div>
              </article>
            @endforeach
          </div>
        </section>
        @endif
      @endforeach
    @endif

  </main>

  <!-- =========================================================
       PIED DE PAGE
  ========================================================= -->
  <footer>
    <div class="container footer-bottom">
      <span>Copyright &copy; <strong>BODEM</strong> © 2026 EduBénin. Tous droits réservés.</span>
      <span>Conçu et développé au Bénin</span>
    </div>
  </footer>

  <script>
    // =========================================================
    // FILTRE PAR TYPE (Tous / Guides / Modèles / Articles / Outils)
    // =========================================================
    const boutonsFiltre = document.querySelectorAll('.type-tabs button');
    const toutesLesCartes = document.querySelectorAll('.item-card');

    boutonsFiltre.forEach(bouton => {
      bouton.addEventListener('click', () => {
        boutonsFiltre.forEach(b => b.classList.remove('active'));
        bouton.classList.add('active');
        const filtre = bouton.dataset.filter;
        toutesLesCartes.forEach(carte => {
          carte.classList.toggle('is-hidden', !(filtre === 'tous' || carte.dataset.type === filtre));
        });
      });
    });

    // =========================================================
    // RECHERCHE SIMPLE PAR TITRE
    // =========================================================
    const champRecherche = document.getElementById('res-search');
    if (champRecherche) {
      champRecherche.addEventListener('input', () => {
        const terme = champRecherche.value.trim().toLowerCase();
        const filtreActif = document.querySelector('.type-tabs button.active').dataset.filter;
        toutesLesCartes.forEach(carte => {
          const titre = carte.querySelector('h3').textContent.toLowerCase();
          const correspondType = filtreActif === 'tous' || carte.dataset.type === filtreActif;
          carte.classList.toggle('is-hidden', !(titre.includes(terme) && correspondType));
        });
      });
    }

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