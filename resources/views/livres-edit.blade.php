<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Modifier — {{ $livre->titre }}</title>

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
  .form-field input, .form-field select{
    border:1px solid var(--border); border-radius:var(--radius-sm); padding:10px 12px; font-size:14px;
    color:var(--ink-900); background:#fff; outline:none; transition:border-color .15s ease;
  }
  .form-field input:focus, .form-field select:focus{ border-color:var(--blue-500); }

  .current-file{
    display:flex; align-items:center; gap:10px; background:var(--bg-soft); border:1px solid var(--border);
    border-radius:var(--radius-sm); padding:10px 14px; font-size:13px; color:var(--ink-600); margin-bottom:16px;
  }
  .current-file strong{ color:var(--ink-900); }

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
      <h1>Modifier ce contenu</h1>
      <p class="sub">Change ce que tu veux ci-dessous, les champs laissés vides gardent leur valeur actuelle.</p>

      @if ($errors->any())
        <div style="background:#fbe6e1; color:#c4442e; padding:12px 16px; border-radius:8px; font-size:13px; margin-bottom:20px;">
          <ul style="margin:0; padding-left:18px;">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form method="POST" action="{{ route('admin.livres.update', $livre->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="form-grid">
          <div class="form-field full">
            <label>Titre</label>
            <input type="text" name="titre" value="{{ old('titre', $livre->titre) }}" required>
          </div>
          <div class="form-field">
            <label>Auteur</label>
            <input type="text" name="auteur" value="{{ old('auteur', $livre->auteur) }}">
          </div>
          <div class="form-field">
            <label>Type</label>
            <select name="type">
              <option value="livre" {{ $livre->type === 'livre' ? 'selected' : '' }}>Livre</option>
              <option value="tuto" {{ $livre->type === 'tuto' ? 'selected' : '' }}>Tutoriel</option>
            </select>
          </div>
          <div class="form-field">
            <label>Catégorie</label>
            <select name="categorie">
              @foreach(['Informatique','Développement personnel','Gestion & Finance','Langues','Entrepreneuriat','Sciences'] as $cat)
                <option {{ $livre->categorie === $cat ? 'selected' : '' }}>{{ $cat }}</option>
              @endforeach
            </select>
          </div>
          <div class="form-field">
            <label>Prix (FCFA, 0 = gratuit)</label>
            <input type="number" name="prix" value="{{ old('prix', $livre->prix) }}" min="0">
          </div>

          <div class="form-field full">
            @if($livre->fichier_nom_original)
              <div class="current-file">
                📎 Fichier actuel : <strong>{{ $livre->fichier_nom_original }}</strong>
              </div>
            @elseif($livre->fichier_ou_lien)
              <div class="current-file">
                🔗 Lien actuel : <strong>{{ $livre->fichier_ou_lien }}</strong>
              </div>
            @endif
            <label>Remplacer par un lien externe</label>
            <input type="text" name="fichier_ou_lien" placeholder="https://... (laisser vide pour ne pas changer)">
          </div>

          <div class="form-field full">
            <label>Ou remplacer par un nouveau fichier</label>
            <input type="file" name="fichier" accept=".pdf,video/*">
            <small style="font-size:11.5px; color:var(--ink-400);">L'ancien fichier sera supprimé automatiquement si tu en uploades un nouveau.</small>
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