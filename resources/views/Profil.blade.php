<!DOCTYPE html>
<html lang="fr">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Mon profil — EduBénin</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link href="https://fonts.googleapis.com/css2?family=Sora:wght@400;600;700;800&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

<style>
  :root{
    --navy-900:#0e1c3f; --blue-600:#2557d6; --blue-700:#1a44b8;
    --orange-500:#f4901e;
    --ink-900:#101828; --ink-600:#4b5468; --ink-400:#8891a3;
    --paper:#ffffff; --bg-soft:#f6f8fc; --border:#e6eaf2;
    --green:#159862; --green-100:#e6f6ee; --danger:#d13a6b; --danger-100:#fdeaf0;
    --radius-lg:16px; --radius-md:12px; --radius-sm:8px;
    --shadow-card:0 4px 20px rgba(14,28,63,0.06);
  }
  *{ box-sizing:border-box; margin:0; padding:0; }
  body{ font-family:'Inter', system-ui, sans-serif; color:var(--ink-900); background:var(--bg-soft); -webkit-font-smoothing:antialiased; }
  h1,h2{ font-family:'Sora', sans-serif; }
  a{ text-decoration:none; color:inherit; }
  button, input, select{ font-family:inherit; }
  button{ cursor:pointer; border:none; }

  header.site-header{ position:sticky; top:0; z-index:100; background:rgba(255,255,255,0.94); backdrop-filter:blur(8px); border-bottom:1px solid var(--border); }
  .nav-row{ display:flex; align-items:center; justify-content:space-between; height:72px; gap:24px; max-width:1240px; margin:0 auto; padding:0 32px; }
  .logo{ display:flex; align-items:center; gap:8px; font-family:'Sora', sans-serif; font-weight:800; font-size:20px; }
  .logo .edu{ color:var(--blue-600); }
  .logo .benin{ color:var(--orange-500); }
  .back-link{ font-size:13.5px; font-weight:600; color:var(--ink-600); display:inline-flex; align-items:center; gap:6px; }
  .back-link:hover{ color:var(--navy-900); }

  .container{ max-width:640px; margin:0 auto; padding:40px 32px 60px; }

  .profile-head{ display:flex; align-items:center; gap:16px; margin-bottom:28px; }
  .profile-avatar{
    width:56px; height:56px; border-radius:999px; display:flex; align-items:center; justify-content:center;
    color:#fff; font-family:'Sora', sans-serif; font-weight:700; font-size:22px; flex-shrink:0;
  }
  .profile-head h1{ font-size:22px; font-weight:800; }
  .profile-head p{ font-size:13.5px; color:var(--ink-600); }

  .tabs{ display:flex; gap:6px; margin-bottom:20px; background:#fff; border:1px solid var(--border); border-radius:999px; padding:4px; width:fit-content; }
  .tab-btn{ font-size:13.5px; font-weight:600; padding:8px 18px; border-radius:999px; background:transparent; color:var(--ink-600); transition:background .15s ease, color .15s ease; }
  .tab-btn.active{ background:var(--navy-900); color:#fff; }

  .tab-panel{ display:none; }
  .tab-panel.active{ display:block; }

  .card{ background:#fff; border:1px solid var(--border); border-radius:var(--radius-lg); padding:28px; box-shadow:var(--shadow-card); }

  .form-field{ display:flex; flex-direction:column; gap:6px; margin-bottom:16px; }
  .form-field label{ font-size:12.5px; font-weight:600; }
  .form-field input, .form-field select{
    border:1px solid var(--border); border-radius:var(--radius-sm); padding:10px 12px; font-size:13.5px;
    color:var(--ink-900); background:#fff; outline:none; transition:border-color .15s ease;
  }
  .form-field input:focus, .form-field select:focus{ border-color:var(--blue-600); }
  .form-row{ display:grid; grid-template-columns:1fr 1fr; gap:14px; }
  .form-error{ font-size:12px; color:var(--danger); margin-top:2px; }

  .form-actions{ margin-top:20px; display:flex; justify-content:flex-end; }
  .btn{ font-size:13.5px; font-weight:600; padding:10px 20px; border-radius:999px; transition:background .15s ease, transform .12s ease; }
  .btn:active{ transform:scale(.97); }
  .btn-primary{ background:var(--blue-600); color:#fff; }
  .btn-primary:hover{ background:var(--blue-700); }

  .alert{ padding:12px 16px; border-radius:var(--radius-sm); font-size:13.5px; font-weight:600; margin-bottom:20px; }
  .alert-success{ background:var(--green-100); color:var(--green); }
  .alert-error{ background:var(--danger-100); color:var(--danger); }
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
      <a href="/Acceuil" class="back-link">
        <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5"/><path d="m12 19-7-7 7-7"/></svg>
        Retour à l'accueil
      </a>
    </div>
  </header>

  <div class="container">

    @php
      $initiale = mb_strtoupper(mb_substr($utilisateur->prenom, 0, 1));
      $paletteAvatars = ['#2557d6', '#159862', '#e07c0b', '#d13a6b', '#5b5fe0', '#0e8a7c'];
      $couleurAvatar = $paletteAvatars[ord($initiale) % count($paletteAvatars)];
      $ongletActif = session('active_tab', 'infos');
    @endphp

    <div class="profile-head">
      <span class="profile-avatar" style="background:{{ $couleurAvatar }}">{{ $initiale }}</span>
      <div>
        <h1>{{ $utilisateur->prenom }} {{ $utilisateur->nom }}</h1>
        <p>{{ $utilisateur->email }}</p>
      </div>
    </div>

    @if(session('success'))
      <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if($errors->any())
      <div class="alert alert-error">{{ $errors->first() }}</div>
    @endif

    <div class="tabs">
      <button type="button" class="tab-btn {{ $ongletActif === 'infos' ? 'active' : '' }}" data-tab="infos">Informations</button>
      <button type="button" class="tab-btn {{ $ongletActif === 'password' ? 'active' : '' }}" data-tab="password">Mot de passe</button>
    </div>

    <div class="tab-panel {{ $ongletActif === 'infos' ? 'active' : '' }}" id="panel-infos">
      <div class="card">
        <form method="POST" action="{{ route('profil.update') }}">
          @csrf
          @method('PUT')

          <div class="form-row">
            <div class="form-field">
              <label>Prénom</label>
              <input type="text" name="prenom" value="{{ old('prenom', $utilisateur->prenom) }}" required>
            </div>
            <div class="form-field">
              <label>Nom</label>
              <input type="text" name="nom" value="{{ old('nom', $utilisateur->nom) }}" required>
            </div>
          </div>

          <div class="form-field">
            <label>Adresse e-mail</label>
            <input type="email" name="email" value="{{ old('email', $utilisateur->email) }}" required>
          </div>

          <div class="form-field">
            <label>Téléphone</label>
            <input type="text" name="telephone" value="{{ old('telephone', $utilisateur->telephone) }}" required>
          </div>

          <div class="form-row">
            <div class="form-field">
              <label>Sexe</label>
              <select name="sexe" required>
                <option value="Homme" {{ old('sexe', $utilisateur->sexe) === 'Homme' ? 'selected' : '' }}>Homme</option>
                <option value="Femme" {{ old('sexe', $utilisateur->sexe) === 'Femme' ? 'selected' : '' }}>Femme</option>
              </select>
            </div>
            <div class="form-field">
              <label>Situation</label>
              <input type="text" name="situation" value="{{ old('situation', $utilisateur->situation) }}" required>
            </div>
          </div>

          <div class="form-row">
            <div class="form-field">
              <label>Niveau d'étude</label>
              <input type="text" name="niveau" value="{{ old('niveau', $utilisateur->niveau) }}">
            </div>
            <div class="form-field">
              <label>Domaine</label>
              <input type="text" name="domaine" value="{{ old('domaine', $utilisateur->domaine) }}">
            </div>
          </div>

          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
          </div>
        </form>
      </div>
    </div>

    <div class="tab-panel {{ $ongletActif === 'password' ? 'active' : '' }}" id="panel-password">
      <div class="card">
        <form method="POST" action="{{ route('profil.password.update') }}">
          @csrf
          @method('PUT')

          <div class="form-field">
            <label>Mot de passe actuel</label>
            <input type="password" name="mot_de_passe_actuel" required>
          </div>

          <div class="form-field">
            <label>Nouveau mot de passe</label>
            <input type="password" name="password" required>
          </div>

          <div class="form-field">
            <label>Confirmer le nouveau mot de passe</label>
            <input type="password" name="password_confirmation" required>
          </div>

          <div class="form-actions">
            <button type="submit" class="btn btn-primary">Changer le mot de passe</button>
          </div>
        </form>
      </div>
    </div>

  </div>

  <script>
    document.querySelectorAll('.tab-btn').forEach(bouton => {
      bouton.addEventListener('click', () => {
        document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
        document.querySelectorAll('.tab-panel').forEach(p => p.classList.remove('active'));
        bouton.classList.add('active');
        document.getElementById('panel-' + bouton.dataset.tab).classList.add('active');
      });
    });
  </script>

</body>
</html>