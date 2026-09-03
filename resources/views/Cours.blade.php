<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cours — EduBénin</title>
<meta name="description" content="Catalogue de livres et tutoriels EduBénin, classés par domaine.">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
  /* =========================================================
     1. VARIABLES DE MARQUE
  ========================================================= */
  :root{
    --navy-950:#0a1530;
    --navy-900:#0e1c3f;
    --navy-800:#152752;
    --blue-600:#2557d6;
    --blue-700:#1a44b8;
    --blue-100:#e8eefc;
    --orange-500:#f4901e;
    --orange-600:#e07c0b;
    --orange-100:#fef1e2;
    --ink-900:#101828;
    --ink-600:#4b5468;
    --ink-400:#8891a3;
    --paper:#ffffff;
    --bg-soft:#f6f8fc;
    --border:#e6eaf2;
    --radius-lg:18px;
    --radius-md:12px;
    --radius-sm:8px;
    --shadow-card:0 4px 20px rgba(14,28,63,0.06);
    --shadow-hover:0 10px 30px rgba(14,28,63,0.12);
  }
  *{ box-sizing:border-box; margin:0; padding:0; }
  html{ scroll-behavior:smooth; }
  body{
    font-family:'Inter', system-ui, sans-serif;
    color:var(--ink-900);
    background:var(--bg-soft);
    -webkit-font-smoothing:antialiased;
  }
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
  header.site-header{
    position:sticky; top:0; z-index:100;
    background:rgba(255,255,255,0.94);
    backdrop-filter:blur(8px);
    border-bottom:1px solid var(--border);
  }
  .nav-row{ display:flex; align-items:center; justify-content:space-between; height:72px; gap:24px; }
  .logo{ display:flex; align-items:center; gap:8px; font-family:'Sora', sans-serif; font-weight:800; font-size:20px; white-space:nowrap; }
  .logo .edu{ color:var(--blue-600); }
  .logo .benin{ color:var(--orange-500); }
  nav.main-nav{ display:flex; gap:32px; }
  nav.main-nav a{ font-size:14.5px; font-weight:500; color:var(--ink-600); padding:6px 2px; border-bottom:2px solid transparent; transition:color .15s ease, border-color .15s ease; }
  nav.main-nav a:hover, nav.main-nav a.active{ color:var(--navy-900); border-color:var(--orange-500); }
  .nav-actions{ display:flex; align-items:center; gap:14px; }
  .user-menu{ position:relative; }
  .user-menu-trigger{ display:flex; align-items:center; gap:10px; background:transparent; border:1px solid var(--border); border-radius:999px; padding:5px 16px 5px 5px; transition:background .15s ease; }
  .user-menu-trigger:hover{ background:var(--bg-soft); }
  .user-avatar{ width:32px; height:32px; border-radius:999px; display:flex; align-items:center; justify-content:center; color:#fff; font-family:'Sora', sans-serif; font-weight:700; font-size:13.5px; flex-shrink:0; }
  .user-fullname{ font-size:13.5px; font-weight:600; color:var(--ink-900); white-space:nowrap; max-width:160px; overflow:hidden; text-overflow:ellipsis; }
  .user-menu-dropdown{ display:none; position:absolute; top:calc(100% + 8px); right:0; background:#fff; border:1px solid var(--border); border-radius:12px; box-shadow:var(--shadow-hover); min-width:170px; overflow:hidden; z-index:200; }
  .user-menu-dropdown.open{ display:block; }
  .user-menu-dropdown form{ margin:0; }
  .user-menu-dropdown button{ width:100%; text-align:left; padding:12px 16px; font-size:13.5px; font-weight:500; color:var(--ink-900); background:transparent; transition:background .15s ease; }
  .user-menu-dropdown button:hover{ background:var(--bg-soft); }
  .user-menu-dropdown a{ display:block; width:100%; text-align:left; padding:12px 16px; font-size:13.5px; font-weight:500; color:var(--ink-900); transition:background .15s ease; }
  .user-menu-dropdown a:hover{ background:var(--bg-soft); }
  .user-menu-dropdown .dropdown-divider{ height:1px; background:var(--border); margin:4px 0; }
  .icon-btn{ width:38px; height:38px; display:flex; align-items:center; justify-content:center; border-radius:999px; background:transparent; color:var(--ink-600); transition:background .15s ease; }
  .icon-btn:hover{ background:var(--bg-soft); }
  .btn{ font-size:14px; font-weight:600; padding:10px 18px; border-radius:999px; transition:transform .12s ease, box-shadow .12s ease, background .15s ease; display:inline-flex; align-items:center; gap:6px; }
  .btn:active{ transform:scale(.97); }
  .btn-ghost{ color:var(--navy-900); background:transparent; border:1px solid var(--border); }
  .btn-ghost:hover{ background:var(--bg-soft); }
  .btn-primary{ background:var(--navy-900); color:#fff; }
  .btn-primary:hover{ box-shadow:var(--shadow-hover); }

  /* =========================================================
     3. BANDEAU DE PAGE + RECHERCHE
  ========================================================= */
  .page-banner{
    background:linear-gradient(160deg, var(--navy-950), var(--navy-900) 65%, var(--navy-800));
    color:#fff;
    padding:44px 0 40px;
  }
  .page-banner h1{ font-size:clamp(26px, 3vw, 34px); font-weight:800; }
  .page-banner p{ margin-top:10px; color:#c4cce3; font-size:15px; max-width:560px; }

  .search-bar{
    margin-top:24px; display:flex; background:#fff; border-radius:999px;
    padding:6px; max-width:520px; box-shadow:0 16px 30px rgba(0,0,0,0.22);
  }
  .search-bar input{ flex:1; border:none; outline:none; padding:12px 16px; font-size:14.5px; font-family:inherit; color:var(--ink-900); background:transparent; }
  .search-bar input::placeholder{ color:var(--ink-400); }
  .search-bar button{ background:var(--blue-600); color:#fff; font-weight:600; font-size:14.5px; padding:12px 22px; border-radius:999px; transition:background .15s ease; }
  .search-bar button:hover{ background:var(--blue-700); }

  /* =========================================================
     4. BARRE DE FILTRES
  ========================================================= */
  .filter-bar{
    position:sticky; top:72px; z-index:90;
    background:rgba(246,248,252,0.95);
    backdrop-filter:blur(6px);
    border-bottom:1px solid var(--border);
    padding:16px 0;
  }
  .filter-row{ display:flex; align-items:center; justify-content:space-between; gap:20px; flex-wrap:wrap; }
  .type-tabs{ display:flex; gap:8px; background:#fff; border:1px solid var(--border); border-radius:999px; padding:4px; }
  .type-tabs button{
    font-size:13.5px; font-weight:600; color:var(--ink-600);
    padding:8px 16px; border-radius:999px; background:transparent;
    transition:background .15s ease, color .15s ease;
  }
  .type-tabs button.active{ background:var(--navy-900); color:#fff; }
  .cat-jump{ display:flex; gap:10px; flex-wrap:wrap; }
  .cat-jump a{
    font-size:13px; font-weight:600; color:var(--ink-600);
    background:#fff; border:1px solid var(--border);
    padding:7px 14px; border-radius:999px; transition:border-color .15s ease, color .15s ease;
  }
  .cat-jump a:hover{ border-color:var(--orange-500); color:var(--navy-900); }

  /* =========================================================
     5. SECTIONS PAR CATÉGORIE
  ========================================================= */
  .cat-section{ padding:44px 0 8px; scroll-margin-top:150px; }
  .cat-section-head{ display:flex; align-items:center; gap:12px; margin-bottom:22px; }
  .cat-dot{ width:10px; height:10px; border-radius:999px; }
  .cat-section-head h2{ font-size:20px; font-weight:700; }
  .cat-section-head span{ font-size:13px; color:var(--ink-400); font-weight:500; }

  .card-grid{ display:grid; grid-template-columns:repeat(3, 1fr); gap:20px; }

  .item-card{
    background:#fff; border:1px solid var(--border); border-radius:var(--radius-md);
    overflow:hidden; transition:transform .15s ease, box-shadow .15s ease;
    display:flex; flex-direction:column;
  }
  .item-card:hover{ transform:translateY(-3px); box-shadow:var(--shadow-hover); }
  .item-cover{
    height:120px; position:relative; display:flex; align-items:center; justify-content:center;
  }
  .item-badge{
    position:absolute; top:10px; left:10px; font-size:11px; font-weight:700;
    padding:4px 10px; border-radius:999px; color:#fff; letter-spacing:.02em;
  }
  .item-badge.livre{ background:var(--navy-900); }
  .item-badge.tuto{ background:var(--orange-600); }
  .item-body{ padding:16px; display:flex; flex-direction:column; gap:6px; flex:1; }
  .item-body h3{ font-size:14.5px; font-weight:700; line-height:1.35; }
  .item-body .author{ font-size:12.5px; color:var(--ink-400); }
  .item-meta{ display:flex; align-items:center; gap:6px; font-size:12px; color:var(--ink-600); margin-top:4px; }
  .item-footer{
    margin-top:auto; padding-top:12px; display:flex; align-items:center; justify-content:space-between;
  }
  .item-price{ font-size:12.5px; font-weight:700; color:var(--blue-600); }
  .item-price.free{ color:#159862; }
  .item-cta{
    font-size:12.5px; font-weight:600; color:#fff; background:var(--blue-600);
    padding:7px 14px; border-radius:999px; transition:background .15s ease;
  }
  .item-cta:hover{ background:var(--blue-700); }

  /* =========================================================
     SÉRIES (PLAYLISTS) — cartes horizontales en haut de page
  ========================================================= */
  .series-section{ padding:36px 0 8px; }
  .series-grid{ display:grid; grid-template-columns:repeat(3, 1fr); gap:18px; }
  .serie-card{
    display:flex; align-items:center; gap:14px;
    background:#fff; border:1px solid var(--border); border-radius:var(--radius-md);
    padding:16px; transition:transform .15s ease, box-shadow .15s ease;
  }
  .serie-card:hover{ transform:translateY(-2px); box-shadow:var(--shadow-hover); }
  .serie-icon{
    width:52px; height:52px; border-radius:12px; flex-shrink:0;
    display:flex; align-items:center; justify-content:center; position:relative;
  }
  .serie-icon .play-badge{
    position:absolute; bottom:-4px; right:-4px; width:20px; height:20px; border-radius:999px;
    background:var(--navy-900); display:flex; align-items:center; justify-content:center; color:#fff;
  }
  .serie-info h3{ font-size:14.5px; font-weight:700; margin-bottom:3px; }
  .serie-info p{ font-size:12px; color:var(--ink-400); }

  @media (max-width:960px){
    .series-grid{ grid-template-columns:repeat(2, 1fr); }
  }
  @media (max-width:720px){
    .series-grid{ grid-template-columns:1fr; }
  }

  .item-card.is-hidden{ display:none; }
  .empty-catalogue{ text-align:center; padding:60px 20px; color:var(--ink-400); font-size:14px; }

  footer{ background:var(--navy-950); color:#c4cce3; padding:44px 0 24px; margin-top:48px; }
  .footer-bottom{ display:flex; justify-content:space-between; font-size:12.5px; color:#7f89a6; flex-wrap:wrap; gap:10px; }

  @media (max-width:960px){
    .card-grid{ grid-template-columns:repeat(2, 1fr); }
  }
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
          <path d="M6 22 L24 12 L42 22 L24 32 Z" fill="#0e1c3f"/>
          <path d="M4 24c6 2 10 8 20 10 10-2 14-8 20-10" stroke="#2557d6" stroke-width="4" fill="none" stroke-linecap="round"/>
          <path d="M8 26c5 2 9 7 16 8 7-1 11-6 16-8" stroke="#f4901e" stroke-width="3" fill="none" stroke-linecap="round"/>
        </svg>
        <span><span class="edu">Edu</span><span class="benin">Bénin</span></span>
      </a>
      <nav class="main-nav">
        <a href="/Acceuil">Accueil</a>
        <a href="/Cours" class="active">Cours</a>
        <a href="/emplois">Emplois &amp; Stages</a>
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
              <a href="{{ route('profil.edit') }}">
                <span style="display:inline-flex; align-items:center; gap:8px;">
                  <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"/><circle cx="12" cy="7" r="4"/></svg>
                  Mon profil
                </span>
              </a>
              <div class="dropdown-divider"></div>
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
  <section class="page-banner">
    <div class="container">
      <h1>Livres &amp; tutoriels</h1>
      <p>Tout le contenu est classé par domaine. Choisis une catégorie ou utilise la recherche pour trouver un livre ou un tutoriel précis.</p>
      <form class="search-bar" onsubmit="return false;">
        <input type="text" id="course-search" placeholder="Rechercher un livre, un tutoriel, un auteur...">
        <button type="submit">Rechercher</button>
      </form>
    </div>
  </section>

  <!-- =========================================================
       SÉRIES (PLAYLISTS)
       Regroupements de tutoriels vidéo à suivre dans l'ordre,
       façon YouTube. Alimenté par $series (CoursController@index).
  ========================================================= -->
  @if($series->count() > 0)
  <section class="series-section">
    <div class="container">
      <div class="cat-section-head">
        <h2>Séries de tutoriels</h2>
        <span>Suis une formation complète, vidéo après vidéo</span>
      </div>
      <div class="series-grid">
        @foreach($series as $serie)
          <a href="{{ route('serie.show', $serie) }}" class="serie-card">
            <span class="serie-icon" style="background:{{ $serie->couleur }}1A;">
              <svg width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="{{ $serie->couleur }}" stroke-width="1.8"><rect x="2" y="6" width="14" height="14" rx="2"/><path d="M22 8.5v7L16 13Z"/></svg>
              <span class="play-badge">
                <svg width="10" height="10" viewBox="0 0 24 24" fill="currentColor"><path d="M8 5v14l11-7Z"/></svg>
              </span>
            </span>
            <div class="serie-info">
              <h3>{{ $serie->titre }}</h3>
              <p>{{ $serie->livres_count }} vidéo{{ $serie->livres_count > 1 ? 's' : '' }}</p>
            </div>
          </a>
        @endforeach
      </div>
    </div>
  </section>
  @endif

  <!-- =========================================================
       BARRE DE FILTRES
  ========================================================= -->
  <div class="filter-bar">
    <div class="container filter-row">
      <div class="type-tabs" role="tablist" aria-label="Filtrer par type de contenu">
        <button type="button" class="active" data-filter="tous">Tous</button>
        <button type="button" data-filter="livre">Livres</button>
        <button type="button" data-filter="tuto">Tutoriels</button>
      </div>
      <nav class="cat-jump">
        <a href="#cat-informatique">Informatique</a>
        <a href="#cat-devperso">Développement personnel</a>
        <a href="#cat-gestion">Gestion &amp; Finance</a>
        <a href="#cat-langues">Langues</a>
        <a href="#cat-entrepreneuriat">Entrepreneuriat</a>
        <a href="#cat-sciences">Sciences</a>
      </nav>
    </div>
  </div>

  <!-- =========================================================
       CATALOGUE — GÉNÉRÉ DEPUIS LA BASE DE DONNÉES
       $livres vient de CoursController@index (Livre::latest()->get()).
       On garde les 6 catégories fixes (mêmes couleurs qu'avant),
       et pour chacune on affiche uniquement les livres/tutos dont
       la colonne `categorie` correspond exactement.
  ========================================================= -->
  <main class="container">

    @php
      // Couleur + identifiant d'ancrage pour chaque catégorie connue.
      // Si un nouveau livre est publié avec une catégorie différente
      // de ces 6-là, il n'apparaîtra dans aucune section : c'est
      // volontaire pour garder un catalogue propre et prévisible.
      $categories = [
        'Informatique' => ['id' => 'cat-informatique', 'dot' => '#2557d6', 'bg' => 'var(--blue-100)'],
        'Développement personnel' => ['id' => 'cat-devperso', 'dot' => '#159862', 'bg' => '#e6f6ee'],
        'Gestion & Finance' => ['id' => 'cat-gestion', 'dot' => '#e07c0b', 'bg' => 'var(--orange-100)'],
        'Langues' => ['id' => 'cat-langues', 'dot' => '#d13a6b', 'bg' => '#fdeaf0'],
        'Entrepreneuriat' => ['id' => 'cat-entrepreneuriat', 'dot' => '#5b5fe0', 'bg' => '#eef1ff'],
        'Sciences' => ['id' => 'cat-sciences', 'dot' => '#0e8a7c', 'bg' => '#e9f7f5'],
      ];
    @endphp

    @if($livres->count() === 0)
      <div class="empty-catalogue">Aucun livre ou tutoriel n'a encore été publié. Reviens bientôt !</div>
    @else
      @foreach($categories as $nomCategorie => $reglages)
        @php $itemsCategorie = $livres->where('categorie', $nomCategorie)->whereNull('serie_id'); @endphp

        @if($itemsCategorie->count() > 0)
        <section class="cat-section" id="{{ $reglages['id'] }}">
          <div class="cat-section-head">
            <span class="cat-dot" style="background:{{ $reglages['dot'] }}"></span>
            <h2>{{ $nomCategorie }}</h2>
            <span>{{ $itemsCategorie->count() }} ressource(s)</span>
          </div>
          <div class="card-grid">
            @foreach($itemsCategorie as $livre)
              <article class="item-card" data-type="{{ $livre->type }}">
                <div class="item-cover" style="background:{{ $reglages['bg'] }}">
                  <span class="item-badge {{ $livre->type }}">{{ $livre->type === 'livre' ? 'Livre' : 'Tutoriel' }}</span>
                  @if($livre->type === 'livre')
                    <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="{{ $reglages['dot'] }}" stroke-width="1.6"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                  @else
                    <svg width="34" height="34" viewBox="0 0 24 24" fill="none" stroke="{{ $reglages['dot'] }}" stroke-width="1.6"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
                  @endif
                </div>
                <div class="item-body">
                  <h3>{{ $livre->titre }}</h3>
                  <p class="author">Par {{ $livre->auteur ?? 'Auteur non précisé' }}</p>
                  <p class="item-meta">{{ $livre->type === 'livre' ? '📄 PDF' : '🎥 Vidéo' }}</p>
                  <div class="item-footer">
                    <span class="item-price {{ $livre->prix == 0 ? 'free' : '' }}">
                      {{ $livre->prix > 0 ? number_format($livre->prix, 0, ',', ' ') . ' FCFA' : 'Gratuit' }}
                    </span>
                    <a href="{{ route('cours.consulter', $livre) }}" target="_blank" rel="noopener" class="item-cta">
                      {{ $livre->type === 'livre' ? 'Lire' : 'Regarder' }}
                    </a>
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
    // FILTRE PAR TYPE DE CONTENU (Tous / Livres / Tutoriels)
    // =========================================================
    const boutonsFiltre = document.querySelectorAll('.type-tabs button');
    const toutesLesCartes = document.querySelectorAll('.item-card');

    boutonsFiltre.forEach(bouton => {
      bouton.addEventListener('click', () => {
        boutonsFiltre.forEach(b => b.classList.remove('active'));
        bouton.classList.add('active');

        const filtre = bouton.dataset.filter;

        toutesLesCartes.forEach(carte => {
          const correspond = filtre === 'tous' || carte.dataset.type === filtre;
          carte.classList.toggle('is-hidden', !correspond);
        });
      });
    });

    // =========================================================
    // RECHERCHE SIMPLE (titre, auteur)
    // =========================================================
    const champRecherche = document.getElementById('course-search');
    if (champRecherche) {
      champRecherche.addEventListener('input', () => {
        const terme = champRecherche.value.trim().toLowerCase();
        toutesLesCartes.forEach(carte => {
          const titre = carte.querySelector('h3').textContent.toLowerCase();
          const auteur = carte.querySelector('.author').textContent.toLowerCase();
          const correspondRecherche = titre.includes(terme) || auteur.includes(terme);
          const filtreActif = document.querySelector('.type-tabs button.active').dataset.filter;
          const correspondType = filtreActif === 'tous' || carte.dataset.type === filtreActif;
          carte.classList.toggle('is-hidden', !(correspondRecherche && correspondType));
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