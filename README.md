# Un petit crud entre amis

Voilà une rapide correction sur le CRUD de News que l'on a fait ensemble ces deux jours

Vous trouverez un dossier "database" avec un dump d'une DB "blog_crud" avec deux utilisateurs :

* jf.dirienzo@gmail.com | pwd : Password
* francis.huster@gmail.com | pwd : Password

Vous trouverez les credentials de la db dans le dossier docker-compose.yaml

## La structure

La structure est le plus simple possible et n'est pas toujours la plus rigoureuse donc vous trouverez :

* Un routeur fait avec un switch qui va aller monitorer le paramètre $_GET['p']
* Un dossier controller avec tous les controllers nécessaires
* Un dossier model qui mèle les Entity et les Managers (ouais c'est pas super propre, surtout que je n'ai pas respecté
  le pattern d'injection de dépendances sur mes Managers)
* Un dossier public qui est majoritairement vide puisque tout est fait avec Bootstrap
* Un dossier vendor qui contient quelques utilitaires
* Enfin, un dossier view avec toutes les vues et templates

## Le lancement

Vous avez toute une config **Docker** donc...
```
docker-compose up
```
Et rendez vous sur **localhost:5555**