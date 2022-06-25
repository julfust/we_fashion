Lien github: https://github.com/julfust/we_fashion

Installation package:
-> composer require: installation packages php (vendor)
-> npm install: installation packagse js (nodes_modules)
-> npm run dev: recompilation des fichiers ("npm run watch" pour le mode automatique)

Migration database:
-> Dans le fichier .env modifier le paramètre DB_DATABASE=we_fashion
-> Sur php my admin créer la base de données: "we_fashion"
-> Copier le contenu du dossier: "image-seeder" dans le dossier "/public" de l'application
-> Ensuite lancer: "php artisan migrate:refresh --seed"

Identifiant admin:
Email addresse: admin@admin.fr
Password: password