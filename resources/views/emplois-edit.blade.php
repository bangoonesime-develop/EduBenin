<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Modifier — {{ $emploi->titre }}</title>

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
  body{ font-family:'Inter', system-ui, sans-serif; color:var(--ink-900); background:var(--bg-soft); -webkit-font-smoothing:antialiased; }
  h1,h2{ font-family:'Sora', sans-serif; }
  a{ text-decoration:none; color:inherit; }
  button{ font-family:inherit; cursor:pointer; border:none; }

  .page{ max-width:720px; margin:0 auto; padding:40px 24px 80px; }
  .back-link{ font-size:13.5px; font-weight:600; color:var(--ink-600); display:inline-flex; align-items:center; gap:6px; margin-bottom:20px; }
  .back-link:hover{ color:var(--ink-900); }

  .card{ background:#fff; border:1px solid var(--border); border-radius:var(--radius-lg); padding:32px; box-shadow:var(--shadow-card); }
  .card h1{ font-size:20px; font-weight:700; margin-bottom:6px; }
  .card p.sub{ font-size:13.5px; color:var(--ink-600); margin-bottom:28px; }

  .form-grid{ display:grid; grid-template-columns:1fr 1fr; gap:16px; }
  .form-field{ display:flex; flex-direction:column; gap:6px; margin-bottom:16px; }
  .form-field.full{ grid-column:1 / -1; }
  .form-field label{ font-size:13px; font-weight:600; }
  .form-field input, .form-field select, .form-field textarea{
    border:1px solid var(--border); border-radius:var(--radius-sm); padding:10px 12px; font-size:14px;
    color:var(--ink-900); background:#fff; outline:none; transition:border-color .15s ease; font-family:inherit;
  }
  .form-field input:focus, .form-field select:focus, .form-field textarea:focus{ border-color:var(--blue-500); }
  .form-field textarea{ resize:vertical; }

  .form-actions{ margin-top:10px; display:flex; justify-content:flex-end; gap:10px; }
  .btn{ font-size:13.5px; font-weight:600; padding:10px 20px; border-radius:999px; transition:background .15s ease, transform .12s ease; }
  .btn:active{ transform:scale(.97); }
  .btn-primary{ background:var(--blue-500); color:#fff; }
  .btn-primary:hover{ background:var(--blue-600); }
  .btn-ghost{ background:transparent; color:var(--ink-900); border:1px solid var(--border); }
  .btn-ghost:hover{ background:var(--bg-soft); }

  @media (max-width:600px){ .form-grid{ grid-template-columns:1fr; } }
</style>
</head>
<body>

  <div class="page">
    <a href="{{ route('admin.dashboard') }}" class="back-link">← Retour au tableau de bord</a>

    <div class="card">
      <h1>Modifier cette offre</h1>
      <p class="sub">Change ce que tu veux ci-dessous, puis enregistre.</p>

      @if ($errors->any())
        <div style="background:#fbe6e1; color:#c4442e; padding:12px 16px; border-radius:8px; font-size:13px; margin-bottom:20px;">
          <ul style="margin:0; padding-left:18px;">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form method="POST" action="{{ route('admin.emplois.update', $emploi->id) }}">
        @csrf
        @method('PUT')

        <div class="form-grid">
          <div class="form-field full">
            <label>Intitulé du poste</label>
            <input type="text" name="titre" value="{{ old('titre', $emploi->titre) }}" required>
          </div>
          <div class="form-field">
            <label>Entreprise</label>
            <input type="text" name="entreprise" value="{{ old('entreprise', $emploi->entreprise) }}">
          </div>
          <div class="form-field">
            <label>Type</label>
            <select name="type">
              <option value="emploi" {{ $emploi->type === 'emploi' ? 'selected' : '' }}>Emploi</option>
              <option value="stage" {{ $emploi->type === 'stage' ? 'selected' : '' }}>Stage</option>
            </select>
          </div>
          <div class="form-field">
            <label>Ville</label>
            <input type="text" name="ville" value="{{ old('ville', $emploi->ville) }}">
          </div>
          <div class="form-field">
            <label>Date limite de candidature</label>
            <input type="date" name="date_limite" value="{{ old('date_limite', $emploi->date_limite) }}">
          </div>
          <div class="form-field full">
            <label>Lien ou email de candidature</label>
            <input type="text" name="lien_candidature" value="{{ old('lien_candidature', $emploi->lien_candidature) }}">
          </div>
          <div class="form-field full">
            <label>Description</label>
            <textarea name="description" rows="4">{{ old('description', $emploi->description) }}</textarea>
          </div>
        </div>

        <div class="form-actions">
          <a href="{{ route('admin.dashboard') }}" class="btn btn-ghost">Annuler</a>
          <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
        </div>
      </form>
    </div>
  </div>

</body>
</html>