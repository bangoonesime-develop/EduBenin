<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Créer un compte - EduBénin</title>
    <meta name="description" content="Créer ton compte EduBénin et accède aux cours,ressouces,bourses,emplois et opportunités.">
    <style>
        /* =========================================================
   EDUBÉNIN — FORMULAIRE D'INSCRIPTION
========================================================= */


/* =========================================================
   1. VARIABLES
========================================================= */

:root {

    --navy-950: #0a1530;
    --navy-900: #0e1c3f;
    --navy-800: #152752;

    --blue-600: #2557d6;
    --blue-700: #1a44b8;
    --blue-100: #e8eefc;

    --orange-500: #f4901e;
    --orange-600: #e07c0b;
    --orange-100: #fef1e2;

    --green-600: #159862;
    --green-100: #e6f6ee;

    --red-600: #dc3545;
    --red-100: #fdebec;

    --ink-900: #101828;
    --ink-600: #4b5468;
    --ink-400: #8891a3;

    --paper: #ffffff;
    --bg-soft: #f6f8fc;
    --border: #e6eaf2;

    --radius-lg: 20px;
    --radius-md: 12px;
    --radius-sm: 8px;

    --shadow-card:
        0 10px 40px rgba(14, 28, 63, 0.08);

    --shadow-hover:
        0 15px 40px rgba(14, 28, 63, 0.14);
}


/* =========================================================
   2. RESET
========================================================= */

* {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
}


html {
    scroll-behavior: smooth;
}


body {
    font-family: 'Inter', system-ui, sans-serif;

    color: var(--ink-900);

    background:
        radial-gradient(
            circle at top left,
            rgba(37, 87, 214, 0.06),
            transparent 30%
        ),
        var(--bg-soft);

    -webkit-font-smoothing: antialiased;
}


h1,
h2,
h3 {
    font-family: 'Sora', sans-serif;
}


a {
    color: inherit;
    text-decoration: none;
}


button,
input,
select {
    font-family: inherit;
}


button {
    cursor: pointer;
}


.container {
    width: 100%;
    max-width: 1240px;

    margin: 0 auto;

    padding: 0 32px;
}


/* =========================================================
   3. HEADER
========================================================= */

.site-header {

    position: sticky;

    top: 0;

    z-index: 100;

    background: rgba(255, 255, 255, 0.94);

    backdrop-filter: blur(10px);

    border-bottom: 1px solid var(--border);
}


.nav-row {

    display: flex;

    align-items: center;

    justify-content: space-between;

    min-height: 72px;

    gap: 24px;
}


/* =========================================================
   LOGO
========================================================= */

.logo {

    display: flex;

    align-items: center;

    gap: 8px;

    font-family: 'Sora', sans-serif;

    font-size: 20px;

    font-weight: 800;

    white-space: nowrap;
}


.logo .edu {
    color: var(--blue-600);
}


.logo .benin {
    color: var(--orange-500);
}


.back-link {

    color: var(--ink-600);

    font-size: 14px;

    font-weight: 600;

    transition: color 0.2s ease;
}


.back-link:hover {
    color: var(--blue-600);
}


/* =========================================================
   4. PAGE
========================================================= */

.register-page {

    min-height: calc(100vh - 72px);

    padding: 60px 0 70px;
}


.register-container {

    display: grid;

    grid-template-columns: 0.9fr 1.1fr;

    align-items: center;

    gap: 70px;

    max-width: 1100px;

    margin: 0 auto;
}


/* =========================================================
   5. PARTIE GAUCHE
========================================================= */

.register-intro {
    padding: 20px 0;
}


.intro-badge {

    display: inline-flex;

    align-items: center;

    padding: 8px 14px;

    border-radius: 999px;

    background: var(--blue-100);

    color: var(--blue-700);

    font-size: 13px;

    font-weight: 700;

    margin-bottom: 20px;
}


.register-intro h1 {

    font-size: clamp(32px, 4vw, 50px);

    line-height: 1.12;

    letter-spacing: -1.5px;

    margin-bottom: 20px;
}


.register-intro h1 span {
    display: block;

    color: var(--blue-600);
}


.register-intro > p {

    max-width: 520px;

    color: var(--ink-600);

    font-size: 16px;

    line-height: 1.75;

    margin-bottom: 32px;
}


/* =========================================================
   AVANTAGES
========================================================= */

.benefits {

    display: flex;

    flex-direction: column;

    gap: 18px;
}


.benefit {

    display: flex;

    align-items: center;

    gap: 14px;
}


.benefit-icon {

    width: 46px;

    height: 46px;

    flex-shrink: 0;

    display: flex;

    align-items: center;

    justify-content: center;

    border-radius: 12px;

    background: #fff;

    border: 1px solid var(--border);

    box-shadow: var(--shadow-card);

    font-size: 21px;
}


.benefit h3 {

    font-size: 14px;

    margin-bottom: 3px;
}


.benefit p {

    color: var(--ink-400);

    font-size: 12.5px;
}


/* =========================================================
   6. CARTE FORMULAIRE
========================================================= */

.register-card {

    background: var(--paper);

    border: 1px solid var(--border);

    border-radius: var(--radius-lg);

    padding: 34px;

    box-shadow: var(--shadow-card);
}


.form-header {
    margin-bottom: 26px;
}


.form-header h2 {

    font-size: 25px;

    margin-bottom: 7px;
}


.form-header p {

    color: var(--ink-400);

    font-size: 13.5px;
}


/* =========================================================
   7. FORMULAIRE
========================================================= */

.form-row {

    display: grid;

    grid-template-columns: 1fr 1fr;

    gap: 16px;
}


.form-group {

    margin-bottom: 18px;
}


.form-group label,
.form-group legend {

    display: block;

    color: var(--ink-900);

    font-size: 13px;

    font-weight: 600;

    margin-bottom: 8px;
}


fieldset {
    border: none;
}


input,
select {

    width: 100%;

    height: 46px;

    border: 1px solid var(--border);

    border-radius: var(--radius-sm);

    background: #fff;

    color: var(--ink-900);

    padding: 0 13px;

    outline: none;

    font-size: 13.5px;

    transition:
        border-color 0.2s ease,
        box-shadow 0.2s ease,
        background 0.2s ease;
}


input::placeholder {
    color: var(--ink-400);
}


input:focus,
select:focus {

    border-color: var(--blue-600);

    box-shadow:
        0 0 0 4px rgba(37, 87, 214, 0.10);

    background: #fff;
}


/* =========================================================
   8. TÉLÉPHONE
========================================================= */

.phone-group {

    display: grid;

    grid-template-columns: 125px 1fr;

    gap: 8px;
}


.phone-group select {
    padding: 0 8px;
}


/* =========================================================
   9. RADIO — SEXE
========================================================= */

.radio-group {

    display: grid;

    grid-template-columns: repeat(3, 1fr);

    gap: 8px;
}


.radio-card {

    min-height: 44px;

    display: flex !important;

    align-items: center;

    gap: 7px;

    padding: 8px 10px;

    border: 1px solid var(--border);

    border-radius: var(--radius-sm);

    cursor: pointer;

    color: var(--ink-600) !important;

    font-size: 12px !important;

    font-weight: 500 !important;

    margin: 0 !important;

    transition:
        border-color 0.2s ease,
        background 0.2s ease;
}


.radio-card:hover {

    border-color: var(--blue-600);

    background: var(--blue-100);
}


.radio-card input {

    width: auto;

    height: auto;

    accent-color: var(--blue-600);
}


/* =========================================================
   10. MOT DE PASSE
========================================================= */

.password-wrapper {

    position: relative;
}


.password-wrapper input {

    padding-right: 48px;
}


.toggle-password {

    position: absolute;

    top: 50%;

    right: 10px;

    transform: translateY(-50%);

    width: 32px;

    height: 32px;

    display: flex;

    align-items: center;

    justify-content: center;

    background: transparent;

    border: none;

    border-radius: 50%;

    font-size: 16px;
}


.toggle-password:hover {
    background: var(--bg-soft);
}


/* =========================================================
   11. FORCE DU MOT DE PASSE
========================================================= */

.password-strength {

    margin-top: 8px;
}


.strength-bar {

    width: 100%;

    height: 5px;

    background: #edf0f5;

    border-radius: 999px;

    overflow: hidden;
}


#strengthFill {

    display: block;

    width: 0%;

    height: 100%;

    border-radius: 999px;

    transition:
        width 0.3s ease,
        background 0.3s ease;
}


#strengthText {

    display: block;

    margin-top: 5px;

    font-size: 11px;

    color: var(--ink-400);
}


/* =========================================================
   12. ERREURS
========================================================= */

.error-message {

    display: block;

    min-height: 15px;

    margin-top: 5px;

    color: var(--red-600);

    font-size: 11.5px;
}


.form-group.error input,
.form-group.error select {

    border-color: var(--red-600);

    background: var(--red-100);
}


.form-group.success input,
.form-group.success select {

    border-color: var(--green-600);
}


/* =========================================================
   13. CONDITIONS
========================================================= */

.terms {

    margin: 4px 0 18px;
}


.terms label {

    display: flex;

    align-items: flex-start;

    gap: 9px;

    color: var(--ink-600);

    font-size: 11.5px;

    line-height: 1.6;

    cursor: pointer;
}


.terms input {

    width: auto;

    height: auto;

    margin-top: 3px;

    accent-color: var(--blue-600);
}


.terms a {

    color: var(--blue-600);

    font-weight: 600;
}


/* =========================================================
   14. MESSAGE
========================================================= */

.form-message {

    display: none;

    padding: 11px 13px;

    border-radius: var(--radius-sm);

    margin-bottom: 15px;

    font-size: 12.5px;

    line-height: 1.5;
}


.form-message.show {
    display: block;
}


.form-message.success {

    color: #116b47;

    background: var(--green-100);

    border: 1px solid #b9e7d2;
}


.form-message.error {

    color: #a92735;

    background: var(--red-100);

    border: 1px solid #f4c2c7;
}


/* =========================================================
   15. BOUTON
========================================================= */

.submit-btn {

    width: 100%;

    min-height: 50px;

    display: flex;

    align-items: center;

    justify-content: center;

    gap: 10px;

    border: none;

    border-radius: 999px;

    background: var(--navy-900);

    color: #fff;

    font-size: 14px;

    font-weight: 700;

    transition:
        transform 0.15s ease,
        background 0.2s ease,
        box-shadow 0.2s ease;
}


.submit-btn:hover {

    background: var(--blue-700);

    box-shadow: var(--shadow-hover);

    transform: translateY(-1px);
}


.submit-btn:active {

    transform: scale(0.98);
}


.login-link {

    text-align: center;

    margin-top: 18px;

    color: var(--ink-400);

    font-size: 12.5px;
}


.login-link a {

    color: var(--blue-600);

    font-weight: 700;
}


/* =========================================================
   16. FOOTER
========================================================= */

footer {

    background: var(--navy-950);

    color: #c4cce3;

    padding: 24px 0;
}


.footer-content {

    display: flex;

    align-items: center;

    justify-content: space-between;

    gap: 20px;

    font-size: 12px;
}


/* =========================================================
   17. RESPONSIVE — TABLETTE
========================================================= */

@media (max-width: 950px) {

    .register-container {

        grid-template-columns: 1fr;

        max-width: 650px;

        gap: 30px;
    }


    .register-intro {

        text-align: center;
    }


    .register-intro > p {

        margin-left: auto;

        margin-right: auto;
    }


    .benefits {

        display: grid;

        grid-template-columns: repeat(3, 1fr);

        text-align: left;
    }
}


/* =========================================================
   18. RESPONSIVE — MOBILE
========================================================= */

@media (max-width: 650px) {

    .container {

        padding: 0 18px;
    }


    .register-page {

        padding: 35px 0 45px;
    }


    .register-intro h1 {

        font-size: 32px;
    }


    .benefits {

        grid-template-columns: 1fr;
    }


    .register-card {

        padding: 22px 18px;

        border-radius: 16px;
    }


    .form-row {

        grid-template-columns: 1fr;

        gap: 0;
    }


    .radio-group {

        grid-template-columns: 1fr;
    }


    .phone-group {

        grid-template-columns: 105px 1fr;
    }


    .footer-content {

        flex-direction: column;

        text-align: center;
    }
}


/* =========================================================
   19. PETITS TÉLÉPHONES
========================================================= */

@media (max-width: 400px) {

    .register-card {

        padding: 18px 14px;
    }


    .register-intro h1 {

        font-size: 28px;
    }


    .phone-group {

        grid-template-columns: 95px 1fr;
    }


    .phone-group select {

        font-size: 12px;
    }
}
    </style>
</head>
<body>
    <header class="site-header">
        <div class="container nav-row">
            <a href="#" class="logo">
                <svg
                    width="30"
                    height="30"
                    viewBox="0 0 48 48"
                    fill="none"
                    aria-hidden="true"
                >
                    <path
                        d="M6 22 L24 12 L42 22 L24 32 Z"
                        fill="#0e1c3f"
                    />
                    <path
                        d="M4 24c6 2 10 8 20 10 10-2 14-8 20-10"
                        stroke="#2557d6"
                        stroke-width="4"
                        fill="none"
                        stroke-linecap="round"
                    />
                    <path 
                        d="M8 26c5 2 9 7 16 8 7-1 11-6 16-8"
                        stroke="#f4901e"
                        stroke-width="3"
                        fill="none"
                        stroke-linecap="round"
                    />
                </svg>
                <span>
                    <span class="edu">Edu</span><span class="benin">Bénin</span>
                </span>
            </a>
            <a href="/Acceuil" class="back-link">
                Retour à l'Accueil
            </a>
        </div>
    </header>

    <main class="register-page">
        <div class="register-container">
            <section class="register-intro">
                <span class="intro-badge">
                    Bienvenue sur EduBénin
                </span>
                <h1>Construis ton avenir avec <span>EduBénin</span></h1>
                <p>
                    Crée ton compte pour découvrir les cours, des ressources, des bourses, des stages, des emplois et de nouvelles opportunités.
                </p>

                <div class="benefits-wrapper">
                    <div class="benefits">
                        <div class="benefits-icon">📚</div>
                        <div>
                            <h3>Apprends</h3>
                            <p>Accède à des cours, livres et tutoriels.</p>
                        </div>
                    </div>

                    <div class="benefits">
                        <div class="benefits-icon">🎓</div>
                        <div>
                            <h3>Découvre</h3>
                            <p>Trouve des bourses, formations et opportunités.</p>
                        </div>
                    </div>

                    <div class="benefits">
                        <div class="benefits-icon">🚀</div>
                        <div>
                            <h3>Avance</h3>
                            <p>Construis progressivement ton parcours.</p>
                        </div>
                    </div>
                </div>
            </section>

            <section class="register-card">
                <div class="form-header">
                    <h2>Créer mon compte</h2>
                    <p>Quelques informations pour commencer.</p>
                </div>

                <!-- Erreurs renvoyées par Laravel après validation côté serveur -->
                @if ($errors->any())
                    <div class="form-message show error">
                        <ul style="margin:0; padding-left:18px;">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form class="registerForm" action="/Inscription" method="POST">
                    @csrf
                    <div class="form-row">
                        <div class="form-group">
                            <label for="prenom">Prénom</label>
                            <input type="text" name="prenom" id="prenom" placeholder="Votre prénom" autocomplete="given-name" value="{{ old('prenom') }}" required>
                            <small class="error-message"></small>
                        </div>

                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input type="text" name="nom" id="nom" placeholder="Votre nom" autocomplete="family-name" value="{{ old('nom') }}" required>
                            <small class="error-message"></small>
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" placeholder="example@gmail.com" autocomplete="email" value="{{ old('email') }}" required>
                            <small class="error-message"></small>
                        </div>

                        <div class="form-group">
                            <label for="telephone">Numéro de téléphone</label>
                            <div class="phone-group">
                                <select name="countrycode" id="countrycode" aria-label="Indicatif téléphonique">
                                    <option value="+229">+229</option>
                                    <option value="+228">+228</option>
                                    <option value="+225">+225</option>
                                    <option value="+234">+234</option>
                                    <option value="+233">+233</option>
                                    <option value="+221">+221</option>
                                    <option value="+226">+226</option>
                                    <option value="+223">+223</option>
                                    <option value="+227">+227</option>
                                    <option value="+212">+212</option>
                                    <option value="+33">+33</option>
                                    <option value="+1">+1</option>
                                    <option value="+44">+44</option>
                                    <option value="+49">+49</option>
                                    <option value="+32">+32</option>
                                    <option value="+41">+41</option>
                                    <option value="+39">+39</option>
                                    <option value="+34">+34</option>
                                    <option value="+351">+351</option>
                                    <option value="+91">+91</option>
                                    <option value="+81">+81</option>
                                    <option value="+86">+86</option>
                                </select>
                                <input type="tel" name="telephone" id="telephone" placeholder="ex: 01 90 00 00 00" autocomplete="tel" required>
                            </div>
                            <small class="error-message"></small>
                        </div>

                        <fieldset class="form-group" id="sexeGroup">
                            <legend>Sexe</legend>
                            <div class="radio-group">
                                <label class="radio-card">
                                    <input type="radio" name="sexe" value="homme" required>
                                    <span>Homme</span>
                                </label>
                                <label class="radio-card">
                                    <input type="radio" name="sexe" value="femme">
                                    <span>Femme</span>
                                </label>
                                <label class="radio-card">
                                    <input type="radio" name="sexe" value="Autres">
                                    <span>Autres</span>
                                </label>
                            </div>
                            <small class="error-message"></small>
                        </fieldset>

                        <div class="form-group">
                            <label for="situation">Situation actuelle</label>
                            <select name="situation" id="situation" required>
                                <option value="">Sélectionne ta situation actuelle</option>
                                <option value="eleve">Élève / Lycéen(ne)</option>
                                <option value="etudiant">Étudiant(e)</option>
                                <option value="formation">📚 En formation</option>
                                <option value="jeune-diplôme">🎓 Jeune diplômé(e)</option>
                                <option value="recherche d'emplois">🔍 À la recherche d'un emploi</option>
                                <option value="entrepreneur">🚀 Entrepreneur(e) / Porteur(se) de projet</option>
                                <option value="enseignant">👨‍🏫 Enseignant(e)</option>
                                <option value="autodidacte">Autodidacte</option>
                                <option value="autre">Autres</option>
                            </select>
                            <small class="error-message"></small>
                        </div>

                        <div class="form-group">
                            <label for="niveau">Niveau d'études</label>
                            <select name="niveau" id="niveau">
                                <option value="">Sélectionne ton niveau</option>
                                <option value="college">Collège</option>
                                <option value="lycee">Lycée</option>
                                <option value="bac">Baccalauréat</option>
                                <option value="licence1">Licence 1</option>
                                <option value="licence2">Licence 2</option>
                                <option value="licence3">Licence 3</option>
                                <option value="master1">Master 1</option>
                                <option value="master2">Master 2</option>
                                <option value="doctorat">Doctorat</option>
                                <option value="formation-pro">Formation professionnelle</option>
                                <option value="autre">Autres</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="domaine">Domaines d'études ou d'activité</label>
                            <select name="domaine" id="domaine">
                                <option value="">Sélectionne ton domaine</option>
                                <option value="informatique">Informatique et technologie</option>
                                <option value="gestion">Gestion & finance</option>
                                <option value="commerce">Commerce et marketing</option>
                                <option value="droit">Droit</option>
                                <option value="sante">Santé & Médecine</option>
                                <option value="sciences">Sciences</option>
                                <option value="ingenerie">Ingénierie</option>
                                <option value="education">Éducation</option>
                                <option value="entrepreneuriat">Entrepreneuriat</option>
                                <option value="arts">Arts & Design</option>
                                <option value="langues">Langues</option>
                                <option value="autre">Autres</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="password">Mot de passe</label>
                            <div class="password-wrapper">
                                <input type="password" name="password" id="password" placeholder="Crée un mot de passe" autocomplete="new-password" required>
                                <button type="button" class="toggle-password" data-target="password" aria-label="Afficher le mot de passe">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </div>
                            <div class="password-strength">
                                <div class="strength-bar">
                                    <span id="strengthFil"></span>
                                </div>
                                <span id="strengthText">Sécurité du mot de passe</span>
                            </div>
                            <small class="error-message"></small>
                        </div>

                        <div class="form-group">
                            <label for="password_confirm">Confirmer le mot de passe</label>
                            <div class="password-wrapper">
                                <!-- name="password_confirmation" : c'est le nom EXACT que la règle
                                     de validation Laravel "confirmed" attend pour comparer avec
                                     le champ "password". Sans ce nom précis, la validation échoue
                                     toujours et l'inscription est silencieusement bloquée. -->
                                <input type="password" name="password_confirmation" id="password_confirm" placeholder="Répète ton mot de passe" autocomplete="new-password" required>
                                <button type="button" class="toggle-password" data-target="password_confirm" aria-label="Afficher le mot de passe">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </div>
                            <small class="error-message"></small>
                        </div>

                        <div class="terms">
                            <label>
                                <input type="checkbox" name="terms" id="terms" required>
                                <span>J'accepte les Conditions d'utilisation et la politique de confidentialité</span>
                            </label>
                            <small class="error-message"></small>
                        </div>

                        <div class="form-message" id="formMessage" role="alert"></div>

                        <button type="submit" class="submit-btn">
                            <span>Créer mon compte</span>
                        </button>

                        <p class="login-link">
                            Tu as déjà un compte ?
                            <a href="/Connexion">Se connecter</a>
                        </p>
                    </div>
                </form>
            </section>
        </div>
    </main>

    <footer>
        <div class="container footer-content">
            <p>
                <span>Copyright &copy; <strong>BODEM</strong> © 2026 EduBénin. Tous droits réservés.</span>
                <span>Conçu et développé au Bénin</span>
            </p>
            <p>
                Apprendre <span>.</span> Découvrir <span>.</span> Construire
            </p>
        </div>
    </footer>
   <script>
/* =========================================================
   EDUBÉNIN — JAVASCRIPT DU FORMULAIRE D'INSCRIPTION
========================================================= */

document.addEventListener("DOMContentLoaded", function () {

    /* =========================================================
       1. RÉCUPÉRATION DES ÉLÉMENTS HTML
    ========================================================= */
    const form = document.querySelector(".registerForm") || document.getElementById("registerForm");

    const prenom = document.getElementById("prenom");
    const nom = document.getElementById("nom");
    const email = document.getElementById("email");
    const telephone = document.getElementById("telephone");
    const countryCode = document.getElementById("countrycode");
    const situation = document.getElementById("situation");
    const password = document.getElementById("password");
    // L'id reste "password_confirm" (seul le "name" a changé pour Laravel)
    const confirmPassword = document.getElementById("confirmPassword") || document.getElementById("password_confirm");
    const terms = document.getElementById("terms");
    const formMessage = document.getElementById("formMessage");
    const strengthFill = document.getElementById("strengthFil") || document.getElementById("strengthFill");
    const strengthText = document.getElementById("strengthText");

    /* =========================================================
       2. FONCTIONS DE GESTION DES ERREURS & SUCCÈS
    ========================================================= */
    function showError(input, message) {
        if (!input) return;
        const formGroup = input.closest(".form-group") || input.closest("fieldset");
        if (!formGroup) return;

        formGroup.classList.remove("success");
        formGroup.classList.add("error");

        const errorMessage = formGroup.querySelector(".error-message");
        if (errorMessage) {
            errorMessage.textContent = message;
            errorMessage.style.color = "#dc3545";
        }
    }

    function showSuccess(input) {
        if (!input) return;
        const formGroup = input.closest(".form-group") || input.closest("fieldset");
        if (!formGroup) return;

        formGroup.classList.remove("error");
        formGroup.classList.add("success");

        const errorMessage = formGroup.querySelector(".error-message");
        if (errorMessage) {
            errorMessage.textContent = "";
        }
    }

    /* =========================================================
       3. FONCTIONS DE VALIDATION PAR CHAMP
    ========================================================= */
    function validatePrenom() {
        if (!prenom) return true;
        const value = prenom.value.trim();
        if (value === "") {
            showError(prenom, "Entre ton prénom.");
            return false;
        }
        if (value.length < 2) {
            showError(prenom, "Le prénom doit contenir au moins 2 caractères.");
            return false;
        }
        showSuccess(prenom);
        return true;
    }

    function validateNom() {
        if (!nom) return true;
        const value = nom.value.trim();
        if (value === "") {
            showError(nom, "Entre ton nom.");
            return false;
        }
        if (value.length < 2) {
            showError(nom, "Le nom doit contenir au moins 2 caractères.");
            return false;
        }
        showSuccess(nom);
        return true;
    }

    function validateEmail() {
        if (!email) return true;
        const value = email.value.trim();
        if (value === "") {
            showError(email, "Entre ton adresse e-mail.");
            return false;
        }
        const emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!emailRegex.test(value)) {
            showError(email, "Entre une adresse e-mail valide.");
            return false;
        }
        showSuccess(email);
        return true;
    }

    function validateTelephone() {
        if (!telephone) return true;
        const value = telephone.value.replace(/\D/g, "");
        if (value === "") {
            showError(telephone, "Entre ton numéro de téléphone.");
            return false;
        }
        if (value.length < 7) {
            showError(telephone, "Le numéro semble trop court.");
            return false;
        }
        showSuccess(telephone);
        return true;
    }

    function validateSituation() {
        if (!situation) return true;
        if (situation.value === "") {
            showError(situation, "Sélectionne ta situation actuelle.");
            return false;
        }
        showSuccess(situation);
        return true;
    }

    function validateSexe() {
        const selected = document.querySelector('input[name="sexe"]:checked');
        const fieldset = document.getElementById("sexeGroup");
        if (!fieldset) return true;

        const errorMessage = fieldset.querySelector(".error-message");

        if (!selected) {
            fieldset.classList.add("error");
            if (errorMessage) errorMessage.textContent = "Sélectionne une option.";
            return false;
        }

        fieldset.classList.remove("error");
        if (errorMessage) errorMessage.textContent = "";
        return true;
    }

    /* =========================================================
       4. SÉCURITÉ ET VALIDATION DU MOT DE PASSE
    ========================================================= */
    function checkPasswordStrength(value) {
        let score = 0;
        if (value.length >= 8) score++;
        if (/[a-z]/.test(value)) score++;
        if (/[A-Z]/.test(value)) score++;
        if (/[0-9]/.test(value)) score++;
        if (/[^A-Za-z0-9]/.test(value)) score++;
        return score;
    }

    function updatePasswordStrength() {
        if (!password || !strengthFill || !strengthText) return;
        const value = password.value;
        const score = checkPasswordStrength(value);

        if (value.length === 0) {
            strengthFill.style.width = "0%";
            strengthText.textContent = "Sécurité du mot de passe";
            return;
        }

        if (score <= 2) {
            strengthFill.style.width = "30%";
            strengthFill.style.background = "#dc3545";
            strengthText.textContent = "Mot de passe faible";
        } else if (score === 3) {
            strengthFill.style.width = "55%";
            strengthFill.style.background = "#f4901e";
            strengthText.textContent = "Mot de passe moyen";
        } else if (score === 4) {
            strengthFill.style.width = "75%";
            strengthFill.style.background = "#2557d6";
            strengthText.textContent = "Mot de passe bon";
        } else {
            strengthFill.style.width = "100%";
            strengthFill.style.background = "#159862";
            strengthText.textContent = "Mot de passe très sécurisé";
        }
    }

    function validatePassword() {
        if (!password) return true;
        const value = password.value;

        if (value === "") {
            showError(password, "Crée un mot de passe.");
            return false;
        }
        if (value.length < 8) {
            showError(password, "Le mot de passe doit contenir au moins 8 caractères.");
            return false;
        }
        showSuccess(password);
        return true;
    }

    function validateConfirmPassword() {
        if (!confirmPassword || !password) return true;
        const value = confirmPassword.value;

        if (value === "") {
            showError(confirmPassword, "Confirme ton mot de passe.");
            return false;
        }
        if (value !== password.value) {
            showError(confirmPassword, "Les deux mots de passe ne correspondent pas.");
            return false;
        }
        showSuccess(confirmPassword);
        return true;
    }

    /* =========================================================
       5. BOUTONS AFFICHER / MASQUER LE MOT DE PASSE
    ========================================================= */
    const toggleButtons = document.querySelectorAll(".toggle-password");
    toggleButtons.forEach(function (button) {
        button.addEventListener("click", function () {
            const targetId = button.dataset.target;
            const input = document.getElementById(targetId);
            if (!input) return;

            if (input.type === "password") {
                input.type = "text";
                button.innerHTML = '<i class="fa-solid fa-eye-slash"></i>';
                button.setAttribute("aria-label", "Masquer le mot de passe");
            } else {
                input.type = "password";
                button.innerHTML = '<i class="fa-solid fa-eye"></i>';
                button.setAttribute("aria-label", "Afficher le mot de passe");
            }
        });
    });

    /* =========================================================
       6. ÉCOUTEURS D'ÉVÉNEMENTS EN TEMPS RÉEL (INPUT & BLUR)
    ========================================================= */
    if (password) {
        password.addEventListener("input", function () {
            updatePasswordStrength();
            if (password.value.length > 0) validatePassword();
            if (confirmPassword && confirmPassword.value.length > 0) validateConfirmPassword();
        });
    }

    if (confirmPassword) {
        confirmPassword.addEventListener("input", function () {
            if (confirmPassword.value.length > 0) validateConfirmPassword();
        });
    }

    if (prenom) prenom.addEventListener("blur", validatePrenom);
    if (nom) nom.addEventListener("blur", validateNom);
    if (email) email.addEventListener("blur", validateEmail);
    if (telephone) telephone.addEventListener("blur", validateTelephone);
    if (situation) situation.addEventListener("change", validateSituation);

    /* =========================================================
       7. SOUMISSION DU FORMULAIRE
    ========================================================= */
    if (form) {
        form.addEventListener("submit", function (event) {
            const validPrenom = validatePrenom();
            const validNom = validateNom();
            const validEmail = validateEmail();
            const validTelephone = validateTelephone();
            const validSexe = validateSexe();
            const validSituation = validateSituation();
            const validPassword = validatePassword();
            const validConfirmPassword = validateConfirmPassword();

            let validTerms = true;
            if (terms) {
                const termsMessage = document.querySelector(".terms .error-message");
                if (!terms.checked) {
                    validTerms = false;
                    if (termsMessage) termsMessage.textContent = "Tu dois accepter les conditions.";
                } else {
                    if (termsMessage) termsMessage.textContent = "";
                }
            }

            const isValid =
                validPrenom &&
                validNom &&
                validEmail &&
                validTelephone &&
                validSexe &&
                validSituation &&
                validPassword &&
                validConfirmPassword &&
                validTerms;

            if (!isValid) {
                event.preventDefault();

                if (formMessage) {
                    formMessage.className = "form-message show error";
                    formMessage.textContent = "⚠️ Vérifie les informations indiquées dans le formulaire.";
                }

                const firstError = document.querySelector(".form-group.error input, .form-group.error select, fieldset.error");
                if (firstError) {
                    firstError.scrollIntoView({ behavior: "smooth", block: "center" });
                }
            } else {
                if (formMessage) {
                    formMessage.className = "form-message show success";
                    formMessage.textContent = "✓ Formulaire valide. Redirection en cours...";
                }
            }
        });
    }
});
</script>
</body>
</html>