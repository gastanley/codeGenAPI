<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Complexe CodeGenerator</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        /* Couleur de fond et styles globaux */
        body {
            font-family: 'Poppins', sans-serif;
            background-color: #18181B;
            color: #fff;
        }

        .container {
            background-color: #27272A;
            padding: 2rem;
            border-radius: 15px;
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.5);
            max-width: 400px;
            margin: 5rem auto;
        }

        .btn-primary {
            background-color: #1d4ed8;
            border-color: #1d4ed8;
            padding: 0.75rem 2rem;
            font-size: 1rem;
            font-weight: bold;
            text-transform: uppercase;
        }

        .btn-primary:hover {
            background-color: #1e40af;
            border-color: #1e40af;
        }

        /* Style pour Complexe CodeGenerator */
        .header-title {
            font-size: 2rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.1rem;
            background: linear-gradient(90deg, #6a0dad, #1d4ed8, #1e40af);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .slogan {
            font-size: 1rem;
            text-align: center;
            color: #ccc;
            font-style: italic;
            margin-bottom: 2rem;
        }

        .form-control {
            background-color: #1f1f23;
            border: 1px solid #3b3b3f;
            color: #fff;
            font-size: 1rem;
        }

        .form-control:focus {
            background-color: #1f1f23;
            border-color: #6a0dad;
            box-shadow: 0 0 5px rgba(106, 13, 173, 0.8);
            color: #fff;
        }

        .form-label {
            color: #ccc;
            font-size: 1rem;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <!-- En-tête -->
        <div class="header-title">Complexe CodeGenerator</div>
        <div class="slogan">Helpful website to remember all passwords you use!</div>

        <!-- Formulaire de connexion -->
        <form action="{{ route('authenticate') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="email" class="form-label">Adresse Email</label>
                <input type="email" id="email" name="email" class="form-control" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Mot de Passe</label>
                <input type="password" id="password" name="password" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Se Connecter</button>
        </form>
        @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    </div>
</body>
</html>