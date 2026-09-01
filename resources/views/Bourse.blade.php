<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Bourses — EduBénin</title>
<meta name="description" content="Bourses partagées par la communauté EduBénin.">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
  /* =========================================================
     1. VARIABLES DE MARQUE (identiques aux autres pages)
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
    --bg-soft:#faf4e9;
    --border:#ece1d0;
    --danger:#c4442e;
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
     2. EN-TÊTE (identique aux autres pages)
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
     Ton volontairement chaleureux : c'est un espace communautaire,
     pas un formulaire administratif froid.
  ========================================================= */
  .page-banner{ background:linear-gradient(160deg, #241a14, #2f2219 55%, #3a2a1e); color:#fff; padding:44px 0 40px; }
  .page-banner h1{ font-size:clamp(26px, 3vw, 34px); font-weight:800; }
  .page-banner p{ margin-top:10px; color:#ddd0c2; font-size:15px; max-width:580px; }
  .banner-actions{ margin-top:24px; display:flex; gap:12px; flex-wrap:wrap; }
  .btn-warm{
    background:var(--orange-500); color:#fff; font-weight:700; padding:12px 22px; border-radius:999px;
    transition:background .15s ease, transform .12s ease;
  }
  .btn-warm:hover{ background:var(--orange-600); }
  .btn-outline-light{
    color:#fff; border:1px solid rgba(255,255,255,0.35); padding:12px 22px; border-radius:999px; font-weight:600;
    transition:border-color .15s ease, background .15s ease;
  }
  .btn-outline-light:hover{ background:rgba(255,255,255,0.1); }

  /* =========================================================
     4. FORMULAIRE "PUBLIER UNE BOURSE"
     Accessible à tout le monde. On garde un ton simple, humain,
     comme si on remplissait un petit carnet plutôt qu'un formulaire
     administratif. Pas de logique d'envoi ici : ce sera branché
     sur BourseController@store côté Laravel plus tard.
  ========================================================= -->
  .publish-card{
    background:#fff; border:1px solid var(--border); border-radius:var(--radius-lg);
    padding:28px; margin-top:-64px; position:relative; z-index:5; box-shadow:var(--shadow-hover);
    display:none; /* masqué par défaut, ouvert au clic sur "Publier une bourse" */
  }
  .publish-card.open{ display:block; }
  .publish-head{ display:flex; align-items:center; justify-content:space-between; margin-bottom:6px; }
  .publish-head h2{ font-size:18px; font-weight:700; }
  .publish-sub{ font-size:13.5px; color:var(--ink-600); margin-bottom:20px; }
  .form-grid{ display:grid; grid-template-columns:1fr 1fr; gap:16px; }
  .form-field{ display:flex; flex-direction:column; gap:6px; }
  .form-field.full{ grid-column:1 / -1; }
  .form-field label{ font-size:13px; font-weight:600; color:var(--ink-900); }
  .form-field input, .form-field select, .form-field textarea{
    border:1px solid var(--border); border-radius:var(--radius-sm); padding:10px 12px;
    font-family:inherit; font-size:14px; color:var(--ink-900); background:var(--bg-soft);
    outline:none; transition:border-color .15s ease;
  }
  .form-field input:focus, .form-field select:focus, .form-field textarea:focus{ border-color:var(--orange-500); }
  .form-field textarea{ resize:vertical; min-height:80px; }
  .form-note{
    font-size:12.5px; color:var(--ink-400); margin-top:14px; display:flex; gap:8px; align-items:flex-start;
    background:var(--orange-100); padding:12px 14px; border-radius:var(--radius-sm);
  }
  .form-actions{ margin-top:18px; display:flex; justify-content:flex-end; gap:10px; }

  /* =========================================================
     5. FILTRES + LISTE DES BOURSES
  ========================================================= */
  .filter-bar{ padding:36px 0 8px; }
  .filter-row{ display:flex; align-items:center; justify-content:space-between; gap:16px; flex-wrap:wrap; }
  .type-tabs{ display:flex; gap:8px; background:#fff; border:1px solid var(--border); border-radius:999px; padding:4px; }
  .type-tabs button{ font-size:13.5px; font-weight:600; color:var(--ink-600); padding:8px 16px; border-radius:999px; background:transparent; transition:background .15s ease, color .15s ease; }
  .type-tabs button.active{ background:var(--navy-900); color:#fff; }
  .sort-select{
    font-size:13.5px; font-weight:600; color:var(--ink-600); background:#fff;
    border:1px solid var(--border); border-radius:999px; padding:9px 16px;
  }

  .bourse-list{ display:flex; flex-direction:column; gap:16px; padding:24px 0 64px; }
  .bourse-card{
    background:#fff; border:1px solid var(--border); border-radius:var(--radius-md);
    padding:22px; display:grid; grid-template-columns:1fr auto; gap:16px;
    transition:box-shadow .15s ease, border-color .15s ease;
  }
  .bourse-card:hover{ box-shadow:var(--shadow-card); }
  .bourse-main{ display:flex; flex-direction:column; gap:8px; }
  .bourse-tags{ display:flex; gap:8px; flex-wrap:wrap; }
  .tag{ font-size:11px; font-weight:700; padding:4px 10px; border-radius:999px; }
  .tag.intl{ background:var(--blue-100); color:var(--blue-600); }
  .tag.nat{ background:var(--orange-100); color:var(--orange-600); }
  .tag.urgent{ background:#fbe6e1; color:var(--danger); }
  .bourse-main h3{ font-size:17px; font-weight:700; }
  .bourse-org{ font-size:13.5px; color:var(--ink-600); }
  .bourse-desc{ font-size:13.5px; color:var(--ink-600); line-height:1.55; max-width:620px; }
  .bourse-meta{ display:flex; gap:18px; flex-wrap:wrap; margin-top:4px; font-size:12.5px; color:var(--ink-400); }
  .bourse-meta span{ display:flex; align-items:center; gap:5px; }

  /* Bloc "posté par" : c'est ici qu'on rend la page humaine, en
     montrant clairement qui a partagé l'information */
  .posted-by{ display:flex; align-items:center; gap:8px; margin-top:10px; }
  .avatar{
    width:26px; height:26px; border-radius:999px; display:flex; align-items:center; justify-content:center;
    font-size:11px; font-weight:700; color:#fff; flex-shrink:0;
  }
  .posted-by .who{ font-size:12.5px; color:var(--ink-600); }
  .posted-by .who strong{ color:var(--ink-900); font-weight:600; }

  /* Colonne d'actions à droite de chaque carte : lien vers la
     bourse, signalement communautaire, suppression (réservée à
     la modération — visible ici pour la démo, à cacher plus tard
     derrière une vérification de rôle admin côté Laravel). */
  .bourse-actions{ display:flex; flex-direction:column; align-items:flex-end; justify-content:space-between; gap:10px; }
  .bourse-cta{
    font-size:13px; font-weight:700; color:#fff; background:var(--blue-600);
    padding:9px 18px; border-radius:999px; white-space:nowrap; transition:background .15s ease;
  }
  .bourse-cta:hover{ background:var(--blue-700); }
  .mini-actions{ display:flex; gap:6px; }
  .mini-btn{
    width:32px; height:32px; border-radius:999px; display:flex; align-items:center; justify-content:center;
    border:1px solid var(--border); color:var(--ink-400); background:#fff; transition:all .15s ease;
  }
  .mini-btn:hover{ color:var(--ink-900); border-color:var(--ink-400); }
  .mini-btn.admin-delete{ color:var(--danger); border-color:#f3d3cb; }
  .mini-btn.admin-delete:hover{ background:var(--danger); color:#fff; border-color:var(--danger); }

  /* Repère visuel pour signaler que ce bouton n'est visible que
     par l'équipe EduBénin (toi) — purement indicatif ici */
  .admin-only-badge{
    font-size:10px; font-weight:700; color:var(--danger); text-transform:uppercase; letter-spacing:.04em;
  }

  .bourse-card.is-hidden{ display:none; }

  footer{ background:#241a14; color:#ddd0c2; padding:44px 0 24px; margin-top:24px; }
  .footer-bottom{ display:flex; justify-content:space-between; font-size:12.5px; color:#a6957f; flex-wrap:wrap; gap:10px; }

  @media (max-width:900px){
    .bourse-card{ grid-template-columns:1fr; }
    .bourse-actions{ flex-direction:row; align-items:center; }
    .form-grid{ grid-template-columns:1fr; }
  }
  @media (max-width:720px){
    .container{ padding:0 20px; }
    nav.main-nav{ display:none; }
    .btn-ghost{ display:none; }
    .publish-card{ margin-top:-40px; padding:20px; }
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
      <a href="index.html" class="logo">
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
        <a href="/Bourse" class="active">Bourses</a>
        <a href="/ressources">Ressources</a>
        <a href="/communauté">Communauté</a>
      </nav>
      <div class="nav-actions">
        <button class="icon-btn" aria-label="Rechercher">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="11" cy="11" r="7"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
        </button>
        <a href="/Connexion" class="btn btn-ghost">Se connecter</a>
        <a href="/Inscription" class="btn btn-primary">S'inscrire</a>
      </div>
    </div>
  </header>

  <!-- =========================================================
       BANDEAU DE PAGE
       On explique tout de suite la règle du jeu : c'est ouvert à
       tous, et l'équipe modère après coup — pas de validation
       préalable qui ralentirait le partage d'une info utile.
  ========================================================= -->
  <section class="page-banner">
    <div class="container">
      <h1>Bourses partagées par la communauté</h1>
      <p>Une bourse que tu as trouvée ? Partage-la, elle pourra aider quelqu'un d'autre. Chaque publication reste visible tant qu'elle respecte les règles ; l'équipe EduBénin retire ce qui est frauduleux ou illégal.</p>
      <div class="banner-actions">
        <button type="button" class="btn-warm" id="btn-open-publish">+ Publier une bourse</button>
        <a href="#liste-bourses" class="btn-outline-light">Voir les bourses</a>
      </div>
    </div>
  </section>

  <!-- =========================================================
       FORMULAIRE DE PUBLICATION
       Ouvert/fermé en JS. Reste volontairement court : titre,
       organisme, dates, lien, description — le strict nécessaire
       pour publier vite.
  ========================================================= -->
  <div class="container">
    <div class="publish-card" id="publish-card">
      <div class="publish-head">
        <h2>Partager une bourse</h2>
        <button type="button" class="icon-btn" id="btn-close-publish" aria-label="Fermer">
          <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><line x1="18" y1="6" x2="6" y2="18"/><line x1="6" y1="6" x2="18" y2="18"/></svg>
        </button>
      </div>
      <p class="publish-sub">Deux minutes suffisent. Assure-toi juste que le lien ou le contact indiqué est bien officiel.</p>

      <form onsubmit="return false;">
        <div class="form-grid">
          <div class="form-field full">
            <label for="f-titre">Titre de la bourse</label>
            <input type="text" id="f-titre" placeholder="Ex. : Bourse d'excellence du Gouvernement béninois">
          </div>
          <div class="form-field">
            <label for="f-organisme">Organisme</label>
            <input type="text" id="f-organisme" placeholder="Ex. : Ministère de l'Enseignement supérieur">
          </div>
          <div class="form-field">
            <label for="f-type">Type</label>
            <select id="f-type">
              <option>Nationale</option>
              <option>Internationale</option>
            </select>
          </div>
          <div class="form-field">
            <label for="f-niveau">Niveau concerné</label>
            <input type="text" id="f-niveau" placeholder="Ex. : Licence, Master...">
          </div>
          <div class="form-field">
            <label for="f-deadline">Date limite</label>
            <input type="date" id="f-deadline">
          </div>
          <div class="form-field full">
            <label for="f-lien">Lien ou contact officiel</label>
            <input type="text" id="f-lien" placeholder="https://... ou une adresse e-mail">
          </div>
          <div class="form-field full">
            <label for="f-description">Description</label>
            <textarea id="f-description" placeholder="Conditions, montant couvert, comment postuler..."></textarea>
          </div>
        </div>

        <p class="form-note">
          <span>ℹ️</span>
          <span>En publiant, tu confirmes que cette bourse est réelle et vérifiable. Les publications trompeuses ou frauduleuses sont supprimées et peuvent entraîner un bannissement.</span>
        </p>

        <div class="form-actions">
          <button type="button" class="btn btn-ghost" id="btn-cancel-publish">Annuler</button>
          <button type="submit" class="btn btn-primary">Publier la bourse</button>
        </div>
      </form>
    </div>
  </div>

  <!-- =========================================================
       FILTRES
  ========================================================= -->
  <section class="filter-bar" id="liste-bourses">
    <div class="container filter-row">
      <div class="type-tabs" role="tablist" aria-label="Filtrer par type">
        <button type="button" class="active" data-filter="toutes">Toutes</button>
        <button type="button" data-filter="nat">Nationales</button>
        <button type="button" data-filter="intl">Internationales</button>
      </div>
      <select class="sort-select">
        <option>Date limite la plus proche</option>
        <option>Plus récemment publiées</option>
      </select>
    </div>
  </section>

  <!-- =========================================================
       LISTE DES BOURSES
       Chaque carte montre clairement qui l'a publiée (nom + avatar)
       pour garder un ton humain et responsabiliser les auteurs.
       Les icônes "Signaler" (tout le monde) et "Supprimer" (équipe
       EduBénin seulement, à restreindre plus tard via un rôle admin
       Laravel) permettent la modération après publication.
  ========================================================= -->
  <main class="container">
    <div class="bourse-list">

      <article class="bourse-card" data-type="nat">
        <div class="bourse-main">
          <div class="bourse-tags">
            <span class="tag nat">Nationale</span>
            <span class="tag urgent">Clôture dans 6 jours</span>
          </div>
          <h3>Bourse d'excellence du Gouvernement béninois</h3>
          <p class="bourse-org">Ministère de l'Enseignement supérieur et de la Recherche scientifique</p>
          <p class="bourse-desc">Destinée aux bacheliers ayant obtenu une mention Bien ou plus. Couvre les frais de scolarité et une allocation mensuelle pour les filières prioritaires.</p>
          <div class="bourse-meta">
            <span>🎓 Licence</span>
            <span>📅 Limite : 24 août 2026</span>
            <span>💰 Prise en charge complète</span>
          </div>
          <div class="posted-by">
            <span class="avatar" style="background:#2557d6">AK</span>
            <span class="who">Publié par <strong>Awa Kpodéhoun</strong> · il y a 3 jours</span>
          </div>
        </div>
        <div class="bourse-actions">
          <a href="#" class="bourse-cta">Voir l'offre</a>
          <div class="mini-actions">
            <button class="mini-btn" title="Signaler cette publication" aria-label="Signaler">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 15V4"/><path d="M4 4h11l2 3 5-1v9l-5-1-2 3H4"/></svg>
            </button>
            <button class="mini-btn admin-delete" title="Supprimer (équipe EduBénin)" aria-label="Supprimer">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/></svg>
            </button>
          </div>
        </div>
      </article>

      <article class="bourse-card" data-type="intl">
        <div class="bourse-main">
          <div class="bourse-tags"><span class="tag intl">Internationale</span></div>
          <h3>Bourse Campus France — Master en France</h3>
          <p class="bourse-org">Ambassade de France au Bénin</p>
          <p class="bourse-desc">Pour les étudiants béninois admis dans une université française partenaire. Comprend une prise en charge partielle du logement et un billet d'avion aller-retour.</p>
          <div class="bourse-meta">
            <span>🎓 Master</span>
            <span>📅 Limite : 30 septembre 2026</span>
            <span>💰 Prise en charge partielle</span>
          </div>
          <div class="posted-by">
            <span class="avatar" style="background:#159862">RG</span>
            <span class="who">Publié par <strong>Rachidi Gomez</strong> · il y a 1 semaine</span>
          </div>
        </div>
        <div class="bourse-actions">
          <a href="#" class="bourse-cta">Voir l'offre</a>
          <div class="mini-actions">
            <button class="mini-btn" title="Signaler cette publication" aria-label="Signaler">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 15V4"/><path d="M4 4h11l2 3 5-1v9l-5-1-2 3H4"/></svg>
            </button>
            <button class="mini-btn admin-delete" title="Supprimer (équipe EduBénin)" aria-label="Supprimer">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/></svg>
            </button>
          </div>
        </div>
      </article>

      <article class="bourse-card" data-type="intl">
        <div class="bourse-main">
          <div class="bourse-tags"><span class="tag intl">Internationale</span></div>
          <h3>Bourse Erasmus+ — Mobilité étudiante</h3>
          <p class="bourse-org">Union européenne</p>
          <p class="bourse-desc">Ouvre droit à un semestre d'études dans une université européenne partenaire, avec une allocation mensuelle pendant toute la durée du séjour.</p>
          <div class="bourse-meta">
            <span>🎓 Licence &amp; Master</span>
            <span>📅 Limite : 15 novembre 2026</span>
            <span>💰 Allocation mensuelle</span>
          </div>
          <div class="posted-by">
            <span class="avatar" style="background:#d13a6b">LS</span>
            <span class="who">Publié par <strong>Linda Sossou</strong> · il y a 2 semaines</span>
          </div>
        </div>
        <div class="bourse-actions">
          <a href="#" class="bourse-cta">Voir l'offre</a>
          <div class="mini-actions">
            <button class="mini-btn" title="Signaler cette publication" aria-label="Signaler">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 15V4"/><path d="M4 4h11l2 3 5-1v9l-5-1-2 3H4"/></svg>
            </button>
            <button class="mini-btn admin-delete" title="Supprimer (équipe EduBénin)" aria-label="Supprimer">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/></svg>
            </button>
          </div>
        </div>
      </article>

      <article class="bourse-card" data-type="nat">
        <div class="bourse-main">
          <div class="bourse-tags"><span class="tag nat">Nationale</span></div>
          <h3>Bourse municipale de la ville de Cotonou</h3>
          <p class="bourse-org">Mairie de Cotonou</p>
          <p class="bourse-desc">Réservée aux jeunes résidents de Cotonou inscrits en filière technique ou scientifique. Aide au paiement des frais de scolarité annuels.</p>
          <div class="bourse-meta">
            <span>🎓 Tous niveaux</span>
            <span>📅 Limite : 10 octobre 2026</span>
            <span>💰 Aide aux frais de scolarité</span>
          </div>
          <div class="posted-by">
            <span class="avatar" style="background:#5b5fe0">JD</span>
            <span class="who">Publié par <strong>Équipe EduBénin</strong> · il y a 4 jours</span>
          </div>
        </div>
        <div class="bourse-actions">
          <a href="#" class="bourse-cta">Voir l'offre</a>
          <div class="mini-actions">
            <button class="mini-btn" title="Signaler cette publication" aria-label="Signaler">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 15V4"/><path d="M4 4h11l2 3 5-1v9l-5-1-2 3H4"/></svg>
            </button>
            <button class="mini-btn admin-delete" title="Supprimer (équipe EduBénin)" aria-label="Supprimer">
              <svg width="15" height="15" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18"/><path d="M8 6V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/></svg>
            </button>
          </div>
        </div>
      </article>

    </div>
  </main>

  <!-- =========================================================
       PIED DE PAGE
  ========================================================= -->
  <footer>
    <div class="container footer-bottom">
      <span> copyright &copy; <strong>BODEM</strong>
      <span>© 2026 EduBénin. Tous droits réservés.</span>
      <span>Conçu et développé au Bénin</span>
    </div>
  </footer>

  <script>
    // =========================================================
    // OUVERTURE / FERMETURE DU FORMULAIRE DE PUBLICATION
    // =========================================================
    const carteFormulaire = document.getElementById('publish-card');
    document.getElementById('btn-open-publish').addEventListener('click', () => {
      carteFormulaire.classList.add('open');
      carteFormulaire.scrollIntoView({ behavior:'smooth', block:'start' });
    });
    document.getElementById('btn-close-publish').addEventListener('click', () => carteFormulaire.classList.remove('open'));
    document.getElementById('btn-cancel-publish').addEventListener('click', () => carteFormulaire.classList.remove('open'));

    // =========================================================
    // FILTRE NATIONALES / INTERNATIONALES
    // =========================================================
    const boutonsFiltre = document.querySelectorAll('.type-tabs button');
    const cartesBourses = document.querySelectorAll('.bourse-card');
    boutonsFiltre.forEach(bouton => {
      bouton.addEventListener('click', () => {
        boutonsFiltre.forEach(b => b.classList.remove('active'));
        bouton.classList.add('active');
        const filtre = bouton.dataset.filter;
        cartesBourses.forEach(carte => {
          carte.classList.toggle('is-hidden', !(filtre === 'toutes' || carte.dataset.type === filtre));
        });
      });
    });

    // =========================================================
    // SUPPRESSION (réservée à l'équipe EduBénin)
    // Ici on retire simplement la carte de l'écran. Plus tard,
    // ce bouton appellera une route Laravel du type
    // DELETE /admin/bourses/{id}, protégée par un middleware admin.
    // =========================================================
    document.querySelectorAll('.admin-delete').forEach(bouton => {
      bouton.addEventListener('click', () => {
        const carte = bouton.closest('.bourse-card');
        if (confirm('Supprimer cette bourse ? Cette action est réservée à la modération EduBénin.')) {
          carte.remove();
        }
      });
    });

    // =========================================================
    // SIGNALEMENT (accessible à tout membre de la communauté)
    // Pour l'instant, simple confirmation visuelle. Plus tard :
    // POST /bourses/{id}/signaler, avec un compteur affiché
    // uniquement côté modération.
    // =========================================================
    document.querySelectorAll('.mini-btn:not(.admin-delete)').forEach(bouton => {
      bouton.addEventListener('click', () => {
        bouton.innerHTML = '✓';
        bouton.style.color = '#159862';
        bouton.style.borderColor = '#159862';
        bouton.title = 'Signalement envoyé à l\'équipe EduBénin';
      });
    });
  </script>

</body>
</html>