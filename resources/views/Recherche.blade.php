<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Recherche{{ $terme ? ' — '.$terme : '' }} — EduBénin</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
  :root{
    --navy-900:#0e1c3f; --blue-600:#2557d6; --blue-700:#1a44b8; --blue-100:#e8eefc;
    --orange-500:#f4901e;
    --ink-900:#101828; --ink-600:#4b5468; --ink-400:#8891a3;
    --paper:#ffffff; --bg-soft:#f6f8fc; --border:#e6eaf2;
    --radius-md:12px; --radius-sm:8px;
    --shadow-card:0 4px 20px rgba(14,28,63,0.06); --shadow-hover:0 10px 30px rgba(14,28,63,0.12);
  }
  *{ box-sizing:border-box; margin:0; padding:0; }
  body{ font-family:'Inter', system-ui, sans-serif; color:var(--ink-900); background:var(--paper); -webkit-font-smoothing:antialiased; }
  h1,h2,h3{ font-family:'Sora', sans-serif; }
  a{ text-decoration:none; color:inherit; }
  .container{ max-width:1000px; margin:0 auto; padding:0 32px; }

  header.site-header{ position:sticky; top:0; z-index:100; background:rgba(255,255,255,0.94); backdrop-filter:blur(8px); border-bottom:1px solid var(--border); }
  .nav-row{ display:flex; align-items:center; justify-content:space-between; height:72px; gap:24px; max-width:1240px; margin:0 auto; padding:0 32px; }
  .logo{ display:flex; align-items:center; gap:8px; font-family:'Sora', sans-serif; font-weight:800; font-size:20px; }
  .logo .edu{ color:var(--blue-600); }
  .logo .benin{ color:var(--orange-500); }

  .search-banner{ background:var(--bg-soft); padding:32px 0; border-bottom:1px solid var(--border); }
  .search-form{ display:flex; background:#fff; border-radius:999px; padding:6px; max-width:560px; box-shadow:var(--shadow-card); border:1px solid var(--border); }
  .search-form input{ flex:1; border:none; outline:none; padding:12px 16px; font-size:14.5px; font-family:inherit; color:var(--ink-900); background:transparent; }
  .search-form button{ background:var(--blue-600); color:#fff; font-weight:600; font-size:14.5px; padding:12px 22px; border-radius:999px; border:none; cursor:pointer; transition:background .15s ease; }
  .search-form button:hover{ background:var(--blue-700); }

  .results{ padding:36px 0 60px; }
  .results-intro{ font-size:14px; color:var(--ink-600); margin-bottom:28px; }
  .results-intro strong{ color:var(--ink-900); }

  .result-group{ margin-bottom:36px; }
  .result-group h2{ font-size:18px; font-weight:700; margin-bottom:14px; display:flex; align-items:center; gap:8px; }
  .result-group h2 .count{ font-size:12.5px; font-weight:600; color:#fff; background:var(--blue-600); border-radius:999px; padding:2px 10px; }

  .result-card{
    display:flex; align-items:center; gap:14px; background:#fff; border:1px solid var(--border);
    border-radius:var(--radius-md); padding:14px 16px; margin-bottom:10px; transition:box-shadow .15s ease, border-color .15s ease;
  }
  .result-card:hover{ box-shadow:var(--shadow-hover); border-color:var(--blue-600); }
  .result-icon{ width:40px; height:40px; border-radius:10px; background:var(--blue-100); color:var(--blue-600); display:flex; align-items:center; justify-content:center; flex-shrink:0; }
  .result-info{ flex:1; min-width:0; }
  .result-info h3{ font-size:14px; font-weight:600; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; }
  .result-info p{ font-size:12px; color:var(--ink-400); margin-top:2px; }
  .result-cta{ font-size:12.5px; font-weight:600; color:var(--blue-600); flex-shrink:0; }

  .empty-state{ text-align:center; padding:60px 20px; color:var(--ink-400); }
  .empty-state svg{ margin-bottom:14px; color:var(--ink-400); }
  .empty-state p{ font-size:14.5px; }
</style>
</head>
<body>

  <header class="site-header">
    <div class="nav-row">
      <a href="/Acceuil" class="logo">
        <svg width="30" height="30" viewBox="0 0 48 48" fill="none">
          <path d="M6 22 L24 12 L42 22 L24 32 Z" fill="#0e1c3f"/>
          <path d="M4 24c6 2 10 8 20 10 10-2 14-8 20-10" stroke="#2557d6" stroke-width="4" fill="none" stroke-linecap="round"/>
          <path d="M8 26c5 2 9 7 16 8 7-1 11-6 16-8" stroke="#f4901e" stroke-width="3" fill="none" stroke-linecap="round"/>
        </svg>
        <span><span class="edu">Edu</span><span class="benin">Bénin</span></span>
      </a>
    </div>
  </header>

  <section class="search-banner">
    <div class="container">
      <form class="search-form" action="{{ route('recherche.index') }}" method="GET">
        <input type="text" name="q" value="{{ $terme }}" placeholder="Que recherchez-vous ? (cours, emploi, ressource...)" autofocus>
        <button type="submit">Rechercher</button>
      </form>
    </div>
  </section>

  <section class="results">
    <div class="container">

      @if($terme === '')
        <div class="empty-state">
          <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="7"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
          <p>Entre un mot-clé ci-dessus pour chercher parmi les cours, les offres d'emploi et les ressources.</p>
        </div>
      @else
        @php $totalResultats = $livres->count() + $emplois->count() + $ressources->count(); @endphp

        <p class="results-intro">
          @if($totalResultats > 0)
            <strong>{{ $totalResultats }}</strong> résultat{{ $totalResultats > 1 ? 's' : '' }} pour « {{ $terme }} »
          @else
            Aucun résultat pour « {{ $terme }} »
          @endif
        </p>

        @if($totalResultats === 0)
          <div class="empty-state">
            <svg width="40" height="40" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.5"><circle cx="11" cy="11" r="7"/><line x1="21" y1="21" x2="16.65" y2="16.65"/></svg>
            <p>Essaie un autre mot-clé, ou vérifie l'orthographe.</p>
          </div>
        @endif

        @if($livres->count() > 0)
          <div class="result-group">
            <h2>Cours &amp; tutoriels <span class="count">{{ $livres->count() }}</span></h2>
            @foreach($livres as $livre)
              <a href="{{ route('cours.consulter', $livre) }}" target="_blank" rel="noopener" class="result-card">
                <span class="result-icon">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M4 19.5A2.5 2.5 0 0 1 6.5 17H20"/><path d="M6.5 2H20v20H6.5A2.5 2.5 0 0 1 4 19.5v-15A2.5 2.5 0 0 1 6.5 2z"/></svg>
                </span>
                <div class="result-info">
                  <h3>{{ $livre->titre }}</h3>
                  <p>{{ $livre->categorie }}{{ $livre->auteur ? ' · '.$livre->auteur : '' }}</p>
                </div>
                <span class="result-cta">{{ $livre->type === 'livre' ? 'Lire →' : 'Regarder →' }}</span>
              </a>
            @endforeach
          </div>
        @endif

        @if($emplois->count() > 0)
          <div class="result-group">
            <h2>Emplois &amp; stages <span class="count">{{ $emplois->count() }}</span></h2>
            @foreach($emplois as $emploi)
              <a href="/emplois" class="result-card">
                <span class="result-icon">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><rect x="2" y="7" width="20" height="14" rx="2"/><path d="M16 21V5a2 2 0 0 0-2-2h-4a2 2 0 0 0-2 2v16"/></svg>
                </span>
                <div class="result-info">
                  <h3>{{ $emploi->titre }}</h3>
                  <p>{{ $emploi->entreprise ?? 'Entreprise non précisée' }}{{ $emploi->ville ? ' · '.$emploi->ville : '' }}</p>
                </div>
                <span class="result-cta">Voir →</span>
              </a>
            @endforeach
          </div>
        @endif

        @if($ressources->count() > 0)
          <div class="result-group">
            <h2>Ressources <span class="count">{{ $ressources->count() }}</span></h2>
            @foreach($ressources as $ressource)
              <a href="{{ route('ressources.consulter', $ressource) }}" target="_blank" rel="noopener" class="result-card">
                <span class="result-icon">
                  <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M14 2H6a2 2 0 0 0-2 2v16a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V8Z"/><polyline points="14 2 14 8 20 8"/></svg>
                </span>
                <div class="result-info">
                  <h3>{{ $ressource->titre }}</h3>
                  <p>{{ ucfirst($ressource->type) }}</p>
                </div>
                <span class="result-cta">Ouvrir →</span>
              </a>
            @endforeach
          </div>
        @endif
      @endif

    </div>
  </section>

</body>
</html>