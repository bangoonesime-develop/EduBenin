<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Communauté — EduBénin</title>
<meta name="description" content="Rejoins le groupe WhatsApp de ta filière et échange avec d'autres étudiants du Bénin.">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
  /* =========================================================
     1. VARIABLES DE MARQUE
  ========================================================= */
  :root{
    --navy-950:#0a1530;
    --navy-900:#0e1c3f;
    --blue-600:#2557d6;
    --blue-700:#1a44b8;
    --blue-100:#e8eefc;
    --orange-500:#f4901e;
    --orange-600:#e07c0b;
    --orange-100:#fef1e2;
    --whatsapp:#25d366;
    --whatsapp-dark:#1eb959;
    --ink-900:#101828;
    --ink-600:#4b5468;
    --ink-400:#8891a3;
    --paper:#ffffff;
    --bg-soft:#faf4e9;
    --border:#ece1d0;
    --radius-lg:18px;
    --radius-md:12px;
    --radius-sm:8px;
    --shadow-card:0 4px 20px rgba(60,40,20,0.06);
    --shadow-hover:0 10px 30px rgba(60,40,20,0.12);
  }
  *{ box-sizing:border-box; margin:0; padding:0; }
  html{ scroll-behavior:smooth; }
  body{ font-family:'Inter', system-ui, sans-serif; color:var(--ink-900); background:var(--bg-soft); -webkit-font-smoothing:antialiased; }
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
  header.site-header{ position:sticky; top:0; z-index:100; background:rgba(255,255,255,0.94); backdrop-filter:blur(8px); border-bottom:1px solid var(--border); }
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
  .icon-btn{ width:38px; height:38px; display:flex; align-items:center; justify-content:center; border-radius:999px; background:transparent; color:var(--ink-600); transition:background .15s ease; }
  .icon-btn:hover{ background:var(--bg-soft); }
  .btn{ font-size:14px; font-weight:600; padding:10px 18px; border-radius:999px; transition:transform .12s ease, box-shadow .12s ease, background .15s ease; display:inline-flex; align-items:center; gap:6px; }
  .btn:active{ transform:scale(.97); }
  .btn-ghost{ color:var(--navy-900); background:transparent; border:1px solid var(--border); }
  .btn-ghost:hover{ background:var(--bg-soft); }
  .btn-primary{ background:var(--navy-900); color:#fff; }
  .btn-primary:hover{ box-shadow:var(--shadow-hover); }

  /* =========================================================
     3. BANDEAU DE PAGE
  ========================================================= */
  .page-banner{ background:linear-gradient(160deg, #241a14, #2f2219 55%, #3a2a1e); color:#fff; padding:44px 0 40px; }
  .page-banner h1{ font-size:clamp(26px, 3vw, 34px); font-weight:800; }
  .page-banner p{ margin-top:10px; color:#ddd0c2; font-size:15px; max-width:580px; }
  .banner-actions{ margin-top:24px; display:flex; gap:12px; flex-wrap:wrap; }
  .btn-warm{ background:var(--orange-500); color:#fff; font-weight:700; padding:12px 22px; border-radius:999px; transition:background .15s ease; }
  .btn-warm:hover{ background:var(--orange-600); }
  .btn-outline-light{ color:#fff; border:1px solid rgba(255,255,255,0.35); padding:12px 22px; border-radius:999px; font-weight:600; transition:background .15s ease; }
  .btn-outline-light:hover{ background:rgba(255,255,255,0.1); }

  /* =========================================================
     4. GROUPE GÉNÉRAL
  ========================================================= */
  .general-card{
    background:#fff; border:1px solid var(--border); border-radius:var(--radius-lg);
    padding:24px; margin-top:-24px; position:relative; z-index:5; box-shadow:var(--shadow-hover);
    display:flex; align-items:center; justify-content:space-between; gap:20px; flex-wrap:wrap;
  }
  .general-card .left{ display:flex; align-items:center; gap:16px; }
  .general-icon{
    width:52px; height:52px; border-radius:14px; background:#e6f9ee; color:var(--whatsapp-dark);
    display:flex; align-items:center; justify-content:center; flex-shrink:0;
  }
  .general-card h2{ font-size:16.5px; font-weight:700; }
  .general-card p{ font-size:13px; color:var(--ink-600); margin-top:2px; }
  .whatsapp-btn{
    display:inline-flex; align-items:center; gap:8px; background:var(--whatsapp); color:#fff;
    font-weight:700; font-size:13.5px; padding:11px 20px; border-radius:999px; white-space:nowrap;
    transition:background .15s ease;
  }
  .whatsapp-btn:hover{ background:var(--whatsapp-dark); }

  /* =========================================================
     5. FILTRES / RECHERCHE
  ========================================================= */
  .filter-bar{ padding:40px 0 20px; }
  .filter-row{ display:flex; align-items:center; justify-content:space-between; gap:16px; flex-wrap:wrap; }
  .filter-row h2{ font-size:20px; font-weight:700; }
  .search-mini{ display:flex; align-items:center; gap:8px; background:#fff; border:1px solid var(--border); border-radius:999px; padding:8px 16px; min-width:260px; }
  .search-mini input{ border:none; outline:none; font-size:13.5px; font-family:inherit; flex:1; background:transparent; color:var(--ink-900); }
  .search-mini input::placeholder{ color:var(--ink-400); }

  /* =========================================================
     6. GRILLE DES FILIÈRES — générée depuis la table `filieres`
  ========================================================= */
  .filiere-grid{ display:grid; grid-template-columns:repeat(3, 1fr); gap:20px; padding-bottom:64px; }
  .filiere-card{
    background:#fff; border:1px solid var(--border); border-radius:var(--radius-md);
    padding:22px; display:flex; flex-direction:column; gap:14px;
    transition:transform .15s ease, box-shadow .15s ease;
  }
  .filiere-card:hover{ transform:translateY(-3px); box-shadow:var(--shadow-card); }
  .filiere-top{ display:flex; align-items:center; gap:12px; }
  .filiere-icon{ width:44px; height:44px; border-radius:12px; display:flex; align-items:center; justify-content:center; flex-shrink:0; font-weight:800; font-size:16px; }
  .filiere-top h3{ font-size:15.5px; font-weight:700; }
  .filiere-count{ font-size:12px; color:var(--ink-400); }
  .filiere-desc{ font-size:13px; color:var(--ink-600); line-height:1.5; }
  .filiere-footer{ display:flex; align-items:center; justify-content:space-between; gap:10px; margin-top:auto; }
  .copy-link-btn{
    width:36px; height:36px; border-radius:999px; border:1px solid var(--border); background:#fff;
    color:var(--ink-400); display:flex; align-items:center; justify-content:center; transition:all .15s ease; flex-shrink:0;
  }
  .copy-link-btn:hover{ color:var(--ink-900); border-color:var(--ink-400); }
  .copy-link-btn.copied{ color:var(--whatsapp-dark); border-color:var(--whatsapp); }

  .filiere-card.is-hidden{ display:none; }
  .empty-filieres{ text-align:center; padding:60px 20px; color:var(--ink-400); font-size:14px; }

  /* =========================================================
     7. FORMULAIRE "PROPOSER UN GROUPE"
  ========================================================= */
  .propose-section{ padding:20px 0 64px; }
  .propose-card{
    background:#fff; border:1px solid var(--border); border-radius:var(--radius-lg); padding:28px;
    display:none;
  }
  .propose-card.open{ display:block; }
  .propose-head{ display:flex; align-items:center; justify-content:space-between; margin-bottom:6px; }
  .propose-head h2{ font-size:18px; font-weight:700; }
  .propose-sub{ font-size:13.5px; color:var(--ink-600); margin-bottom:20px; }
  .form-grid{ display:grid; grid-template-columns:1fr 1fr; gap:16px; }
  .form-field{ display:flex; flex-direction:column; gap:6px; }
  .form-field.full{ grid-column:1 / -1; }
  .form-field label{ font-size:13px; font-weight:600; }
  .form-field input, .form-field select, .form-field textarea{
    border:1px solid var(--border); border-radius:var(--radius-sm); padding:10px 12px;
    font-family:inherit; font-size:14px; color:var(--ink-900); background:var(--bg-soft); outline:none;
    transition:border-color .15s ease;
  }
  .form-field input:focus, .form-field select:focus{ border-color:var(--orange-500); }
  .form-note{ font-size:12.5px; color:var(--ink-400); margin-top:14px; display:flex; gap:8px; background:var(--orange-100); padding:12px 14px; border-radius:var(--radius-sm); }
  .form-actions{ margin-top:18px; display:flex; justify-content:flex-end; gap:10px; }
  .open-propose-row{ text-align:center; padding-top:8px; }
  .open-propose-row p{ font-size:13.5px; color:var(--ink-600); margin-bottom:10px; }

  footer{ background:#241a14; color:#ddd0c2; padding:44px 0 24px; }
  .footer-bottom{ display:flex; justify-content:space-between; font-size:12.5px; color:#a6957f; flex-wrap:wrap; gap:10px; }

  @media (max-width:960px){ .filiere-grid{ grid-template-columns:repeat(2, 1fr); } }
  @media (max-width:720px){
    .container{ padding:0 20px; }
    nav.main-nav{ display:none; }
    .btn-ghost{ display:none; }
    .filiere-grid{ grid-template-columns:1fr; }
    .general-card{ margin-top:-40px; flex-direction:column; align-items:flex-start; }
    .form-grid{ grid-template-columns:1fr; }
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
        <a href="/Cours">Cours</a>
        <a href="/emplois">Emplois &amp; Stages</a>
        <a href="/Bourse">Bourses</a>
        <a href="/ressources">Ressources</a>
        <a href="/communauté" class="active">Communauté</a>
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
      <h1>Rejoins le groupe WhatsApp de ta filière</h1>
      <p>La discussion se passe là où tout le monde est déjà présent : sur WhatsApp. Choisis ta filière ci-dessous et rejoins le groupe pour poser tes questions, partager des ressources et rencontrer d'autres étudiants.</p>
    </div>
  </section>

  <!-- =========================================================
       GROUPE GÉNÉRAL (toutes filières confondues)
       Reste fixe en dur : ce n'est pas une filière, donc il ne
       vient pas de la table `filieres`.
  ========================================================= -->
  <div class="container">
    <div class="general-card">
      <div class="left">
        <span class="general-icon">
          <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a10 10 0 0 0-8.6 15.1L2 22l5.1-1.3A10 10 0 1 0 12 2Zm5.6 14.2c-.2.7-1.4 1.3-2 1.4-.5.1-1.2.2-3.6-.8-3-1.3-5-4.3-5.1-4.5-.1-.2-1.2-1.6-1.2-3.1 0-1.5.8-2.2 1-2.5.3-.3.6-.4.8-.4h.6c.2 0 .4 0 .6.5.2.5.7 1.8.8 1.9.1.2.1.3 0 .5-.1.2-.1.3-.3.5l-.4.5c-.1.2-.3.3-.1.6.2.3.9 1.5 2 2.4 1.4 1.2 2.5 1.6 2.8 1.8.3.1.5.1.6-.1.2-.2.7-.8.9-1.1.2-.3.4-.2.7-.1.3.1 1.8.9 2.1 1 .3.2.5.2.6.3.1.2.1.9-.1 1.7Z"/></svg>
        </span>
        <div>
          <h2>Groupe général EduBénin</h2>
          <p>Pas encore sûr de ta filière ? Commence ici, tout le monde y est bienvenu.</p>
        </div>
      </div>
      <a href="https://chat.whatsapp.com/EXEMPLE-GENERAL" target="_blank" rel="noopener" class="whatsapp-btn">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a10 10 0 0 0-8.6 15.1L2 22l5.1-1.3A10 10 0 1 0 12 2Z"/></svg>
        Rejoindre sur WhatsApp
      </a>
    </div>
  </div>

  <!-- =========================================================
       FILTRES / RECHERCHE PAR FILIÈRE
  ========================================================= -->
  <section class="filter-bar">
    <div class="container filter-row">
      <h2>Groupes par filière</h2>
      <div class="search-mini">
        <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        <input type="text" id="filiere-search" placeholder="Chercher une filière...">
      </div>
    </div>
  </section>

  <!-- =========================================================
       GRILLE DES FILIÈRES
       $filieres vient de CommunauteController@index
       (Filiere::orderBy('nom')->get()). Pour ajouter, modifier ou
       retirer une filière, il suffit de gérer la table `filieres`
       (par exemple depuis une future section du dashboard admin) —
       plus besoin de toucher au code de cette page.
  ========================================================= -->
  <div class="container">
    @if($filieres->count() === 0)
      <div class="empty-filieres">Aucune filière n'a encore été ajoutée.</div>
    @else
      <div class="filiere-grid">
        @foreach($filieres as $filiere)
          <div class="filiere-card" data-filiere="{{ strtolower($filiere->nom) }}">
            <div class="filiere-top">
              <span class="filiere-icon" style="background:{{ $filiere->couleur }}1A; color:{{ $filiere->couleur }}">
                {{ strtoupper(substr($filiere->nom, 0, 2)) }}
              </span>
              <div>
      <h3>{{ $filiere->nom }}</h3>
      <span class="filiere-count">{{ number_format($filiere->nombre_membres, 0, ',', ' ') }} membres</span>
            </div>
            </div>
            @if($filiere->description)
              <p class="filiere-desc">{{ $filiere->description }}</p>
            @endif
            <div class="filiere-footer">
              <a href="{{ $filiere->lien_whatsapp }}" target="_blank" rel="noopener" class="whatsapp-btn">
                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2a10 10 0 0 0-8.6 15.1L2 22l5.1-1.3A10 10 0 1 0 12 2Z"/></svg>
                Rejoindre
              </a>
              <button class="copy-link-btn" data-href="{{ $filiere->lien_whatsapp }}" title="Copier le lien" aria-label="Copier le lien">
                <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>
              </button>
            </div>
          </div>
        @endforeach
      </div>
    @endif
  </div>

  <!-- =========================================================
       PROPOSER UN GROUPE
  ========================================================= -->
  <section class="propose-section">
    <div class="container">
      <div class="open-propose-row">
        <p>Ta filière n'apparaît pas, ou le lien ne fonctionne plus ?</p>
        <button type="button" class="btn btn-ghost" id="btn-open-propose">+ Proposer un groupe</button>
      </div>

      <div class="propose-card" id="propose-card" style="margin-top:20px;">
        <div class="propose-head">
          <h2>Proposer un groupe WhatsApp</h2>
          <button type="button" class="icon-btn" id="btn-close-propose" aria-label="Fermer">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
          </button>
        </div>
        <p class="propose-sub">Vérifie juste que le lien fonctionne avant de l'envoyer.</p>

        <form onsubmit="return false;">
          <div class="form-grid">
            <div class="form-field">
              <label for="p-filiere">Filière concernée</label>
              <select id="p-filiere">
                @foreach($filieres as $filiere)
                  <option>{{ $filiere->nom }}</option>
                @endforeach
                <option>Autre (à préciser)</option>
              </select>
            </div>
            <div class="form-field">
              <label for="p-lien">Lien du groupe WhatsApp</label>
              <input type="text" id="p-lien" placeholder="https://chat.whatsapp.com/...">
            </div>
            <div class="form-field full">
              <label for="p-note">Petite note (facultatif)</label>
              <input type="text" id="p-note" placeholder="Ex. : groupe déjà actif, admin réactif...">
            </div>
          </div>
          <p class="form-note">
            <span>ℹ️</span>
            <span>Le lien est vérifié avant validation. Les groupes inactifs, à caractère commercial non lié aux études, ou contraires aux règles WhatsApp sont supprimés.</span>
          </p>
          <div class="form-actions">
            <button type="button" class="btn btn-ghost" id="btn-cancel-propose">Annuler</button>
            <button type="submit" class="btn btn-primary">Envoyer le lien</button>
          </div>
        </form>
      </div>
    </div>
  </section>

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
    // RECHERCHE PAR FILIÈRE
    // =========================================================
    const rechercheFiliere = document.getElementById('filiere-search');
    const cartesFilieres = document.querySelectorAll('.filiere-card');
    if (rechercheFiliere) {
      rechercheFiliere.addEventListener('input', () => {
        const terme = rechercheFiliere.value.trim().toLowerCase();
        cartesFilieres.forEach(carte => {
          const nom = carte.dataset.filiere;
          carte.classList.toggle('is-hidden', !nom.includes(terme));
        });
      });
    }

    // =========================================================
    // COPIER LE LIEN DU GROUPE
    // =========================================================
    document.querySelectorAll('.copy-link-btn').forEach(bouton => {
      bouton.addEventListener('click', async () => {
        const lien = bouton.dataset.href;
        try{
          await navigator.clipboard.writeText(lien);
        }catch(e){
          // Copie impossible (permissions navigateur) : on ignore silencieusement
        }
        bouton.classList.add('copied');
        bouton.innerHTML = '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="20 6 9 17 4 12"/></svg>';
        setTimeout(() => {
          bouton.classList.remove('copied');
          bouton.innerHTML = '<svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="9" y="9" width="13" height="13" rx="2"/><path d="M5 15H4a2 2 0 0 1-2-2V4a2 2 0 0 1 2-2h9a2 2 0 0 1 2 2v1"/></svg>';
        }, 1800);
      });
    });

    // =========================================================
    // OUVERTURE / FERMETURE DU FORMULAIRE "PROPOSER UN GROUPE"
    // =========================================================
    const carteProposition = document.getElementById('propose-card');
    document.getElementById('btn-open-propose').addEventListener('click', () => {
      carteProposition.classList.add('open');
      carteProposition.scrollIntoView({ behavior:'smooth', block:'center' });
    });
    document.getElementById('btn-close-propose').addEventListener('click', () => carteProposition.classList.remove('open'));
    document.getElementById('btn-cancel-propose').addEventListener('click', () => carteProposition.classList.remove('open'));

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