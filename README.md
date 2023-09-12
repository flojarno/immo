# Immo 3.0

## Lancer le projet

### Backend Symfony & EasyAdmin

1. Clonez le repo sur votre machine : `git clone https://github.com/flojarno/immo.git`
2. Allez dans le dossier immo_project : `cd immo_back`
3. Ouvrez le dossier dans votre IDE et modifiez le fichier .env avec vos logins de base de données (ligne 29)
4. Lancez le serveur : `symfony server:start` et accédez à l'adresse indiquée
5. Sur le chemin /admin, ajoutez des biens, types de biens, utilisateurs, etc.

### Frontend React

1. Allez dans le dossier immo_front : `cd immo_front` et ouvrez le dossier dans l'IDE
2. Dans le fichier config.json, remplacez l'adresse locale utilisée pour appeler l'API par celle de votre machine
3. Lancez le script : `npm run dev` et accédez à l'adresse indiquée pour voir le site

## Utilisation

### Utilisateur

Commencez par créer un utilisateur sur /admin. Vous pourrez par la suite aller sur votre profil pour voir la liste de vos biens.

### Biens

**IMPORTANT** : Les filtres dans React sont écrits en dur, il faut donc bien remplir les champs ci-dessous sur /admin pour que tout fonctionne, sans oublier la majuscule au début de chaque mot.

Vous devez ajouter 3 types de biens (PropertyType):

- Maison
- Appartement
- Villa

Et 2 types de transaction (TransactionType):

- Location
- Vente

Enfin, vous pouvez ajouter autant de biens que vous le souhaitez (Property), en précisant à quel 'utilisateur' ils appartiennent. Ajoutez des photos dans Photos en précisant le bien immobilier auquel elles sont attachées.

