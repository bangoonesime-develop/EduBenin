<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion</title>
    
    <!-- Utilisation du CDN FontAwesome public pour garantir le chargement des icônes -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap');
        
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        section {
            background-color: transparent;
            border: 2px solid rgba(255, 255, 255, 0.2);
            backdrop-filter: blur(20px);
            padding: 30px;
            width: 420px;
            border-radius: 20px;
        }
        section h1 {
            font-size: 30px;
            text-align: center;
            color: white;
            margin-bottom: 20px;
        }
        .input-box {
            width: 100%;
            position: relative;
            margin-bottom: 25px;
        }
        .input-box input {
            width: 100%;
            padding: 15px;
            border-radius: 25px;
            outline: none;
            background-color: transparent;
            border: 2px solid rgba(255, 255, 255, 0.2);
            color: white;
            padding-right: 45px;
        }
        .input-box input::placeholder {
            color: white;
        }
        /* Style pour les icônes */
        .input-box i {
            position: absolute;
            transform: translateY(-50%);
            right: 20px;
            top: 50%;
            color: white;
        }
        /* Style spécifique pour l'icône cliquable de l'œil */
        .input-box i.toggle-password {
            cursor: pointer;
        }
        .remember-forgot {
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-size: 14px;
            color: white;
            margin-bottom: 25px;
        }
        .remember-forgot a, .register-link a {
            color: white;
            text-decoration: none;
            transition: 0.5s;
            font-weight: bold;
        }
        .remember-forgot a:hover, .register-link a:hover {
            text-decoration: underline;
        }
        .bouton {
            width: 100%;
            padding: 15px;
            border-radius: 25px;
            outline: none;
            border: 0;
            font-weight: bold;
            cursor: pointer;
            border: 2px solid transparent;
            transition: 0.5s;
        }
        .bouton:hover {
            background-color: transparent;
            border: 2px solid rgba(255, 255, 255, 0.2);
            color: white;
        }
        .register-link {
            text-align: center;
            margin-top: 25px;
            color: white;
            font-size: 14px;
        }
        .image-fond {
            position: fixed;
            width: 100%;
            height: 100%;
            object-fit: cover;
            z-index: -1;
        }
    </style>
</head>
<body>
    <img src="{{ asset('Afric noir.png') }}" alt="la lecture des livres par les africains" class="image-fond">
    
    <section>
        <form action="{{ route('login') }}" method="POST">
    @csrf
            <h1>Connexion</h1>
            
            <div class="input-box">
                <input type="email" name="email" placeholder="Email" required>
                <i class="fa-solid fa-user"></i>
            </div>
            
            <div class="input-box">
                <input type="password" id="password" name="password" placeholder="Mot de passe" required>
                <!-- Icône d'œil par défaut (fa-eye-slash) -->
                <i class="fa-solid fa-eye-slash toggle-password" id="togglePassword"></i>
            </div>
            
            <div class="remember-forgot">
                <label><input type="checkbox" name="remember"> Se souvenir de moi</label>
                <a href="{{ route('password.request') }}">
                    Mot de passe oublié ?
                </a>
            </div>
            
            <button type="submit" class="bouton">Se connecter</button>

            <div class="register-link">
                <p>
                    Pas de compte ?
                    <a href="/Inscription">Inscription</a>
                </p>
            </div>
        </form>
    </section>

    <!-- Script JavaScript pour basculer l'affichage du mot de passe -->
    <script>
        const togglePassword = document.querySelector('#togglePassword');
        const password = document.querySelector('#password');

        togglePassword.addEventListener('click', function () {
            // Basculer entre 'password' et 'text'
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            
            // Basculer l'icône entre l'œil fermé et l'œil ouvert
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    </script>
</body>
</html>