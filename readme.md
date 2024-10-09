# Association_culturelle

## Introduction
Ce projet est une plateforme pour gérer les activités de l'association culturelle.

### Utilisation de Tailwind CSS

Ce projet utilise **Tailwind CSS** comme framework CSS pour faciliter le développement de l'interface utilisateur.
```bash
npm run watch
```

### Utilisation de  php-cs-fixer

Ce projet utilise **php-cs-fixer** comme outil pour automatiser le formatage du code PHP et appliquer des règles de style définies, facilitant ainsi le maintien d'un code propre et cohérent.



### Prérequis

Avant de commencer, assurez-vous d'avoir installé les outils suivants sur votre machine :

- **Git** : pour cloner le projet
- **PHP** : version 8.1 ou supérieure
- **Composer** : pour gérer les dépendances PHP



### Étapes d'installation

#### 1. Cloner le dépôt Git

Clonez le projet en utilisant la commande suivante :

```bash
git clone https://github.com/nom-utilisateur/Association_culturelle.git

cd Association_culturelle

composer install
```

#### 2. Comment utiliser les branches

Pour travailler efficacement et éviter d'écraser des modifications importantes, il est **interdit d'écrire directement** sur les branches `main` ou `develop`. Voici les bonnes pratiques à suivre :

- **Créer une nouvelle branche** pour chaque nouvelle fonctionnalité ou correction de bug.
- **Utiliser des conventions de nommage** pour les branches, afin de garder le projet organisé et facile à suivre.

##### Conventions de nommage pour les branches

Voici les conventions que nous utilisons pour nommer les branches :

- `feature/nom-fonctionnalité` : pour développer une nouvelle fonctionnalité.  
  Exemple : `feature/page-d-accueil`, `feature/ajout-login`

- `fix/nom-bug` : pour corriger un bug.  
  Exemple : `fix/erreur-connexion`, `fix/affichage-mobile`

- `hotfix/nom-problème` : pour corriger rapidement un problème critique en production.  
  Exemple : `hotfix/erreur-critique`

- `chore/nom-tâche` : pour les tâches de maintenance ou de mise à jour de configuration.  
  Exemple : `chore/mise-a-jour-dependencies`

##### Procédure pour créer une branche

1. Assurez-vous d'être à jour sur la branche `develop` :

   ```bash
   git checkout develop
   git pull origin develop
