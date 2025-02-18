import random
import string
import requests

def generer_mot_de_passe():
    # Définir les ensembles de caractères
    lettres_majuscules = string.ascii_uppercase
    lettres_minuscules = string.ascii_lowercase
    chiffres = string.digits
    caracteres_speciaux = string.punctuation

    # S'assurer que le mot de passe contient au moins un caractère de chaque type
    mot_de_passe = [
        random.choice(lettres_majuscules),
        random.choice(lettres_minuscules),
        random.choice(chiffres),
        random.choice(caracteres_speciaux),
    ]

    # Ajouter des caractères supplémentaires pour atteindre 8 caractères
    tous_les_caracteres = lettres_majuscules + lettres_minuscules + chiffres + caracteres_speciaux
    mot_de_passe += random.choices(tous_les_caracteres, k=11)  # 4 caractères supplémentaires

    # Mélanger les caractères pour plus de sécurité
    random.shuffle(mot_de_passe)

    # Retourner le mot de passe en tant que chaîne
    return ''.join(mot_de_passe)
    

# Execution de la génération de code
nomSite = input("Entrer le nom du site: ")
mot_de_passe = generer_mot_de_passe()
print("Nom du site :", nomSite)
print("Mot de passe généré :", mot_de_passe)


# TODO: Appel de l'API et liaison POST et GET
# Appel API
url = "http://127.0.0.1:8000/api/codegen/store"
# api_key = "base64:1apkZRwk6JK7LOK/mAfYeFrvOC5M+iYhV7eOFlKGW2I="

# Requête POST

# Donnée à envoyer
data ={
    'nomSite': nomSite,
    'codeGenerator': mot_de_passe
} 

# En-tête de la requête
headers={
    'Content-Type': 'application/json',
    'Accept': 'applicaton/json',
}

# Envoi de requête
response = requests.post(url, json=data, headers=headers)

# Condition de vérification status
if response.status_code == 200 or response.status_code ==201:
    print('Requête réussie:', response.json())
else:
    print('Erreur:', response.status_code, response.text)