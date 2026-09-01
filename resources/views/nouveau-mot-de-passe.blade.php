<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Nouveau mot de passe — EduBénin</title>

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
            background: #f5f7fb;
        }

        .reset-card {
            width: 420px;
            max-width: 100%;
            background: white;
            padding: 35px;
            border-radius: 20px;
            box-shadow: 0 15px 40px rgba(14, 28, 63, 0.12);
        }

        .icon {
            width: 60px;
            height: 60px;
            margin: 0 auto 20px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 50%;
            background: #e8eefc;
            color: #2557d6;
            font-size: 25px;
        }

        h1 {
            text-align: center;
            color: #0e1c3f;
            font-size: 25px;
            margin-bottom: 10px;
        }

        .description {
            text-align: center;
            color: #667085;
            font-size: 14px;
            line-height: 1.6;
            margin-bottom: 25px;
        }

        .input-box {
            width: 100%;
            position: relative;
            margin-bottom: 18px;
        }

        label {
            display: block;
            color: #101828;
            font-size: 13px;
            font-weight: 600;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            height: 48px;
            padding: 0 45px 0 14px;
            border: 1px solid #e6eaf2;
            border-radius: 10px;
            outline: none;
            font-size: 14px;
        }

        input:focus {
            border-color: #2557d6;
            box-shadow: 0 0 0 4px rgba(37, 87, 214, 0.10);
        }

        .input-box i.toggle-password {
            position: absolute;
            right: 16px;
            top: 41px;
            color: #8891a3;
            cursor: pointer;
        }

        .submit-btn {
            width: 100%;
            height: 50px;
            border: none;
            border-radius: 25px;
            background: #0e1c3f;
            color: white;
            font-size: 14px;
            font-weight: 700;
            cursor: pointer;
        }

        .submit-btn:hover {
            background: #2557d6;
        }

        .alert-error {
            background: #fdeaf0;
            color: #d13a6b;
            padding: 12px 14px;
            border-radius: 10px;
            font-size: 13px;
            margin-bottom: 18px;
        }
    </style>
</head>

<body>

    <div class="reset-card">

        <div class="icon">
            <i class="fa-solid fa-key"></i>
        </div>

        <h1>Nouveau mot de passe</h1>

        <p class="description">
            Choisis un nouveau mot de passe pour ton compte EduBénin.
        </p>

        @if($errors->any())
            <div class="alert-error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('password.update') }}">
            @csrf

            <div class="input-box">
                <label for="password">Nouveau mot de passe</label>
                <input type="password" id="password" name="password" placeholder="8 caractères minimum" required>
                <i class="fa-solid fa-eye-slash toggle-password" data-target="password"></i>
            </div>

            <div class="input-box">
                <label for="password_confirmation">Confirmer le mot de passe</label>
                <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Retape le mot de passe" required>
                <i class="fa-solid fa-eye-slash toggle-password" data-target="password_confirmation"></i>
            </div>

            <button type="submit" class="submit-btn">
                Réinitialiser le mot de passe
            </button>

        </form>

    </div>

    <script>
        document.querySelectorAll('.toggle-password').forEach(function (icon) {
            icon.addEventListener('click', function () {
                const input = document.getElementById(this.dataset.target);
                const type = input.getAttribute('type') === 'password' ? 'text' : 'password';
                input.setAttribute('type', type);
                this.classList.toggle('fa-eye');
                this.classList.toggle('fa-eye-slash');
            });
        });
    </script>

</body>

</html>