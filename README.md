Site de recettes de cuisine
===========================

Projet réalisé par Méline Bour-Lang et Ludovic Muller dans le cadre de
l'UE *bases de données et programmation web* du semestre 5.


# Contraintes technologiques

Le projet nécessite une version de PHP supérieure ou égale à 7.0.0 et MySQL.

Pour compiler les assets, installer les dépendances, il faudra également avoir :

  - `node` et `npm` : https://nodejs.org/en/
  - `yarn` : https://yarnpkg.com/lang/en/
  - `composer` : https://getcomposer.org/


# Mise en route

Il faudra tout d'abord récupérer le dépôt et se rendre dans le dossier :

```sh
git clone git@github.com:BourMel/site_recettes.git
cd site_recettes
```

Assurez-vous d'avoir une base de données MySQL existante.


## Version automatisée

Pour gagner du temps lors des déploiements, nous avons créé quelques scripts
shell; du coup si vous n'êtes pas sur un environnement UNIX rendez-vous
directement dans la partie suivante pour la version manuelle.

Lancer simplement :

```sh
make
```

ou

```sh
make install
```

pour lancer l'installation en mode interactif

ou bien

```sh
make default-install
```

pour installer avec les paramètres par défaut.

Il est également possible d'initialiser l'installation avec les bons
paramètres de la manière suivante :

```sh
./scripts/install.sh database username password connection host port
```

(les champs non remplis le seront automatiquement avec les valeurs par défaut)

Pour effectuer une mise à jour :

```sh
make update
```

ou

```sh
./scripts/update.sh
```

et pour lancer le serveur de développement de Laravel :

```sh
make serve
```

et accéder à http://127.0.0.1:8000/ pour voir le résultat !


## Version manuelle

Copier ensuite le fichier [.env.example](/.env.example) dans *.env* :

```sh
cp .env.example .env
```

Ensuite, il faudra installer les dépendances PHP, avec
[composer](https://getcomposer.org/), installer les dépendances JavaScript, tel
que jQuery par exemple et générer la clé de chiffrement :

```sh
composer install
npm install && npm run dev
php artisan key:generate
```

Il faudra ensuite éditer le fichier *.env*, et remplacer cette partie
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


## Installation des données de test

```sh
php artisan migrate:refresh --seed
```

(la création du compte administrateur se fait à ce moment; les informations de
connexion à ce compte ont été renseignées dans le rapport).
