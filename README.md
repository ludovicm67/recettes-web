Site de recettes de cuisine
===========================

Projet réalisé par Méline Bour-Lang et Ludovic Muller dans le cadre de
l'UE *bases de données et programmation web* du semestre 5.

# Mise en route

Il faudra tout d'abord récupérer le dépôt et se rendre dans le dossier :

```sh
git clone git@github.com:BourMel/site_recettes.git
cd site_recettes
```

Ensuite, il faudra installer les dépendances PHP, avec
[composer](https://getcomposer.org/), installer les dépendances JavaScript, tel
que ReactJS par exemple et générer la clé d'encryption :

```sh
composer install
npm install && npm run dev
php artisan key:generate
```

Copier ensuite le fichier [.env.example](/.env.example) dans [.env](/.env) :

```sh
cp .env.example .env
```

Il faudra ensuite éditer le fichier [.env](/.env), et remplacer cette partie
par les bonnes informations pour se connecter à la base de données :

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=homestead
DB_USERNAME=homestead
DB_PASSWORD=secret
```

Puis, lancer les différentes migrations avec :

```sh
php artisan migrate
```

et lancer le serveur de développement avec :

```sh
php artisan serve
```

et accéder à http://127.0.0.1:8000/ pour voir le résultat !
