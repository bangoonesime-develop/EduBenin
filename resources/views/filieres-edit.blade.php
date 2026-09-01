<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Modifier une filière — EduBénin Admin</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
  :root{
    --ink-900:#111111;
    --ink-600:#5c5c5c;
    --ink-400:#8f8f8f;
    --paper:#ffffff;
    --bg-soft:#f6f7f9;
    --border:#e4e6ea;
    --blue-500:#2557d6;
    --blue-600:#1a44b8;
    --radius-lg:16px;
    --radius-md:12px;
    --radius-sm:8px;
    --shadow-card:0 2px 10px rgba(0,0,0,0.05);
  }
  *{ box-sizing:border-box; margin:0; padding:0; }
  body{
    font-family:'Inter', system-ui, sans-serif; color:var(--ink-900); background:var(--bg-soft);
    -webkit-font-smoothing:antialiased; min-height:100vh; display:flex; align-items:center; justify-content:center; padding:32px;
  }
  h1{ font-family:'Sora', sans-serif; }
  a{ text-decoration:none; color:inherit; }
  button, input, textarea{ font-family:inherit; }
  button{ cursor:pointer; border:none; }

  .card{
    width:100%; max-width:560px; background:#fff; border:1px solid var(--border);
    border-radius:var(--radius-lg); padding:32px; box-shadow:var(--shadow-card);
  }
  .card-head{ margin-bottom:22px; }
  .card-head h1{ font-size:20px; font-weight:700; }
  .card-head p{ font-size:13.5px; color:var(--ink-600); margin-top:4px; }

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
</style>
</head>
<body>

  <div class="card">
    <div class="card-head">
      <h1>Modifier la filière</h1>
      <p>Les changements sont visibles immédiatement sur la page Communauté.</p>
    </div>

    <form method="POST" action="{{ route('admin.filieres.update', $filiere->id) }}">
      @csrf
      @method('PUT')

      <div class="form-field">
        <label>Nom de la filière</label>
        <input type="text" name="nom" value="{{ $filiere->nom }}" required>
      </div>

      <div class="form-row">
        <div class="form-field">
          <label>Couleur de l'icône</label>
          <input type="color" name="couleur" value="{{ $filiere->couleur }}" style="height:38px; padding:4px; cursor:pointer;">
        </div>
        <div class="form-field">
          <label>Nombre de membres (affiché)</label>
          <input type="number" name="nombre_membres" value="{{ $filiere->nombre_membres }}" min="0">
        </div>
      </div>

      <div class="form-field">
        <label>Lien du groupe WhatsApp</label>
        <input type="text" name="lien_whatsapp" value="{{ $filiere->lien_whatsapp }}" required>
      </div>

      <div class="form-field">
        <label>Description (optionnelle)</label>
        <textarea name="description" rows="3">{{ $filiere->description }}</textarea>
      </div>

      <div class="form-actions">
        <a href="{{ route('admin.dashboard') }}" class="btn btn-ghost">Annuler</a>
        <button type="submit" class="btn btn-primary">Enregistrer</button>
      </div>
    </form>
  </div>

</body>
</html>