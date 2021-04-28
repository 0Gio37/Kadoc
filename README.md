# KADOC

## Prérequis
- PHP >= 7.2
- NPM

## Installation
1. Clôner le dépôts
2. Faire un `composer install` dans le répertoire du projet
3. Créer un fichier `.env.local` et y ajouter la configuration d'accès à la BDD
4. Créer la base de données `symfony console doctrine:database:create`
5. Effetuer les migration de la base de données `symfony console doctrine:migrations:migrate`
6. Faire un `npm install`
7. Executer un `npm run build`
8. Démarrer le serveur `symfony serve`
9. L'application est prête

## Contributions
* Utiliser le Git Flow (dans Gitkraken, l'activer dans les préférences)
* Pour les fonctionalités, créer une branche `feature\nom_numero_issue`
* Pousser les branches de travail sur **Origin**
* Ne merger que dans _develop_ apèrs un _pull_ de cette branche
* Pousser les sur _develop_
* En cas de bogues sur la branche _master_ créer une branche de correctif `hotfix\bug_numero_issue`
* Merger dans _develop_ et dans _master_
* _Push_ sur **Origin**
