<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Vérification du code — EduBénin</title>

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

        .description strong {
            color: #0e1c3f;
        }

        .input-group {
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
            height: 54px;
            padding: 0 14px;
            border: 1px solid #e6eaf2;
            border-radius: 10px;
            outline: none;
            font-size: 22px;
            letter-spacing: 8px;
            text-align: center;
            font-weight: 700;
        }

        input:focus {
            border-color: #2557d6;
            box-shadow: 0 0 0 4px rgba(37, 87, 214, 0.10);
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

        .back {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #2557d6;
            font-size: 13px;
            font-weight: 600;
            text-decoration: none;
        }

        .resend {
            text-align: center;
            margin-top: 12px;
            font-size: 13px;
            color: #667085;
        }

        .resend button {
            background: none;
            border: none;
            color: #2557d6;
            font-weight: 600;
            cursor: pointer;
            font-size: 13px;
            padding: 0;
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
            <i class="fa-solid fa-shield-halved"></i>
        </div>

        <h1>Vérification</h1>

        <p class="description">
            Un code à 6 chiffres a été envoyé à<br>
            <strong>{{ $email }}</strong>
        </p>

        @if($errors->any())
            <div class="alert-error">{{ $errors->first() }}</div>
        @endif

        <form method="POST" action="{{ route('password.verify') }}">
            @csrf

            <div class="input-group">
                <label for="code">Code de vérification</label>
                <input
                    type="text"
                    id="code"
                    name="code"
                    inputmode="numeric"
                    pattern="[0-9]*"
                    maxlength="6"
                    placeholder="000000"
                    required
                    autofocus
                >
            </div>

            <button type="submit" class="submit-btn">
                Vérifier
            </button>

        </form>

        <div class="resend">
            Aucun code reçu ?
            <form method="POST" action="{{ route('password.email') }}" style="display:inline;">
                @csrf
                <input type="hidden" name="email" value="{{ $email }}">
                <button type="submit">Renvoyer le code</button>
            </form>
        </div>

        <a href="{{ route('login') }}" class="back">
            ← Retour à la connexion
        </a>

    </div>

</body>

</html>