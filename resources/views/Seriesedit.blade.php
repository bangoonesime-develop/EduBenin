<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Modifier une série — EduBénin Admin</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
  :root{
    --ink-900:#111111; --ink-600:#5c5c5c; --ink-400:#8f8f8f;
    --paper:#ffffff; --bg-soft:#f6f7f9; --border:#e4e6ea;
    --blue-500:#2557d6; --blue-600:#1a44b8;
    --radius-lg:16px; --radius-md:12px; --radius-sm:8px;
    --shadow-card:0 2px 10px rgba(0,0,0,0.05);
  }
  *{ box-sizing:border-box; margin:0; padding:0; }
  body{
    font-family:'Inter', system-ui, sans-serif; color:var(--ink-900); background:var(--bg-soft);
    -webkit-font-smoothing:antialiased; min-height:100vh; padding:40px 20px;
  }
  h1,h2{ font-family:'Sora', sans-serif; }
  a{ text-decoration:none; color:inherit; }
  button, input, textarea{ font-family:inherit; }
  button{ cursor:pointer; border:none; }

  .wrap{ max-width:720px; margin:0 auto; }
  .card{ background:#fff; border:1px solid var(--border); border-radius:var(--radius-lg); padding:32px; box-shadow:var(--shadow-card); margin-bottom:20px; }
  .card-head{ margin-bottom:22px; }
  .card-head h1{ font-size:20px; font-weight:700; }
  .card-head p{ font-size:13.5px; color:var(--ink-600); margin-top:4px; }
  .back-link{ font-size:13px; font-weight:600; color:var(--ink-600); display:inline-flex; align-items:center; gap:6px; margin-bottom:18px; }
  .back-link:hover{ color:var(--blue-500); }

  .form-field{ display:flex; flex-direction:column; gap:6px; margin-bottom:16px; }
  .form-field label{ font-size:12.5px; font-weight:600; }
  .form-field input, .form-field textarea{
    border:1px solid var(--border); border-radius:var(--radius-sm); padding:10px 12px; font-size:13.5px;
    color:var(--ink-900); background:#fff; outline:none; transition:border-color .15s ease;
  }
  .form-field input:focus, .form-field textarea:focus{ border-color:var(--blue-500); }
  .form-row{ display:grid; grid-template-columns:1fr 1fr; gap:14px; }

  .form-actions{ margin-top:22px; display:flex; justify-content:flex-end; gap:10px; }
  .btn{ font-size:13.5px; font-weight:600; padding:10px 18px; border-radius:999px; transition:background .15s ease, transform .12s ease; }
  .btn:active{ transform:scale(.97); }
  .btn-primary{ background:var(--blue-500); color:#fff; }
  .btn-primary:hover{ background:var(--blue-600); }
  .btn-ghost{ background:transparent; color:var(--ink-900); border:1px solid var(--border); }
  .btn-ghost:hover{ background:var(--bg-soft); }

  .card-head-row{ display:flex; align-items:center; justify-content:space-between; margin-bottom:18px; }
  .video-list{ display:flex; flex-direction:column; gap:8px; }
  .video-item{
    display:flex; align-items:center; gap:12px; padding:10px 12px;
    border:1px solid var(--border); border-radius:var(--radius-sm); transition:border-color .15s ease, background .15s ease;
  }
  .video-item.checked{ border-color:var(--blue-500); background:#f4f7ff; }
  .video-item input[type="checkbox"]{ width:16px; height:16px; flex-shrink:0; cursor:pointer; }
  .video-item .titre{ flex:1; font-size:13.5px; font-weight:500; overflow:hidden; text-overflow:ellipsis; white-space:nowrap; }
  .video-item .ordre-input{
    width:56px; border:1px solid var(--border); border-radius:6px; padding:6px 8px; font-size:13px; text-align:center;
  }
  .video-item .ordre-label{ font-size:11.5px; color:var(--ink-400); }
  .empty-videos{ font-size:13.5px; color:var(--ink-400); padding:12px 0; }
</style>
</head>
<body>

  <div class="wrap">
    <a href="{{ route('admin.dashboard') }}" class="back-link">
      <svg width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg>
      Retour au dashboard
    </a>

    <form method="POST" action="{{ route('admin.series.update', $serie->id) }}">
      @csrf
      @method('PUT')

      <div class="card">
        <div class="card-head">
          <h1>Modifier la série</h1>
          <p>Ces informations sont visibles sur la page Cours.</p>
        </div>

        <div class="form-field">
          <label>Titre de la série</label>
          <input type="text" name="titre" value="{{ $serie->titre }}" required>
        </div>

        <div class="form-row">
          <div class="form-field">
            <label>Catégorie</label>
            <input type="text" name="categorie" value="{{ $serie->categorie }}">
          </div>
          <div class="form-field">
            <label>Couleur de la vignette</label>
            <input type="color" name="couleur" value="{{ $serie->couleur }}" style="height:38px; padding:4px; cursor:pointer;">
          </div>
        </div>

        <div class="form-field">
          <label>Description (optionnelle)</label>
          <textarea name="description" rows="3">{{ $serie->description }}</textarea>
        </div>
      </div>

      <div class="card">
        <div class="card-head">
          <h1>Vidéos de la série</h1>
          <p>Coche les tutoriels vidéo à inclure, et indique leur ordre (1 = première vidéo). Une vidéo décochée redevient un tuto indépendant sur la page Cours.</p>
        </div>

        <div class="video-list">
          @forelse($tousLesTutos as $video)
            @php $estDansCetteSerie = $video->serie_id === $serie->id; @endphp
            <label class="video-item {{ $estDansCetteSerie ? 'checked' : '' }}">
              <input type="checkbox" name="videos[]" value="{{ $video->id }}" {{ $estDansCetteSerie ? 'checked' : '' }}
                onchange="this.closest('.video-item').classList.toggle('checked', this.checked)">
              <span class="titre">{{ $video->titre }}</span>
              <span class="ordre-label">Ordre</span>
              <input type="number" class="ordre-input" name="ordre[{{ $video->id }}]" value="{{ $video->ordre ?: 0 }}" min="0">
            </label>
          @empty
            <p class="empty-videos">Aucun tutoriel vidéo n'a encore été publié. Ajoute-en d'abord depuis le panneau "Livres &amp; Tutoriels".</p>
          @endforelse
        </div>
      </div>

      <div class="form-actions">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-ghost">Annuler</a>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
      </div>
    </form>
  </div>

</body>
</html>