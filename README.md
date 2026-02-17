# Grand_Angle - PHP MVC

## Description

Projet PHP MVC développé seul.

Grand Angle est un projet-test sur un lieu d'éxposition d'oeuvres d'art.

Le projet comprend :
- Une partie **Employés** (gestion des utilisateurs, dashboard admin)  
- Une partie site pour les **Visiteurs**  

Architecture **MVC personnalisée** avec :  
- Gestion des utilisateurs et rôles (Admin / Collaborateur)  
- Authentification sécurisée (password hashing)  
- Routage simple et dynamique inspiré de [php_mvc](https://github.com/Raindal/php_mvc)  
- Vue templating via layout principal 

**État :** Ce projet est encore en développement.

## Fonctionnalités

- Ajouter / Modifier / Supprimer des utilisateurs (CRUD)  
- Dashboard administrateur  
- Pages utilisateurs avec authentification  
- Gestion sécurisée des sessions  

## Structure du projet

```
/MVC
│
├─ /app
│   ├─ /Core
|   |   ├─ Controller.php
|   |   ├─ Database.php
|   |   └─ Routeur.php
│   ├─ /Controllers
|   |   ├─ PagesController.php
|   |   ├─ AdminController.php
|   |   └─ UsersController.php
│   ├─ /Models
|   |   ├─ /Managers
|   |   |    └─ UsersManager.php
|   |   └─ User.php
│   └─ /Views
|       ├─ /admin
|       |    ├─ addUser.php
|       |    ├─ deleteUser.php
|       |    ├─ edit.php
|       |    ├─ dashboard.php
|       |    └─ users.php
|       ├─ /layouts
|       |    └─ main.php
|       ├─ /pages
|       |    ├─ error.php
|       |    └─ home.php
|       └─ /users
|            ├─ dashboard.php
|            └─ login.php
│
├─ /public
│   └─ index.php
│
├─ /vendor
│   ├─ /composer
|   |   ├─ autoload_classmap.php
|   |   ├─ autoload_namespaces.php
|   |   ├─ autoload_psr4.php
|   |   ├─ autoload_real.php
|   |   ├─ autoload_static.php
|   |   └─ ClassLoader.php
│   └─ autoload.php
├─ composer.json
├─ hash.php
├─ .gitignore
└─ structure.txt

```

## Roadmap

- S'assurer du bon fonctionnement et de la sécurisation des log
- Intégrer les prochaines tables **Exhibition** et **Oeuvre**
- Gerer les QRCODE spécifiques aux oeuvres et leurs traductions

## Organisation

Base de donnée réalisée avec Looping, specification et documentation du projet.
