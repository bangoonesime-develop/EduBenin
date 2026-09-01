<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>{{ $serie->titre }} — EduBénin</title>
<meta name="description" content="{{ $serie->description ?? 'Série de tutoriels EduBénin' }}">

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
  :root{
    --navy-950:#0a1530; --navy-900:#0e1c3f; --navy-800:#152752;
    --blue-600:#2557d6; --blue-700:#1a44b8; --blue-100:#e8eefc;
    --orange-500:#f4901e; --orange-600:#e07c0b;
    --ink-900:#101828; --ink-600:#4b5468; --ink-400:#8891a3;
    --paper:#ffffff; --bg-soft:#f6f8fc; --border:#e6eaf2;
    --radius-lg:18px; --radius-md:12px; --radius-sm:8px;
    --shadow-card:0 4px 20px rgba(14,28,63,0.06); --shadow-hover:0 10px 30px rgba(14,28,63,0.12);
  }
  *{ box-sizing:border-box; margin:0; padding:0; }
  html{ scroll-behavior:smooth; }
  body{ font-family:'Inter', system-ui, sans-serif; color:var(--ink-900); background:var(--bg-soft); -webkit-font-smoothing:antialiased; }
  h1,h2,h3{ font-family:'Sora', sans-serif; }
  a{ text-decoration:none; color:inherit; }
  button{ font-family:inherit; cursor:pointer; border:none; }
  .container{ max-width:900px; margin:0 auto; padding:0 32px; }

  header.site-header{ position:sticky; top:0; z-index:100; background:rgba(255,255,255,0.94); backdrop-filter:blur(8px); border-bottom:1px solid var(--border); }
  .nav-row{ display:flex; align-items:center; justify-content:space-between; height:72px; gap:24px; max-width:1240px; margin:0 auto; padding:0 32px; }
  .logo{ display:flex; align-items:center; gap:8px; font-family:'Sora', sans-serif; font-weight:800; font-size:20px; }
  .logo .edu{ color:var(--blue-600); }
  .logo .benin{ color:var(--orange-500); }
  .back-link{ font-size:13.5px; font-weight:600; color:var(--ink-600); display:inline-flex; align-items:center; gap:6px; }
  .back-link:hover{ color:var(--navy-900); }

  .serie-banner{ background:linear-gradient(160deg, var(--navy-950), var(--navy-900) 65%, var(--navy-800)); color:#fff; padding:40px 0; }
  .serie-banner h1{ font-size:clamp(24px, 3vw, 32px); font-weight:800; }
  .serie-banner p{ margin-top:10px; color:#c4cce3; font-size:14.5px; max-width:600px; }
  .serie-banner .meta{ margin-top:16px; font-size:13px; color:#a9b3cc; }

  .playlist{ padding:32px 0 60px; }
  .video-row{
    display:flex; align-items:center; gap:16px;
    background:#fff; border:1px solid var(--border); border-radius:var(--radius-md);
    padding:14px 16px; margin-bottom:12px; transition:border-color .15s ease, box-shadow .15s ease;
  }
  .video-row:hover{ border-color:var(--blue-600); box-shadow:var(--shadow-card); }
  .video-number{
    width:32px; height:32px; border-radius:999px; background:var(--bg-soft); color:var(--ink-600);
    display:flex; align-items:center; justify-content:center; font-size:13px; font-weight:700; flex-shrink:0;
  }
  .video-icon{ width:36px; height:36px; border-radius:8px; background:var(--blue-100); color:var(--blue-600); display:flex; align-items:center; justify-content:center; flex-shrink:0; }
  .video-info{ flex:1; min-width:0; }
  .video-info h3{ font-size:14px; font-weight:600; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; }
  .video-info p{ font-size:12px; color:var(--ink-400); margin-top:2px; }
  .video-cta{
    font-size:12.5px; font-weight:600; color:#fff; background:var(--blue-600);
    padding:8px 16px; border-radius:999px; transition:background .15s ease; flex-shrink:0;
  }
  .video-cta:hover{ background:var(--blue-700); }

  .empty-playlist{ text-align:center; padding:50px 20px; color:var(--ink-400); font-size:14px; }

  footer{ background:var(--navy-950); color:#c4cce3; padding:36px 0 20px; margin-top:20px; }
  .footer-bottom{ max-width:1240px; margin:0 auto; padding:0 32px; display:flex; justify-content:space-between; font-size:12.5px; color:#7f89a6; flex-wrap:wrap; gap:10px; }
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
      <a href="/Cours" class="back-link">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg>
        Retour au catalogue
      </a>
    </div>
  </header>

  <section class="serie-banner">
    <div class="container">
      <h1>{{ $serie->titre }}</h1>
      @if($serie->description)
        <p>{{ $serie->description }}</p>
      @endif
      <div class="meta">{{ $serie->livres->count() }} vidéo{{ $serie->livres->count() > 1 ? 's' : '' }} · à suivre dans l'ordre</div>
    </div>
  </section>

  <section class="playlist">
    <div class="container">
      @if($serie->livres->count() === 0)
        <div class="empty-playlist">Cette série ne contient pas encore de vidéo.</div>
      @else
        @foreach($serie->livres as $index => $video)
          <a href="{{ route('cours.consulter', $video) }}" target="_blank" rel="noopener" class="video-row">
            <span class="video-number">{{ $index + 1 }}</span>
            <span class="video-icon">
              <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><polyline points="16 18 22 12 16 6"/><polyline points="8 6 2 12 8 18"/></svg>
            </span>
            <div class="video-info">
              <h3>{{ $video->titre }}</h3>
              <p>Par {{ $video->auteur ?? 'Auteur non précisé' }}</p>
            </div>
            <span class="video-cta">Regarder</span>
          </a>
        @endforeach
      @endif
    </div>
  </section>

  <footer>
    <div class="footer-bottom">
      <span>Copyright &copy; <strong>BODEM</strong> © 2026 EduBénin. Tous droits réservés.</span>
      <span>Conçu et développé au Bénin</span>
    </div>
  </footer>

</body>
</html>