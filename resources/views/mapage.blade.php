<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EduBénin — Apprendre, Évoluer, Réussir</title>
<meta name="description" content="La plateforme tout-en-un pour les étudiants et jeunes du Bénin : cours en ligne, emplois, stages et bourses.">

<!-- Polices : Sora pour les titres (moderne, géométrique), Inter pour le texte courant -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
<link rel="icon" type="image/png" href="{{asset ('projet2 .png')}}">

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
    --ink-900: #101828;
    --ink-600:#4b5468;
    --ink-400:#8891a3;
    --paper:#ffffff;
    --bg-soft:white;
    --border: black;
    --radius-lg:18px;
    --radius-md:12px;
    --radius-sm:8px;
    --shadow-card:0 4px 20px rgba(14,28,63,0.06);
    --shadow-hover:0 10px 30px rgba(14,28,63,0.12);
  }

  *{ box-sizing:border-box;
     margin:0; 
     padding:0;
   }
  html{ scroll-behavior:smooth; }
  body{
    font-family:'Inter', system-ui, sans-serif;
    color:var(--ink-900);
    background:var(--paper);
    -webkit-font-smoothing:antialiased;
  }
  h1,h2,h3,h4{ font-family:'Sora', sans-serif; }
  img{ max-width:100%; display:block; }
  a{ text-decoration:none; color:inherit; }
  button{ font-family:inherit; cursor:pointer; border:none; }
  ul{ list-style:none; }
  .container{
    max-width:1240px;
    margin:0 auto;
    padding:0 32px;
  }
  @media (prefers-reduced-motion: reduce){
    *{ animation:none !important; transition:none !important; }
  }

  /* =========================================================
     2. EN-TÊTE / NAVIGATION
  ========================================================= */
  header.site-header{
    position:sticky;
    top:0;
    z-index:100;
    background:rgba(255,255,255,0.92);
    backdrop-filter:blur(8px);
    border-bottom:1px solid var(--border);
  }
  .nav-row{
    display:flex;
    align-items:center;
    justify-content:space-between;
    height:72px;
    gap:24px;
  }
  .logo{
    display:flex;
    align-items:center;
    gap:8px;
    font-family:'Sora', sans-serif;
    font-weight:800;
    font-size:20px;
    white-space:nowrap;
  }
  .logo .edu{ color:var(--blue-600); }
  .logo .benin{ color:var(--orange-500); }

  nav.main-nav{ display:flex; gap:32px; }
  nav.main-nav a{
    font-size:14.5px;
    font-weight:500;
    color:var(--ink-600);
    padding:6px 2px;
    border-bottom:2px solid transparent;
    transition:color .15s ease, border-color .15s ease;
  }
  nav.main-nav a:hover, nav.main-nav a.active{
    color:var(--navy-900);
    border-color:var(--orange-500);
  }

  .nav-actions{ display:flex; align-items:center; gap:14px; }

  .user-menu{ position:relative; }
  .user-menu-trigger{
    display:flex; align-items:center; gap:10px;
    background:transparent;
    border:1px solid var(--border);
    border-radius:999px;
    padding:5px 16px 5px 5px;
    transition:background .15s ease;
  }
  .user-menu-trigger:hover{ background:var(--bg-soft); }
  .user-avatar{
    width:32px; height:32px;
    border-radius:999px;
    display:flex; align-items:center; justify-content:center;
    color:#fff;
    font-family:'Sora', sans-serif;
    font-weight:700;
    font-size:13.5px;
    flex-shrink:0;
  }
  .user-fullname{
    font-size:13.5px;
    font-weight:600;
    color:var(--ink-900);
    white-space:nowrap;
    max-width:160px;
    overflow:hidden;
    text-overflow:ellipsis;
  }
  .user-menu-dropdown{
    display:none;
    position:absolute;
    top:calc(100% + 8px);
    right:0;
    background:#fff;
    border:1px solid var(--border);
    border-radius:12px;
    box-shadow:var(--shadow-hover);
    min-width:170px;
    overflow:hidden;
    z-index:200;
  }
  .user-menu-dropdown.open{ display:block; }
  .user-menu-dropdown form{ margin:0; }
  .user-menu-dropdown a, .user-menu-dropdown button{
    width:100%;
    text-align:left;
    padding:12px 16px;
    font-size:13.5px;
    font-weight:500;
    color:var(--ink-900);
    background:transparent;
    transition:background .15s ease;
    display:block;
  }
  .user-menu-dropdown a:hover, .user-menu-dropdown button:hover{ background:var(--bg-soft); }
  .user-menu-dropdown .dropdown-divider{ height:1px; background:var(--border); margin:4px 0; }
  .icon-btn{
    width:38px; height:38px;
    display:flex; align-items:center; justify-content:center;
    border-radius:999px;
    background:transparent;
    color:var(--ink-600);
    transition:background .15s ease;
  }
  .icon-btn:hover{ background:var(--bg-soft); }

  .btn{
    font-size:14px;
    font-weight:600;
    padding:10px 18px;
    border-radius:999px;
    transition:transform .12s ease, box-shadow .12s ease, background .15s ease;
    display:inline-flex; align-items:center; gap:6px;
  }
  .btn:active{ transform:scale(.97); }
  .btn-ghost{
    color:var(--navy-900);
    background:transparent;
    border:1px solid var(--border);
  }
  .btn-ghost:hover{ background:var(--bg-soft); }
  .btn-primary{
    background:var(--navy-900);
    color:#fff;
  }
  .btn-primary:hover{ box-shadow:var(--shadow-hover); }

  .burger{ display:none; }

  /* =========================================================
     3. SECTION HÉRO - VERSION TRANSPARENTE AVEC IMAGE CLAIRE
     L'image est en fond, le dégradé est très léger (transparent)
     pour que l'image soit bien visible.
  ========================================================= */
  .hero{
    position:relative;
    color:#fff;
    padding:72px 0 56px;
    min-height:550px;
    overflow:hidden;
    /* Dégradé très léger (presque transparent) + image en fond */
    background: 
      linear-gradient(160deg, rgba(10, 21, 48, 0.35), rgba(14, 28, 63, 0.25) 60%, rgba(21, 39, 82, 0.20)),
      url('{{ asset("etudiants-lecture.png") }}') no-repeat center right / contain;
  }
  /* Ajout d'un léger voile sombre uniquement sous le texte pour la lisibilité */
  .hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 55%;
    height: 100%;
    background: linear-gradient(to right, rgba(10, 21, 48, 0.70), rgba(10, 21, 48, 0.20) 80%, transparent 100%);
    z-index: 1;
    pointer-events: none;
  }
  .hero-grid{
    position:relative;
    z-index:2;
  }
  .hero-text{
    max-width:620px;
  }
  .eyebrow{
    display:inline-flex;
    align-items:center;
    gap:8px;
    background:rgba(244,144,30,0.20);
    border:1px solid rgba(244,144,30,0.40);
    color:var(--orange-500);
    font-size:12.5px;
    font-weight:600;
    letter-spacing:.03em;
    padding:6px 12px;
    border-radius:999px;
    margin-bottom:20px;
  }
  .hero h1{
    font-size:clamp(30px, 4vw, 46px);
    line-height:1.15;
    font-weight:800;
    max-width:620px;
    text-shadow: 0 2px 20px rgba(0,0,0,0.30);
  }
  .hero h1 .accent-orange{ color:var(--orange-500); }
  .hero h1 .accent-blue{ color:#7fa2ff; }
  .hero h1 .accent-violet {color: #c084fc;}
  .hero p.lead{
    margin-top:18px;
    font-size:16.5px;
    line-height:1.6;
    color:#e0e4f0;
    max-width:520px;
    text-shadow: 0 2px 10px rgba(0,0,0,0.25);
  }

  .search-bar{
    margin-top:32px;
    display:flex;
    background:#fff;
    border-radius:999px;
    padding:6px;
    max-width:520px;
    box-shadow:0 20px 40px rgba(0,0,0,0.30);
  }
  .search-bar input{
    flex:1;
    border:none;
    outline:none;
    padding:12px 16px;
    font-size:14.5px;
    font-family:inherit;
    color:var(--ink-900);
    background:transparent;
  }
  .search-bar input::placeholder{ color:var(--ink-400); }
  .search-bar button{
    background:var(--blue-600);
    color:#fff;
    font-weight:600;
    font-size:14.5px;
    padding:12px 22px;
    border-radius:999px;
    transition:background .15s ease;
  }
  .search-bar button:hover{ background:var(--blue-700); }

  .stats-row{
    display:flex;
    gap:36px;
    margin-top:36px;
    flex-wrap:wrap;
  }
  .stat-item{ display:flex; align-items:center; gap:10px; }
  .stat-item .stat-icon{
    width:36px; height:36px;
    border-radius:10px;
    background:rgba(255,255,255,0.15);
    backdrop-filter:blur(4px);
    display:flex; align-items:center; justify-content:center;
    color:var(--orange-500);
    flex-shrink:0;
  }
  .stat-item strong{ 
    display:block; 
    font-size:19px; 
    font-weight:800;
    text-shadow: 0 2px 8px rgba(0,0,0,0.20);
  }
  .stat-item span{ 
    display:block; 
    font-size:12.5px; 
    color:#c8d0e6;
    text-shadow: 0 1px 6px rgba(0,0,0,0.15);
  }

  /* =========================================================
     4. SECTION CATÉGORIES POPULAIRES
  ========================================================= */
  .section{ padding:64px 0; }
  .section-head{
    display:flex;
    align-items:baseline;
    justify-content:space-between;
    margin-bottom:28px;
  }
  .section-head h2{
    font-size:24px;
    font-weight:700;
    color:var(--ink-900);
  }
  .section-head a{
    font-size:14px;
    font-weight:600;
    color:var(--blue-600);
  }
  .section-head a:hover{ text-decoration:underline; }

  .cat-grid{
    display:grid;
    grid-template-columns:repeat(6, 1fr);
    gap:18px;
  }
  .cat-card{
    background:var(--paper);
    border:1px solid var(--border);
    border-radius:var(--radius-md);
    padding:22px 16px;
    text-align:center;
    transition:transform .15s ease, box-shadow .15s ease, border-color .15s ease;
    display:flex;
    flex-direction:column;
    align-items:center;
    height:100%;
    /* Empêche un mot très long (ex: un titre avec underscores au
       lieu d'espaces) de forcer la carte — et donc toute la grille
       — à s'élargir au-delà de sa colonne. */
    min-width:0;
  }
  .cat-card:hover{
    transform:translateY(-3px);
    box-shadow:var(--shadow-hover);
    border-color:transparent;
  }
  .cat-icon{
    width:52px; height:52px;
    margin:0 auto 14px;
    border-radius:14px;
    display:flex; align-items:center; justify-content:center;
    flex-shrink:0;
  }
  .cat-card h3{
    font-size:14.5px;
    font-weight:600;
    color:var(--ink-900);
    margin-bottom:4px;
    display:-webkit-box;
    -webkit-line-clamp:2;
    -webkit-box-orient:vertical;
    overflow:hidden;
    line-height:1.35;
    min-height:calc(1.35em * 2);
    /* Force le retour à la ligne même si le titre est un seul
       "mot" sans espace (ex: des underscores à la place). */
    overflow-wrap:anywhere;
    word-break:break-word;
  }
  .cat-card p{
    font-size:12.5px;
    color:var(--ink-400);
    margin-top:auto;
    padding-top:6px;
  }

  .cat-icon.c1{ background:var(--blue-100); color:var(--blue-600); }
  .cat-icon.c2{ background:#e6f6ee; color:#159862; }
  .cat-icon.c3{ background:var(--orange-100); color:var(--orange-600); }
  .cat-icon.c4{ background:#fdeaf0; color:#d13a6b; }
  .cat-icon.c5{ background:#eef1ff; color:#5b5fe0; }
  .cat-icon.c6{ background:#e9f7f5; color:#0e8a7c; }

  /* =========================================================
     5. PIED DE PAGE
  ========================================================= */
  footer{
    background:var(--navy-950);
    color:#c4cce3;
    padding:52px 0 28px;
    margin-top:24px;
  }
  .footer-grid{
    display:grid;
    grid-template-columns:1.4fr 1fr 1fr 1fr;
    gap:32px;
    padding-bottom:32px;
    border-bottom:1px solid rgba(255,255,255,0.08);
  }
  .footer-grid h4{
    color:#fff;
    font-size:14px;
    margin-bottom:14px;
  }
  .footer-grid ul li{ margin-bottom:10px; }
  .footer-grid ul li a{ font-size:13.5px; color:#a9b3cc; transition:color .15s ease; }
  .footer-grid ul li a:hover{ color:#fff; }
  .footer-bottom{
    padding-top:22px;
    display:flex;
    justify-content:space-between;
    font-size:12.5px;
    color:#7f89a6;
    flex-wrap:wrap;
    gap:12px;
  }

  /* =========================================================
     6. ADAPTATION MOBILE
     L'image reste visible et claire sur mobile aussi !
  ========================================================= */
  @media (max-width:960px){
    .hero{
      background: 
        linear-gradient(160deg, rgba(10, 21, 48, 0.40), rgba(14, 28, 63, 0.30) 60%, rgba(21, 39, 82, 0.25)),
        url('{{ asset("etudiants-lecture.png") }}') no-repeat center center / contain;
      min-height:500px;
    }
    .hero::before {
      width: 100%;
      background: linear-gradient(to bottom, rgba(10, 21, 48, 0.60), rgba(10, 21, 48, 0.30) 60%, transparent 100%);
    }
    .hero-text{
      max-width:100%;
      text-align:center;
    }
    .hero p.lead{
      max-width:100%;
      margin-left:auto;
      margin-right:auto;
    }
    .search-bar{
      max-width:100%;
      margin-left:auto;
      margin-right:auto;
    }
    .stats-row{
      justify-content:center;
    }
    .cat-grid{ grid-template-columns:repeat(3, 1fr); }
    .footer-grid{ grid-template-columns:1fr 1fr; }
  }
  @media (max-width:720px){
    .container{ padding:0 20px; }
    nav.main-nav{ display:none; }
    .btn-ghost{ display:none; }
    .cat-grid{ grid-template-columns:repeat(2, 1fr); }
    .stats-row{ gap:16px; }
    .footer-grid{ grid-template-columns:1fr; }
    .user-fullname{ display:none; }
    .user-menu-trigger{ padding:4px; border:none; }
    .hero{
      min-height:480px;
      padding:50px 0 40px;
      background: 
        linear-gradient(160deg, rgba(10, 21, 48, 0.45), rgba(14, 28, 63, 0.35) 60%, rgba(21, 39, 82, 0.25)),
        url('{{ asset("etudiants-lecture.png") }}') no-repeat center center / contain;
    }
    .hero h1{
      font-size:clamp(24px, 7vw, 32px);
    }
    .hero p.lead{
      font-size:14px;
    }
    .stat-item strong{
      font-size:16px;
    }
    .search-bar{
      flex-direction:column;
      border-radius:var(--radius-md);
      background:rgba(255,255,255,0.95);
      backdrop-filter:blur(8px);
    }
    .search-bar input{
      padding:14px 16px;
      text-align:center;
    }
    .search-bar button{
      border-radius:var(--radius-md);
      justify-content:center;
      padding:14px;
    }
  }
</style>
</head>
<body>

  <!-- =========================================================
       EN-TÊTE
  ========================================================= -->
  <header class="site-header">
    <div class="container nav-row">
      <a href="#" class="logo">
        <svg width="30" height="30" viewBox="0 0 48 48" fill="none">
          <path d="M6 22 L24 12 L42 22 L24 32 Z" fill="#0e1c3f"/>
          <path d="M4 24c6 2 10 8 20 10 10-2 14-8 20-10" stroke="#2557d6" stroke-width="4" fill="none" stroke-linecap="round"/>
          <path d="M8 26c5 2 9 7 16 8 7-1 11-6 16-8" stroke="#f4901e" stroke-width="3" fill="none" stroke-linecap="round"/>
        </svg>
        <span><span class="edu">Edu</span><span class="benin">Bénin</span></span>
      </a>

      <nav class="main-nav">
        <a href="/Acceuil" class="active">Accueil</a>
        <a href="/Cours">Cours</a>
        <a href="/emplois">Emplois &amp; Stages</a>
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
              @if(Auth::user()->role === 'admin')
                <a href="{{ route('admin.dashboard') }}">
                  <span style="display:inline-flex; align-items:center; gap:8px;">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="9"/><rect x="14" y="3" width="7" height="5"/><rect x="14" y="12" width="7" height="9"/><rect x="3" y="16" width="7" height="5"/></svg>
                    Tableau de bord
                  </span>
                </a>
                <div class="dropdown-divider"></div>
              @endif
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
       HÉRO - IMAGE CLAIRE EN FOND
  ========================================================= -->
  <section class="hero">
    <div class="container hero-grid">
      <div class="hero-text">
        <span class="eyebrow">Plateforme béninoise</span>
        <h1>
          La plateforme tout-en-un pour les
          <span class="accent-orange">étudiants</span>,
          <span class="accent-blue">jeunes</span> du Bénin et
          <span class="accent-violet">Non diplômé du supérieur</span>
        </h1>
        <p class="lead">
          Cours, emplois, stages, bourses et bien plus. Tout ce qu'il te faut pour apprendre, évoluer et réussir, réuni au même endroit.
        </p>

        <form class="search-bar" onsubmit="return false;">
          <input type="text" placeholder="Que recherchez-vous ? (cours, emploi, bourse...)">
          <button type="submit">Rechercher</button>
        </form>

        <div class="stats-row">
          <div class="stat-item">
            <span class="stat-icon">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
            </span>
            <span><strong>{{ $totalCours }}+</strong><span>Cours en ligne</span></span>
          </div>
          <div class="stat-item">
            <span class="stat-icon">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
            </span>
            <span><strong>{{ $totalEmplois }}+</strong><span>Offres d'emploi</span></span>
          </div>
          <div class="stat-item">
            <span class="stat-icon">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10 12 5 2 10l10 5 10-5Z"/><path d="M6 12v5c0 1.5 2.5 3 6 3s6-1.5 6-3v-5"/></svg>
            </span>
            <span><strong>50+</strong><span>Bourses disponibles</span></span>
          </div>
          <div class="stat-item">
            <span class="stat-icon">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
            </span>
            <span><strong>{{ $totalEtudiants }}+</strong><span>Étudiants inscrits</span></span>
          </div>
        </div>
      </div>
    </div>
  </section>

  <!-- =========================================================
       RECOMMANDÉ POUR TOI
  ========================================================= -->
  @auth
    @if($recommandations->count() > 0)
    <section class="section" style="padding-bottom:0;">
      <div class="container">
        <div class="section-head">
          <h2>Recommandé pour toi, {{ Auth::user()->prenom }}</h2>
          <a href="/Cours">Voir tout →</a>
        </div>

        <div class="cat-grid" style="grid-template-columns:repeat(auto-fit, minmax(200px, 1fr));">
          @foreach($recommandations as $livre)
          <a class="cat-card" href="{{ route('cours.consulter', $livre) }}" target="_blank" rel="noopener">
            <span class="cat-icon c3">
              @if($livre->type === 'livre')
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
              @else
                <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
              @endif
            </span>
            <h3>{{ $livre->titre }}</h3>
            <p>{{ $livre->categorie }}</p>
          </a>
          @endforeach
        </div>
      </div>
    </section>
    @endif
  @endauth

  <!-- =========================================================
       DERNIERS COURS AJOUTÉS
  ========================================================= -->
  @if($derniersLivres->count() > 0)
  <section class="section">
    <div class="container">
      <div class="section-head">
        <h2>Derniers cours ajoutés</h2>
        <a href="/Cours">Voir tout →</a>
      </div>

      <div class="cat-grid" style="grid-template-columns:repeat(auto-fit, minmax(200px, 1fr));">
        @foreach($derniersLivres as $livre)
        <a class="cat-card" href="{{ route('cours.consulter', $livre) }}" target="_blank" rel="noopener">
          <span class="cat-icon c1">
            @if($livre->type === 'livre')
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
            @else
              <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
            @endif
          </span>
          <h3>{{ $livre->titre }}</h3>
          <p>{{ $livre->categorie }} · {{ $livre->created_at->diffForHumans() }}</p>
        </a>
        @endforeach
      </div>
    </div>
  </section>
  @endif

  <!-- =========================================================
       CATÉGORIES POPULAIRES
  ========================================================= -->
  <section class="section">
    <div class="container">
      <div class="section-head">
        <h2>Catégories populaires</h2>
        <a href="#">Voir tout →</a>
      </div>

      <div class="cat-grid">
        @forelse($categoriesPopulaires as $index => $cat)
        <a class="cat-card" href="/Cours?categorie={{ urlencode($cat->categorie) }}">
          <span class="cat-icon c{{ ($index % 6) + 1 }}">
            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="3" width="20" height="14" rx="2"/><path d="M8 21h8M12 17v4"/></svg>
          </span>
          <h3>{{ $cat->categorie }}</h3>
          <p>{{ $cat->total }} cours</p>
        </a>
        @empty
        <p style="color:var(--ink-400); grid-column:1/-1;">Aucune catégorie disponible pour le moment.</p>
        @endforelse
      </div>
    </div>
  </section>

  <!-- =========================================================
       PIED DE PAGE
  ========================================================= -->
  <footer>
    <div class="container">
      <div class="footer-grid">
        <div>
          <a href="#" class="logo" style="margin-bottom:12px;">
            <svg width="26" height="26" viewBox="0 0 48 48" fill="none">
              <path d="M6 22 L24 12 L42 22 L24 32 Z" fill="#fff"/>
              <path d="M4 24c6 2 10 8 20 10 10-2 14-8 20-10" stroke="#7fa2ff" stroke-width="4" fill="none" stroke-linecap="round"/>
              <path d="M8 26c5 2 9 7 16 8 7-1 11-6 16-8" stroke="#f4901e" stroke-width="3" fill="none" stroke-linecap="round"/>
            </svg>
            <span style="color:#fff;">EduBénin</span>
          </a>
          <p style="font-size:13px; max-width:280px; margin-top:10px;">La plateforme tout-en-un pour apprendre, évoluer et réussir au Bénin.</p>
        </div>
        <div>
          <h4>Plateforme</h4>
          <ul>
            <li><a href="Cours.blade.php">Cours</a></li>
            <li><a href="#">Emplois &amp; Stages</a></li>
            <li><a href="#">Bourses</a></li>
          </ul>
        </div>
        <div>
          <h4>Ressources</h4>
          <ul>
            <li><a href="#">Blog</a></li>
            <li><a href="#">Guides</a></li>
            <li><a href="#">Communauté</a></li>
          </ul>
        </div>
        <div>
          <h4>Compte</h4>
          <ul>
            <li><a href="#">Se connecter</a></li>
            <li><a href="#">S'inscrire</a></li>
            <li><a href="#">Aide</a></li>
          </ul>
        </div>
      </div>
      <div class="footer-bottom">
        <span> copyright &copy; <strong>BODEM</strong> © 2026 EduBénin. Tous droits réservés.</span>
        <span>Conçu et développé au Bénin</span>
      </div>
    </div>
  </footer>

  <script>
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