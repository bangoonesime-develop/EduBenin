<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Tableau de bord — EduBénin Admin</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
  /* =========================================================
     1. VARIABLES
     Palette noir / blanc / bleu. Le bleu reste la seule couleur
     vive, réservée aux actions et aux repères importants — le
     reste est en niveaux de gris, pour un rendu sobre et lisible.
  ========================================================= */
  :root{
    --side-bg:#0d0d0d;
    --side-hover:#1c1c1c;
    --ink-900:#111111;
    --ink-600:#5c5c5c;
    --ink-400:#8f8f8f;
    --paper:#ffffff;
    --bg-soft:#f6f7f9;
    --border:#e4e6ea;
    --blue-500:#2557d6;
    --blue-600:#1a44b8;
    --blue-100:#e8eefc;
    --green:#1e8f5f;
    --green-100:#e4f5ec;
    --purple:#5b5fe0;
    --purple-100:#eef1ff;
    --danger:#c4442e;
    --danger-100:#fbe6e1;
    --radius-lg:16px;
    --radius-md:12px;
    --radius-sm:8px;
    --shadow-card:0 2px 10px rgba(0,0,0,0.05);
  }
  *{ box-sizing:border-box; margin:0; padding:0; }
  body{ font-family:'Inter', system-ui, sans-serif; color:var(--ink-900); background:var(--bg-soft); -webkit-font-smoothing:antialiased; }
  h1,h2,h3{ font-family:'Sora', sans-serif; }
  button, input, select, textarea{ font-family:inherit; }
  button{ cursor:pointer; border:none; }
  a{ text-decoration:none; color:inherit; }
  ul{ list-style:none; }

  /* =========================================================
     2. STRUCTURE GÉNÉRALE : sidebar fixe + contenu défilant
  ========================================================= */
  .layout{ display:flex; min-height:100vh; }

  .sidebar{
    width:250px; background:var(--side-bg); color:#c9c9c9; flex-shrink:0;
    display:flex; flex-direction:column; padding:22px 16px;
    position:sticky; top:0; height:100vh;
  }
  .sidebar .logo{ display:flex; align-items:center; gap:8px; font-family:'Sora', sans-serif; font-weight:800; font-size:17px; color:#fff; padding:8px 10px 26px; }
  .sidebar .logo .benin{ color:var(--blue-500); }
  .side-label{ font-size:11px; text-transform:uppercase; letter-spacing:.06em; color:#6b6b6b; padding:14px 12px 8px; }
  .side-link{
    display:flex; align-items:center; gap:10px; padding:10px 12px; border-radius:var(--radius-sm);
    font-size:13.5px; font-weight:500; color:#c9c9c9; transition:background .15s ease, color .15s ease;
  }
  .side-link:hover{ background:var(--side-hover); color:#fff; }
  .side-link.active{ background:var(--blue-500); color:#fff; font-weight:600; }
  .side-bottom{ margin-top:auto; border-top:1px solid #262626; padding-top:14px; }
  .admin-chip{ display:flex; align-items:center; gap:10px; padding:8px 12px; }
  .admin-avatar{ width:34px; height:34px; border-radius:999px; background:var(--blue-500); color:#fff; display:flex; align-items:center; justify-content:center; font-weight:700; font-size:13px; flex-shrink:0; }
  .admin-chip .who strong{ display:block; font-size:13px; color:#fff; }
  .admin-chip .who span{ font-size:11.5px; color:#8a8a8a; }

  .content{ flex:1; padding:32px 36px 60px; max-width:1180px; }
  .content-head{ display:flex; align-items:baseline; justify-content:space-between; margin-bottom:26px; flex-wrap:wrap; gap:10px; }
  .content-head h1{ font-size:23px; font-weight:700; }
  .content-head p{ font-size:13.5px; color:var(--ink-600); margin-top:4px; }

  /* =========================================================
     3. CARTES DE STATISTIQUES (valeurs réelles, via Blade)
  ========================================================= */
  .stat-grid{ display:grid; grid-template-columns:repeat(4, 1fr); gap:16px; margin-bottom:36px; }
  .stat-card{ background:#fff; border:1px solid var(--border); border-radius:var(--radius-md); padding:20px; box-shadow:var(--shadow-card); }
  .stat-top{ display:flex; align-items:center; justify-content:space-between; margin-bottom:14px; }
  .stat-icon{ width:36px; height:36px; border-radius:10px; display:flex; align-items:center; justify-content:center; }
  .stat-trend{ font-size:11.5px; font-weight:700; padding:3px 8px; border-radius:999px; }
  .stat-trend.up{ background:var(--green-100); color:var(--green); }
  .stat-value{ font-size:26px; font-weight:800; font-family:'Sora', sans-serif; }
  .stat-label{ font-size:12.5px; color:var(--ink-600); margin-top:2px; }

  /* =========================================================
     4. PANNEAUX DE GESTION (Livres/Tutoriels, Emplois/Stages)
  ========================================================= */
  .panel{ background:#fff; border:1px solid var(--border); border-radius:var(--radius-lg); margin-bottom:28px; overflow:hidden; }
  .panel-head{ padding:20px 24px; border-bottom:1px solid var(--border); display:flex; align-items:center; justify-content:space-between; flex-wrap:wrap; gap:10px; }
  .panel-head h2{ font-size:16.5px; font-weight:700; }
  .panel-head p{ font-size:12.5px; color:var(--ink-600); margin-top:2px; }
  .btn{ font-size:13.5px; font-weight:600; padding:9px 16px; border-radius:999px; transition:background .15s ease, transform .12s ease; display:inline-flex; align-items:center; gap:6px; }
  .btn:active{ transform:scale(.97); }
  .btn-primary{ background:var(--blue-500); color:#fff; }
  .btn-primary:hover{ background:var(--blue-600); }
  .btn-ghost{ background:transparent; color:var(--ink-900); border:1px solid var(--border); }
  .btn-ghost:hover{ background:var(--bg-soft); }

  .panel-form{ padding:20px 24px; border-bottom:1px solid var(--border); background:var(--bg-soft); display:none; }
  .panel-form.open{ display:block; }
  .form-grid{ display:grid; grid-template-columns:1fr 1fr; gap:14px; }
  .form-field{ display:flex; flex-direction:column; gap:5px; }
  .form-field.full{ grid-column:1 / -1; }
  .form-field label{ font-size:12.5px; font-weight:600; }
  .form-field input, .form-field select, .form-field textarea{
    border:1px solid var(--border); border-radius:var(--radius-sm); padding:9px 11px; font-size:13.5px;
    color:var(--ink-900); background:#fff; outline:none; transition:border-color .15s ease;
  }
  .form-field input:focus, .form-field select:focus, .form-field textarea:focus{ border-color:var(--blue-500); }
  .form-actions{ margin-top:14px; display:flex; justify-content:flex-end; gap:10px; }

  table{ width:100%; border-collapse:collapse; }
  thead th{ text-align:left; font-size:11.5px; text-transform:uppercase; letter-spacing:.04em; color:var(--ink-400); padding:12px 24px; border-bottom:1px solid var(--border); }
  tbody td{ padding:14px 24px; font-size:13.5px; border-bottom:1px solid var(--border); vertical-align:middle; }
  tbody tr:last-child td{ border-bottom:none; }
  .type-pill{ font-size:11px; font-weight:700; padding:4px 10px; border-radius:999px; display:inline-block; }
  .type-pill.livre{ background:var(--blue-100); color:var(--blue-500); }
  .type-pill.tuto{ background:#f1f1f1; color:var(--ink-900); }
  .type-pill.emploi{ background:var(--green-100); color:var(--green); }
  .type-pill.stage{ background:var(--purple-100); color:var(--purple); }
  .row-actions{ display:flex; gap:6px; justify-content:flex-end; }
  .icon-btn-sm{ width:30px; height:30px; border-radius:999px; border:1px solid var(--border); background:#fff; color:var(--ink-400); display:flex; align-items:center; justify-content:center; transition:all .15s ease; }
  .icon-btn-sm:hover{ color:var(--ink-900); border-color:var(--ink-400); }
  .icon-btn-sm.danger:hover{ background:var(--danger); color:#fff; border-color:var(--danger); }
  .empty-row td{ text-align:center; color:var(--ink-400); padding:26px; font-size:13px; }

  @media (max-width:1000px){
    .stat-grid{ grid-template-columns:repeat(2, 1fr); }
  }
  @media (max-width:800px){
    .sidebar{ display:none; }
    .content{ padding:20px; }
    .form-grid{ grid-template-columns:1fr; }
  }
</style>
</head>
<body>

<div class="layout">

  <!-- =========================================================
       BARRE LATÉRALE
  ========================================================= -->
  <aside class="sidebar">
    <div class="logo"><span>Edu</span><span class="benin">Bénin</span><span style="font-weight:400; color:#8a8a8a; font-size:12px; margin-left:4px;">Admin</span></div>

    <span class="side-label">Général</span>
    <a href="{{ route('admin.dashboard') }}" class="side-link active">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="3" y="3" width="7" height="9"/><rect x="14" y="3" width="7" height="5"/><rect x="14" y="12" width="7" height="9"/><rect x="3" y="16" width="7" height="5"/></svg>
      Tableau de bord
    </a>

    <span class="side-label">Contenu</span>
    <a href="#panel-livres" class="side-link">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
      Livres &amp; Tutoriels
    </a>
    <a href="#panel-series" class="side-link">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="6" width="14" height="14" rx="2"/><path d="M22 8.5v7L16 13Z"/></svg>
      Séries de tutoriels
    </a>
    <a href="#panel-emplois" class="side-link">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
      Emplois &amp; Stages
    </a>
    <a href="#panel-ressources" class="side-link">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8Z"/><polyline points="14 2 14 8 20 8"/></svg>
      Ressources
    </a>
    <a href="#panel-filieres" class="side-link">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
      Filières
    </a>
    <a href="#" class="side-link">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M22 10 12 5 2 10l10 5 10-5Z"/><path d="M6 12v5c0 1.5 2.5 3 6 3s6-1.5 6-3v-5"/></svg>
      Bourses
    </a>

    <span class="side-label">Communauté</span>
    <a href="#panel-utilisateurs" class="side-link">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/></svg>
      Utilisateurs
    </a>
    <a href="#" class="side-link">
      <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 15V4"/><path d="M4 4h11l2 3 5-1v9l-5-1-2 3H4"/></svg>
      Signalements
    </a>

    <div class="side-bottom">
      <div class="admin-chip">
        <span class="admin-avatar">{{ strtoupper(substr(auth()->user()->prenom ?? 'A', 0, 1)) }}</span>
        <span class="who"><strong>{{ auth()->user()->prenom ?? 'Admin' }} {{ auth()->user()->nom ?? 'EduBénin' }}</strong><span>Accès complet</span></span>
      </div>
      <a href="{{ url('/') }}" class="side-link" style="margin-top:6px;">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M9 21H5a2 2 0 0 1-2-2V5a2 2 0 0 1 2-2h4"/><polyline points="16 17 21 12 16 7"/><line x1="21" y1="12" x2="9" y2="12"/></svg>
        Retour au site
      </a>
    </div>
  </aside>

  <!-- =========================================================
       CONTENU PRINCIPAL
  ========================================================= -->
  <main class="content">
    <div class="content-head">
      <div>
        <h1>Tableau de bord</h1>
        <p>Vue d'ensemble de la plateforme et publication de contenu.</p>
      </div>
    </div>

    <!-- =========================================================
         STATISTIQUES — valeurs réelles envoyées par AdminController@index
    ========================================================= -->
    <div class="stat-grid">
      <div class="stat-card">
        <div class="stat-top">
          <span class="stat-icon" style="background:var(--blue-100); color:var(--blue-500)">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M17 21v-2a4 4 0 0 0-4-4H5a4 4 0 0 0-4 4v2"/><circle cx="9" cy="7" r="4"/><path d="M23 21v-2a4 4 0 0 0-3-3.87"/><path d="M16 3.13a4 4 0 0 1 0 7.75"/></svg>
          </span>
          <span class="stat-trend up">+{{ $inscritsCetteSemaine }} cette semaine</span>
        </div>
        <div class="stat-value">{{ number_format($inscrits, 0, ',', ' ') }}</div>
        <div class="stat-label">Étudiants inscrits</div>
      </div>

      <div class="stat-card">
        <div class="stat-top">
          <span class="stat-icon" style="background:var(--green-100); color:var(--green)">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><circle cx="12" cy="12" r="10"/><path d="M12 6v6l4 2"/></svg>
          </span>
          <span class="stat-trend up">Dernières 15 min</span>
        </div>
        <div class="stat-value">{{ number_format($actifs, 0, ',', ' ') }}</div>
        <div class="stat-label">Utilisateurs actifs</div>
      </div>

      <div class="stat-card">
        <div class="stat-top">
          <span class="stat-icon" style="background:#f1f1f1; color:var(--ink-900)">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
          </span>
        </div>
        <div class="stat-value">{{ $totalLivres }}</div>
        <div class="stat-label">Livres &amp; tutoriels publiés</div>
      </div>

      <div class="stat-card">
        <div class="stat-top">
          <span class="stat-icon" style="background:var(--purple-100); color:var(--purple)">
            <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
          </span>
        </div>
        <div class="stat-value">{{ $totalEmplois }}</div>
        <div class="stat-label">Offres d'emploi &amp; stages</div>
      </div>
    </div>

    @if(session('success'))
      <div style="background:var(--green-100); color:var(--green); padding:12px 18px; border-radius:var(--radius-sm); font-size:13.5px; font-weight:600; margin-bottom:20px;">
        {{ session('success') }}
      </div>
    @endif

    @if(session('error'))
      <div style="background:var(--danger-100); color:var(--danger); padding:12px 18px; border-radius:var(--radius-sm); font-size:13.5px; font-weight:600; margin-bottom:20px;">
        {{ session('error') }}
      </div>
    @endif

    <!-- =========================================================
         PANNEAU : LIVRES & TUTORIELS
    ========================================================= -->
    <section class="panel" id="panel-livres">
      <div class="panel-head">
        <div>
          <h2>Livres &amp; Tutoriels</h2>
          <p>Publie un nouveau contenu, visible immédiatement sur la page Cours.</p>
        </div>
        <button type="button" class="btn btn-primary" data-toggle-form="form-livre">+ Publier un contenu</button>
      </div>

      <form class="panel-form" id="form-livre" method="POST" action="{{ route('admin.livres.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-grid">
          <div class="form-field full">
            <label>Titre</label>
            <input type="text" name="titre" placeholder="Ex. : Apprendre Python à partir de zéro" required>
          </div>
          <div class="form-field">
            <label>Auteur</label>
            <input type="text" name="auteur" placeholder="Nom de l'auteur">
          </div>
          <div class="form-field">
            <label>Type</label>
            <select name="type">
              <option value="livre">Livre</option>
              <option value="tuto">Tutoriel</option>
            </select>
          </div>
          <div class="form-field">
            <label>Catégorie</label>
            <select name="categorie">
              <option>Informatique</option>
              <option>Développement personnel</option>
              <option>Gestion &amp; Finance</option>
              <option>Langues</option>
              <option>Entrepreneuriat</option>
              <option>Sciences</option>
            </select>
          </div>
          <div class="form-field">
            <label>Prix (FCFA, 0 = gratuit)</label>
            <input type="number" name="prix" placeholder="0" min="0">
          </div>
          <div class="form-field full">
            <label>Fichier ou lien (PDF / vidéo)</label>
            <input type="text" name="fichier_ou_lien" placeholder="Colle un lien (optionnel si tu uploades un fichier ci-dessous)">
          </div>
          <div class="form-field full">
            <label>Fichier à héberger sur EduBénin (PDF pour un livre, vidéo pour un tutoriel)</label>
            <input type="file" name="fichier" accept=".pdf,video/*">
            <small style="font-size:11.5px; color:var(--ink-400);">Optionnel si tu as déjà mis un lien externe au-dessus. Taille max : 50 Mo.</small>
          </div>
        </div>
        <div class="form-actions">
          <button type="button" class="btn btn-ghost" data-cancel-form="form-livre">Annuler</button>
          <button type="submit" class="btn btn-primary">Publier</button>
        </div>
      </form>

      <table>
        <thead>
          <tr><th>Titre</th><th>Type</th><th>Catégorie</th><th>Prix</th><th></th></tr>
        </thead>
        <tbody>
          @forelse($livres as $livre)
            <tr>
              <td>{{ $livre->titre }}</td>
              <td><span class="type-pill {{ $livre->type }}">{{ $livre->type === 'livre' ? 'Livre' : 'Tutoriel' }}</span></td>
              <td>{{ $livre->categorie }}</td>
              <td>{{ $livre->prix > 0 ? number_format($livre->prix, 0, ',', ' ').' FCFA' : 'Gratuit' }}</td>
              <td>
                <div class="row-actions">
                  <a href="{{ route('admin.livres.edit', $livre->id) }}" class="icon-btn-sm" title="Modifier"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 20h9"/><path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4Z"/></svg></a>
                  <form method="POST" action="{{ route('admin.livres.destroy', $livre->id) }}" onsubmit="return confirm('Supprimer ce contenu et son fichier associé ?');" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="icon-btn-sm danger" title="Supprimer"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/></svg></button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr class="empty-row"><td colspan="5">Aucun contenu publié pour l'instant.</td></tr>
          @endforelse
        </tbody>
      </table>
    </section>

    <!-- =========================================================
         PANNEAU : SÉRIES DE TUTORIELS (PLAYLISTS)
         Une série regroupe plusieurs tutos vidéo à suivre dans
         l'ordre. La composition (quelles vidéos, dans quel ordre)
         se gère depuis le bouton "Modifier" de chaque série.
    ========================================================= -->
    <section class="panel" id="panel-series">
      <div class="panel-head">
        <div>
          <h2>Séries de tutoriels</h2>
          <p>Regroupe plusieurs vidéos en playlist, à suivre dans l'ordre (comme sur YouTube).</p>
        </div>
        <button type="button" class="btn btn-primary" data-toggle-form="form-serie">+ Créer une série</button>
      </div>

      <form class="panel-form" id="form-serie" method="POST" action="{{ route('admin.series.store') }}">
        @csrf
        <div class="form-grid">
          <div class="form-field full">
            <label>Titre de la série</label>
            <input type="text" name="titre" placeholder="Ex. : Apprendre Python à partir de zéro" required>
          </div>
          <div class="form-field">
            <label>Catégorie</label>
            <select name="categorie">
              <option>Informatique</option>
              <option>Développement personnel</option>
              <option>Gestion &amp; Finance</option>
              <option>Langues</option>
              <option>Entrepreneuriat</option>
              <option>Sciences</option>
            </select>
          </div>
          <div class="form-field">
            <label>Couleur de la vignette</label>
            <input type="color" name="couleur" value="#2557d6" style="height:38px; padding:4px; cursor:pointer;">
          </div>
          <div class="form-field full">
            <label>Description (optionnelle)</label>
            <input type="text" name="description" placeholder="Une phrase pour présenter la série">
          </div>
        </div>
        <div class="form-actions">
          <button type="button" class="btn btn-ghost" data-cancel-form="form-serie">Annuler</button>
          <button type="submit" class="btn btn-primary">Créer la série</button>
        </div>
      </form>

      <table>
        <thead>
          <tr><th>Titre</th><th>Catégorie</th><th>Vidéos</th><th></th></tr>
        </thead>
        <tbody>
          @forelse($series as $serie)
            <tr>
              <td>{{ $serie->titre }}</td>
              <td>{{ $serie->categorie ?? '—' }}</td>
              <td>{{ $serie->livres_count }}</td>
              <td>
                <div class="row-actions">
                  <a href="{{ route('admin.series.edit', $serie->id) }}" class="icon-btn-sm" title="Modifier / gérer les vidéos"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 20h9"/><path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4Z"/></svg></a>
                  <form method="POST" action="{{ route('admin.series.destroy', $serie->id) }}" onsubmit="return confirm('Supprimer cette série ? Les vidéos resteront disponibles individuellement.');" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="icon-btn-sm danger" title="Supprimer"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/></svg></button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr class="empty-row"><td colspan="4">Aucune série créée pour l'instant.</td></tr>
          @endforelse
        </tbody>
      </table>
    </section>

    <!-- =========================================================
         PANNEAU : EMPLOIS & STAGES
    ========================================================= -->
    <section class="panel" id="panel-emplois">
      <div class="panel-head">
        <div>
          <h2>Emplois &amp; Stages</h2>
          <p>Publie une offre, visible immédiatement sur la page Emplois &amp; Stages.</p>
        </div>
        <button type="button" class="btn btn-primary" data-toggle-form="form-emploi">+ Publier une offre</button>
      </div>

      <form class="panel-form" id="form-emploi" method="POST" action="{{ route('admin.emplois.store') }}">
        @csrf
        <div class="form-grid">
          <div class="form-field full">
            <label>Intitulé du poste</label>
            <input type="text" name="titre" placeholder="Ex. : Développeur web junior" required>
          </div>
          <div class="form-field">
            <label>Entreprise</label>
            <input type="text" name="entreprise" placeholder="Nom de l'entreprise">
          </div>
          <div class="form-field">
            <label>Type</label>
            <select name="type">
              <option value="emploi">Emploi</option>
              <option value="stage">Stage</option>
            </select>
          </div>
          <div class="form-field">
            <label>Ville</label>
            <input type="text" name="ville" placeholder="Ex. : Cotonou">
          </div>
          <div class="form-field">
            <label>Date limite de candidature</label>
            <input type="date" name="date_limite">
          </div>
          <div class="form-field full">
            <label>Lien ou email de candidature</label>
            <input type="text" name="lien_candidature" placeholder="https://... ou une adresse e-mail">
          </div>
          <div class="form-field full">
            <label>Description</label>
            <textarea name="description" rows="3" placeholder="Missions, profil recherché..."></textarea>
          </div>
        </div>
        <div class="form-actions">
          <button type="button" class="btn btn-ghost" data-cancel-form="form-emploi">Annuler</button>
          <button type="submit" class="btn btn-primary">Publier</button>
        </div>
      </form>

      <table>
        <thead>
          <tr><th>Poste</th><th>Type</th><th>Entreprise</th><th>Ville</th><th></th></tr>
        </thead>
        <tbody>
          @forelse($emplois as $emploi)
            <tr>
              <td>{{ $emploi->titre }}</td>
              <td><span class="type-pill {{ $emploi->type }}">{{ $emploi->type === 'emploi' ? 'Emploi' : 'Stage' }}</span></td>
              <td>{{ $emploi->entreprise ?? '—' }}</td>
              <td>{{ $emploi->ville ?? '—' }}</td>
              <td>
                <div class="row-actions">
                  <a href="{{ route('admin.emplois.edit', $emploi->id) }}" class="icon-btn-sm" title="Modifier"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 20h9"/><path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4Z"/></svg></a>
                  <form method="POST" action="{{ route('admin.emplois.destroy', $emploi->id) }}" onsubmit="return confirm('Supprimer cette offre ?');" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="icon-btn-sm danger" title="Supprimer"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/></svg></button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr class="empty-row"><td colspan="5">Aucune offre publiée pour l'instant.</td></tr>
          @endforelse
        </tbody>
      </table>
    </section>

    <!-- =========================================================
         PANNEAU : RESSOURCES
    ========================================================= -->
    <section class="panel" id="panel-ressources">
      <div class="panel-head">
        <div>
          <h2>Ressources</h2>
          <p>Guides, modèles, articles et outils, visibles sur la page Ressources.</p>
        </div>
        <button type="button" class="btn btn-primary" data-toggle-form="form-ressource">+ Publier une ressource</button>
      </div>

      <form class="panel-form" id="form-ressource" method="POST" action="{{ route('admin.ressources.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-grid">
          <div class="form-field full">
            <label>Titre</label>
            <input type="text" name="titre" placeholder="Ex. : Rédiger un CV qui retient l'attention" required>
          </div>
          <div class="form-field">
            <label>Type</label>
            <select name="type">
              <option value="guide">Guide</option>
              <option value="modele">Modèle</option>
              <option value="article">Article</option>
              <option value="outil">Outil</option>
            </select>
          </div>
          <div class="form-field">
            <label>Thème</label>
            <select name="theme">
              <option value="candidature">Candidature & emploi</option>
              <option value="etudes">Vie étudiante</option>
              <option value="bourses">Bourses & financement</option>
            </select>
          </div>
          <div class="form-field full">
            <label>Description courte</label>
            <input type="text" name="description" placeholder="Une phrase pour présenter la ressource">
          </div>
          <div class="form-field full">
            <label>Lien externe (optionnel si tu uploades un fichier)</label>
            <input type="text" name="lien_ou_fichier" placeholder="https://...">
          </div>
          <div class="form-field full">
            <label>Fichier à héberger (PDF, Word, vidéo)</label>
            <input type="file" name="fichier" accept=".pdf,.doc,.docx,video/*">
          </div>
        </div>
        <div class="form-actions">
          <button type="button" class="btn btn-ghost" data-cancel-form="form-ressource">Annuler</button>
          <button type="submit" class="btn btn-primary">Publier</button>
        </div>
      </form>

      <table>
        <thead>
          <tr><th>Titre</th><th>Type</th><th>Thème</th><th></th></tr>
        </thead>
        <tbody>
          @forelse($ressources as $ressource)
            <tr>
              <td>{{ $ressource->titre }}</td>
              <td><span class="type-pill livre">{{ ucfirst($ressource->type) }}</span></td>
              <td>{{ ['candidature' => 'Candidature & emploi', 'etudes' => 'Vie étudiante', 'bourses' => 'Bourses & financement'][$ressource->theme] }}</td>
              <td>
                <div class="row-actions">
                  <form method="POST" action="{{ route('admin.ressources.destroy', $ressource->id) }}" onsubmit="return confirm('Supprimer cette ressource ?');" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="icon-btn-sm danger" title="Supprimer"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/></svg></button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr class="empty-row"><td colspan="4">Aucune ressource publiée pour l'instant.</td></tr>
          @endforelse
        </tbody>
      </table>
    </section>

    <!-- =========================================================
         PANNEAU : FILIÈRES
         Alimente les groupes WhatsApp affichés sur /communauté.
    ========================================================= -->
    <section class="panel" id="panel-filieres">
      <div class="panel-head">
        <div>
          <h2>Filières</h2>
          <p>Groupes WhatsApp par filière, visibles sur la page Communauté.</p>
        </div>
        <button type="button" class="btn btn-primary" data-toggle-form="form-filiere">+ Ajouter une filière</button>
      </div>

      <form class="panel-form" id="form-filiere" method="POST" action="{{ route('admin.filieres.store') }}">
        @csrf
        <div class="form-grid">
          <div class="form-field full">
            <label>Nom de la filière</label>
            <input type="text" name="nom" placeholder="Ex. : Santé" required>
          </div>
          <div class="form-field">
            <label>Couleur de l'icône</label>
            <input type="color" name="couleur" value="#2557d6" style="height:38px; padding:4px; cursor:pointer;">
          </div>
          <div class="form-field">
            <label>Lien du groupe WhatsApp</label>
            <input type="text" name="lien_whatsapp" placeholder="https://chat.whatsapp.com/..." required>
          </div>
          <div class="form-field full">
            <label>Description (optionnelle)</label>
            <input type="text" name="description" placeholder="Une phrase pour présenter la filière">
          </div>
        </div>
        <div class="form-actions">
          <button type="button" class="btn btn-ghost" data-cancel-form="form-filiere">Annuler</button>
          <button type="submit" class="btn btn-primary">Ajouter</button>
        </div>
      </form>

      <table>
        <thead>
          <tr><th>Nom</th><th>Membres</th><th>Couleur</th><th></th></tr>
        </thead>
        <tbody>
          @forelse($filieres as $filiere)
            <tr>
              <td>{{ $filiere->nom }}</td>
              <td>{{ number_format($filiere->nombre_membres, 0, ',', ' ') }}</td>
              <td>
                <span style="display:inline-flex; align-items:center; gap:8px;">
                  <span style="width:16px; height:16px; border-radius:4px; background:{{ $filiere->couleur }}; display:inline-block; border:1px solid var(--border);"></span>
                  {{ $filiere->couleur }}
                </span>
              </td>
              <td>
                <div class="row-actions">
                  <a href="{{ route('admin.filieres.edit', $filiere->id) }}" class="icon-btn-sm" title="Modifier"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 20h9"/><path d="M16.5 3.5a2.1 2.1 0 0 1 3 3L7 19l-4 1 1-4Z"/></svg></a>
                  <form method="POST" action="{{ route('admin.filieres.destroy', $filiere->id) }}" onsubmit="return confirm('Supprimer cette filière ?');" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="icon-btn-sm danger" title="Supprimer"><svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/></svg></button>
                  </form>
                </div>
              </td>
            </tr>
          @empty
            <tr class="empty-row"><td colspan="4">Aucune filière ajoutée pour l'instant.</td></tr>
          @endforelse
        </tbody>
      </table>
    </section>

    <!-- =========================================================
         PANNEAU : UTILISATEURS
    ========================================================= -->
    <section class="panel" id="panel-utilisateurs">
      <div class="panel-head">
        <div>
          <h2>Utilisateurs</h2>
          <p>Tous les comptes inscrits sur la plateforme.</p>
        </div>
        <input
          type="text"
          id="recherche-utilisateurs"
          placeholder="Rechercher un nom ou un email..."
          style="border:1px solid var(--border); border-radius:var(--radius-sm); padding:9px 12px; font-size:13.5px; min-width:240px; outline:none;"
        >
      </div>

      <table>
        <thead>
          <tr><th>Nom</th><th>Email</th><th>Niveau / Domaine</th><th>Rôle</th><th>Inscrit le</th><th></th></tr>
        </thead>
        <tbody id="corps-utilisateurs">
          @forelse($utilisateurs as $utilisateur)
            <tr>
              <td>{{ $utilisateur->prenom }} {{ $utilisateur->nom }}</td>
              <td>{{ $utilisateur->email }}</td>
              <td>{{ $utilisateur->niveau ?? '—' }}{{ $utilisateur->domaine ? ' · '.$utilisateur->domaine : '' }}</td>
              <td>
                <span class="type-pill {{ $utilisateur->role === 'admin' ? 'emploi' : 'tuto' }}">
                  {{ $utilisateur->role === 'admin' ? 'Admin' : 'Utilisateur' }}
                </span>
              </td>
              <td>{{ $utilisateur->created_at->format('d/m/Y') }}</td>
              <td>
                <div class="row-actions">
                  @if($utilisateur->id !== auth()->id())
                    <form method="POST" action="{{ route('admin.utilisateurs.toggleRole', $utilisateur->id) }}" onsubmit="return confirm('{{ $utilisateur->role === 'admin' ? 'Retirer les droits admin à' : 'Donner les droits admin à' }} {{ $utilisateur->prenom }} ?');" style="display:inline;">
                      @csrf
                      @method('PATCH')
                      <button type="submit" class="icon-btn-sm" title="{{ $utilisateur->role === 'admin' ? 'Retirer les droits admin' : 'Rendre administrateur' }}">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M12 2 15 8 22 9 17 14 18 21 12 17.5 6 21 7 14 2 9 9 8 Z"/></svg>
                      </button>
                    </form>
                    <form method="POST" action="{{ route('admin.utilisateurs.destroy', $utilisateur->id) }}" onsubmit="return confirm('Supprimer définitivement ce compte ?');" style="display:inline;">
                      @csrf
                      @method('DELETE')
                      <button type="submit" class="icon-btn-sm danger" title="Supprimer">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M3 6h18"/><path d="M19 6l-1 14a2 2 0 0 1-2 2H8a2 2 0 0 1-2-2L5 6"/></svg>
                      </button>
                    </form>
                  @else
                    <span style="font-size:12px; color:var(--ink-400);">C'est toi</span>
                  @endif
                </div>
              </td>
            </tr>
          @empty
            <tr class="empty-row"><td colspan="6">Aucun utilisateur inscrit pour l'instant.</td></tr>
          @endforelse
        </tbody>
      </table>
    </section>

  </main>
</div>

<script>
  // Ouverture / fermeture des formulaires de publication
  document.querySelectorAll('[data-toggle-form]').forEach(bouton => {
    bouton.addEventListener('click', () => {
      document.getElementById(bouton.dataset.toggleForm).classList.toggle('open');
    });
  });
  document.querySelectorAll('[data-cancel-form]').forEach(bouton => {
    bouton.addEventListener('click', () => {
      document.getElementById(bouton.dataset.cancelForm).classList.remove('open');
    });
  });

  // Recherche simple dans le panneau Utilisateurs (par nom ou email)
  const rechercheUtilisateurs = document.getElementById('recherche-utilisateurs');
  if (rechercheUtilisateurs) {
    rechercheUtilisateurs.addEventListener('input', () => {
      const terme = rechercheUtilisateurs.value.trim().toLowerCase();
      document.querySelectorAll('#corps-utilisateurs tr').forEach(ligne => {
        ligne.style.display = ligne.textContent.toLowerCase().includes(terme) ? '' : 'none';
      });
    });
  }
</script>

</body>
</html>