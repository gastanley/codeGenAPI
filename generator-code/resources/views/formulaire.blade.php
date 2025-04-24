<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire Laravel</title>
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

        .btn-secondary {
            background-color: #6a0dad;
            color: #fff;
            border: none;
            padding: 0.5rem 1rem;
            font-size: 0.9rem;
        }

        .btn-secondary:hover {
            background-color: #5a0cae;
        }

        /* Style pour Complexe CodeGenerator */
        .header-title {
            font-size: 3rem;
            font-weight: bold;
            text-align: center;
            margin-bottom: 1rem;
            text-transform: uppercase;
            letter-spacing: 0.1rem;
            background: linear-gradient(90deg, #6a0dad, #1d4ed8, #1e40af);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Style pour liste de données existantes */
        .listeDonnée{
            font-size: 1.2rem;
            text-align: center;
            color: #ccc;
            font-style: italic;
            margin-bottom: 2rem;
            text-transform: uppercase;
            letter-spacing: 0.1rem;
            background: linear-gradient(90deg, #6a0dad, #1d4ed8, #1e40af);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        /* Style des champs de formulaire */
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

        /* Style du tableau */
        table {
            color: #fff;
            width: 100%;
            border-collapse: collapse;
            margin-top: 2rem;
        }

        table thead {
            background: linear-gradient(90deg, #6a0dad, #1d4ed8);
            color: #fff;
        }

        table thead th {
            text-align: center;
            padding: 1rem;
            font-size: 1rem;
            font-weight: 600;
        }

        table tbody tr {
            background-color: #27272A;
            border-bottom: 1px solid #3b3b3f;
        }

        table tbody tr:hover {
            background-color: #323232;
        }

        table tbody td {
            text-align: center;
            padding: 0.75rem;
        }

        /* Amélioration pour les messages de succès */
        .alert-success {
            background-color: #1e40af;
            border-color: #1d4ed8;
            color: #fff;
            font-size: 1rem;
            font-weight: bold;
            text-align: center;
        }

        /* Style pour les options de mot de passe */
        .password-options {
            margin-bottom: 1rem;
        }

        .password-option {
            margin-right: 1rem;
            cursor: pointer;
        }

        .password-option input {
            margin-right: 0.5rem;
        }

    </style>
    <script>
        // Fonction pour générer un mot de passe complexe
        function generatePassword(length = 12) {
            const charset = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()_+[]{}|;:,.<>?";
            let password = "";
            for (let i = 0; i < length; i++) {
                const randomIndex = Math.floor(Math.random() * charset.length);
                password += charset[randomIndex];
            }
            return password;
        }

        // Fonction pour gérer le choix du mot de passe
        function handlePasswordChoice(choice) {
            const passwordField = document.getElementById('codeGenerator');
            const generateButton = document.getElementById('generate-btn');
            
            if (choice === 'generate') {
                passwordField.value = generatePassword(12);
                passwordField.readOnly = true;
                generateButton.style.display = 'inline-block';
            } else {
                passwordField.value = '';
                passwordField.readOnly = false;
                generateButton.style.display = 'none';
            }
        }

        // Fonction pour générer un nouveau mot de passe
        function generateNewPassword() {
            const passwordField = document.getElementById('codeGenerator');
            passwordField.value = generatePassword(12);
        }

        // Fonction pour récupérer et afficher les données existantes (nomSite et codeGenerator)
        async function fetchExistingData() {
            try {
                const response = await fetch('/api/codeGen');
                const data = await response.json();

                const dataTable = document.getElementById('data-table');
                dataTable.innerHTML = ''; // Réinitialiser le tableau

                // Ajouter les données reçues dans le tableau
                data.nomSite.forEach((item, index) => {
                    const row = `
                        <tr>
                            <td>${index + 1}</td>
                            <td>${item.nomSite}</td>
                            <td>${data.codeGenerator[index].codeGenerator}</td>
                        </tr>
                    `;
                    dataTable.innerHTML += row;
                });
            } catch (error) {
                console.error('Erreur lors de la récupération des données:', error);
            }
        }

        // Charger les données dès que la page est prête
        document.addEventListener('DOMContentLoaded', function() {
            fetchExistingData();
            // Par défaut, activer l'option de génération automatique
            document.getElementById('generate-option').checked = true;
            handlePasswordChoice('generate');
        });
    </script>
</head>
<body>
    <div class="container mt-5">
        <!-- En-tête du formulaire -->
        <div class="header-title">Complexe CodeGenerator</div>

        <!-- Vérifie les messages de succès -->
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        <!-- Formulaire -->
        <form action="/api/codegen/store" method="POST">
            @csrf

            <!-- Champ pour le nom du site -->
            <div class="mb-3">
                <label for="site_name" class="form-label">Nom du site</label>
                <input type="text" name="nomSite" id="site_name" class="form-control @error('nomSite') is-invalid @enderror" required>
                @error('nomSite')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Options pour le mot de passe -->
            <div class="password-options">
                <label class="password-option">
                    <input type="radio" name="password_choice" id="generate-option" value="generate" onclick="handlePasswordChoice('generate')" checked>
                    Générer automatiquement un mot de passe
                </label>
                <label class="password-option">
                    <input type="radio" name="password_choice" id="manual-option" value="manual" onclick="handlePasswordChoice('manual')">
                    Entrer manuellement un mot de passe
                </label>
            </div>

            <!-- Champ pour le mot de passe -->
            <div class="mb-3">
                <label for="codeGenerator" class="form-label">Mot de passe</label>
                <div class="input-group">
                    <input type="text" name="codeGenerator" id="codeGenerator" class="form-control @error('codeGenerator') is-invalid @enderror" required>
                    <button type="button" class="btn btn-secondary" id="generate-btn" onclick="generateNewPassword()">Générer</button>
                </div>
                @error('codeGenerator')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Bouton pour soumettre -->
            <button type="submit" class="btn btn-primary">Soumettre</button>
        </form>

        <!-- Tableau des données existantes -->
        <div class="mt-5">
            <h2 class="listeDonnée">Liste des données existantes</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom du site</th>
                        <th>Code généré</th>
                    </tr>
                </thead>
                <tbody id="data-table">
                    <!-- Les données seront insérées ici via JavaScript -->
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>